<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use laravel\pagseguro\Platform\Laravel5\PagSeguro;

class LancamentoMensal extends Model
{

    protected $fillable = [
        'id',
        'mesRef',
        'dataEmissao',
        'periodoFaturaIni',
        'periodoFaturaFinal',
        'dataVencimento',
        'valorTotal',
        'statusPagamento',
        'contrato_id',
        'statusFatura',
        'codigoBoletoPagseguro',
        'statusBoleto'

    ];

    public function contratos()
    {
        return $this->hasOne('App\Contrato','id','contrato_id');
    }

    public function conta_lancamentos()
    {

        return $this->hasMany('App\ContaLancamento');

    }

    public function lancarFatura(array $attributes = []){

        $fatura = new LancamentoMensal();

        $fatura = new static($attributes);

        $contrato = Contrato::find($fatura->contrato_id);

        $date1 = Carbon::createFromFormat('Y-m-d', $fatura->periodoFaturaIni);
        $date2 = Carbon::createFromFormat('Y-m-d', $fatura->periodoFaturaFinal);

        $intervalo = $date2->diffInDays($date1);

        if($contrato->tipoContrato=='mensal')
            $fatura->valorTotal = $contrato->aluguels->valorAluguelMensal;
        else
            $fatura->valorTotal = $contrato->aluguels->valorAluguelDiario * $intervalo;


        $fatura->statusFatura = 'fatura_aberta';

        $fatura->save();

        return  $fatura;

    }

    public function detarContaFatura($id,$idFatura){

        $fatura = LancamentoMensal::find($idFatura);

        $contaLancamento = ContaLancamento::find($id);

        $fatura->valorTotal -= $contaLancamento->valor;

        $fatura->save();

        return $contaLancamento->delete();
    }

    public function fecharFatura(LancamentoMensal $fatura){



        $items = [];

        $num = 0;

        foreach ($fatura->conta_lancamentos as $itemFatura){

            $items[$num] =
                [
                    'id' => $itemFatura->id,
                    'description' => $itemFatura->contas->tipoConta,
                    'quantity' =>  $itemFatura->quantidadeLeitura,
                    'amount'=> $itemFatura->valorUnitario
                ];
            $num++;

        }

        $items[$num] = [
            'id' => '123',
            'description' => "ALUGUEL NUMERO : " . $fatura->contratos->aluguels->numeroAluguel,
            'quantity' =>  1,
            'amount'=> $fatura->contratos->aluguels->valorAluguelMensal
        ];

        $sender = [
            'email' => 'pagadorairbnb@gmail.com',
            'name' => $fatura->contratos->clientes->nome,
            'documents' => [
                [
                    'number' => $fatura->contratos->clientes->cpf,
                    'type' => 'CPF'
                ]
            ]
        ];

        $data = [
            'items' => $items,
            'sender' => $sender
        ];

        $checkout = PagSeguro::checkout()->createFromArray($data);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
        if ($information) {
            $fatura->codigoBoletoPagseguro  = $information->getCode();
            $fatura->statusBoleto = 'boleto_gerado';
        }
        else{
            $fatura->statusBoleto = 'boleto_naogerado';
        }
        if($fatura->statusFatura!='fatura_fechada')
            $fatura->statusFatura = 'fatura_fechada';


        return $fatura->save();
    }
}
