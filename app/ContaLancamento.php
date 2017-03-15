<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaLancamento extends Model
{
    //
    protected $fillable = [
        'id',
        'tipoConta',
        'conta_id',
        'quantidadeLeitura',
        'valor',
        'valorUnitario',
        'lancamento_mensal_id'
    ];

    public function contas()
    {
        return $this->hasOne('App\Conta','id','conta_id');
    }

    public function lancarContaFatura(array $attributes = [],LancamentoMensal $fatura){

        $contaLanc = new ContaLancamento();

        $contaLanc = new static($attributes);

        $contaLanc->lancamento_mensal_id = $fatura->id;

        $contaLanc->save();

        $fatura->valorTotal += $contaLanc->valor;

        $fatura->save();

        return $contaLanc;
    }

    public function lancarFatura(array $attributes = []){

        $contaLancamento = new ContaLancamento();

        $contaLancamento = new static($attributes);

        return  $contaLancamento->save();;

    }

    public function contasEmFatura($idFatura,$contaId){

        $conta =  ContaLancamento::query()->where('conta_id','=', $contaId)->where('lancamento_mensal_id','=',$idFatura)->first();

        if($conta)
            return true;
        else
            return false;
    }
}
