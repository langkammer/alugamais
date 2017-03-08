<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LancamentoMensal extends Model
{

    protected $fillable = [
        'id',
        'quantidadeLeituraAgua',
        'quantidadeLeituraLuz',
        'valorAgua',
        'valorLuz',
        'valorTotal',
        'statusPagamento',
        'aluguel_id',
        'contas_id',
        'cliente_id'

    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function aluguel()
    {
        return $this->belongsTo('App\Aluguel');
    }

    public function contas()
    {
        return $this->belongsTo('App\Conta');
    }
}
