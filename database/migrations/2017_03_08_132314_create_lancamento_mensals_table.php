<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentoMensalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamento_mensals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cliente_id')->unsigned()->index()->default(1);
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');


            $table->integer('contas_id')->unsigned()->index()->default(1);
            $table->foreign('contas_id')
                ->references('id')
                ->on('contas');


            $table->integer('aluguel_id')->unsigned()->index()->default(1);
            $table->foreign('aluguel_id')
                ->references('id')
                ->on('aluguels');


            $table->integer("quantidadeLeituraAgua");
            $table->integer("quantidadeLeituraLuz");
            $table->float("valorAgua");
            $table->float("valorLuz");
            $table->float("valorTotal");
            $table->enum('statusPagamento',['pago_atrasado','pago','aguardando_pagamento'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamento_mensals');
    }
}
