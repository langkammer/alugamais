<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{

    //
    protected $fillable = [
        'id',
        'tipoConta',
        'nomeConta',
        'statusPagamento',
        'quantidadeMedicao',
        'valor',
        'dataIniLeitura',
        'dataFimLeitura',
        'mesRef',
        'porcentagemMultaAtraso',
        'valorUnitario'
    ];

}
