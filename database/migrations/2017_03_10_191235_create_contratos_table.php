<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cliente_id')->unsigned()->index()->default(1);
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');


            $table->integer('aluguel_id')->unsigned()->index()->default(1);
            $table->foreign('aluguel_id')
                ->references('id')
                ->on('aluguels');


            $table->date("dataInicioContrato");
            $table->date("dataFimContrato");

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
        Schema::dropIfExists('contratos');
    }
}
