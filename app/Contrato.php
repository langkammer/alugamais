<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    //

    protected $fillable = [
        'id',
        'cliente_id',
        'aluguel_id',
        'dataInicioContrato',
        'dataFimContrato',
        'tipoContrato'
    ];

    public function aluguels()
    {
        return $this->hasOne('App\Aluguel','id','aluguel_id');
    }

    public function clientes()
    {
        return $this->hasOne('App\Cliente','id','cliente_id');
    }
}
