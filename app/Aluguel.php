<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    //


    protected $fillable = [
        'id',
        'numeroAluguel',
        'descricaoAluguel',
        'valorAluguelMensal',
        'valorAluguelDiario',
        'multaPorcentagemAtraso',
        'status'

    ];


    public function registerLoc(array $attributes = []){

        $aluguel = new Aluguel();
        $aluguel = new static($attributes);


        if($aluguel->id==null){
            $aluguel->status = 'aguardoando_locacao';
        }

        return  $aluguel->save();

    }
}
