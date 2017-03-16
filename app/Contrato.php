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

    public function registerLoc(array $attributes = []){

        $aluguel = new Aluguel();

        $contrato = new Contrato();

        $contrato = new static($attributes);

        $contrato->save();

        if($contrato->id!=null){
            $aluguel = Aluguel::find($contrato->aluguel_id);
            $aluguel->status = 'alugado';
            $aluguel->save();
        }

        return  $aluguel->save();

    }
}
