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

        return $contaLanc;
    }

    public function lancarFatura(array $attributes = []){

        $contaLancamento = new ContaLancamento();

        $contaLancamento = new static($attributes);

        return  $contaLancamento->save();;

    }
}
