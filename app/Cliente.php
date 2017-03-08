<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //

    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'rg',
        'telefone',
        'numeroCarteiraTrabalho',
        'renda',
        'enderecoAnterior',
        'banco',
        'agencia',
        'conta',
        'tipoConta',
        'possuiFiador',
        'nomeFiador',
        'cpfFiador',
        'rgFiador',
        'enderecoFiador',
        'emailCliente',
        'dataInicioContrato',
        'dataFimContrato'
    ];

}
