<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAluguelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluguels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numeroAluguel');
            $table->boolean('possuiSala');
            $table->boolean('possuiQuarto');
            $table->boolean('possuiBanheiro');
            $table->longText('descricaoAluguel');
            $table->float('valorAluguelMensal');
            $table->float('valorAluguelDiario');
            $table->boolean('status');
            $table->float("multaPorcentagemAtraso");
            $table->integer('cliente_id')->unsigned()->index()->default(1);
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');
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
        Schema::dropIfExists('aluguels');
    }
}
