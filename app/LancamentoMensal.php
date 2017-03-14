<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
        'contas_id',
        'contrato_id'

    ];

    public function contratos()
    {
        return $this->hasOne('App\Contrato','id','contrato_id');
    }

    public function conta_lancamentos()
    {

        return $this->hasMany('App\ContaLancamento','id','lancamento_id');

    }

    public function lancarContaFatura(array $attributes = [],LancamentoMensal $fatura){

        $contaLanc = new ContaLancamento();

        $contaLanc = new static($attributes);

        $contaLanc->lancamento_id = $fatura->id;

        $contaLanc->save();

        $fatura->valorTotal += $contaLanc->valor;

        return $contaLanc;
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

        $fatura->save();

        return  $fatura;

    }
}
