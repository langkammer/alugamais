<?php

namespace App;

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
        'quantidadeLeituraAgua',
        'quantidadeLeituraLuz',
        'valorAgua',
        'valorLuz',
        'valorTotal',
        'statusPagamento',
        'contas_id',
        'contrato_id'

    ];

    public function contratos()
    {
        return $this->belongsTo('App\Contrato');
    }


    public function contas()
    {
        return $this->belongsTo('App\Conta');
    }

    public function registerLoc(array $attributes = []){

        $aluguel = new Aluguel();
        $aluguel = new static($attributes);


        if($aluguel->id==null){
            $aluguel->status = 'aguardoando_locacao';
        }

        return  $aluguel->save();

    }
}
