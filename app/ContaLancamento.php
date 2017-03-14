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
        'lancamento_id'
    ];

    public function contas()
    {
        return $this->hasOne('App\Conta','id','conta_id');
    }

    public function lancarFatura(array $attributes = []){

        $contaLancamento = new ContaLancamento();

        $contaLancamento = new static($attributes);

        return  $contaLancamento->save();;

    }
}
