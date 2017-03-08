<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    //


    protected $fillable = [
        'id',
        'numeroAluguel',
        'possuiSala',
        'possuiQuarto',
        'possuiBanheiro',
        'descricaoAluguel',
        'valorAluguelMensal',
        'valorAluguelDiario',
        'multaPorcentagemAtraso',
        'cliente_id'

    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
