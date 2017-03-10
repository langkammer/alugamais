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

            $table->integer('contas_id')->unsigned()->index()->default(1);
            $table->foreign('contas_id')
                ->references('id')
                ->on('contas');

            $table->integer('contrato_id')->unsigned()->index()->default(1);
            $table->foreign('contrato_id')
                ->references('id')
                ->on('contratos');

            $table->integer("quantidadeLeituraAgua");
            $table->integer("quantidadeLeituraLuz");
            $table->decimal("valorAgua", 10, 2);
            $table->decimal("valorLuz", 10, 2);
            $table->decimal("valorTotal", 10, 2);
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
