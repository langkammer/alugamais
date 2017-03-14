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
            $table->string("mesRef");
            $table->integer('contrato_id')->unsigned()->index()->default(1);
            $table->foreign('contrato_id')
                ->references('id')
                ->on('contratos');
            $table->decimal("valorTotal", 10, 2);
            $table->date("dataEmissao");
            $table->date("periodoFaturaIni");
            $table->date("periodoFaturaFinal");
            $table->date("dataVencimento");
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
