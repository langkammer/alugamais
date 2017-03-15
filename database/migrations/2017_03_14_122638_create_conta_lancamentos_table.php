<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_lancamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipoConta',['luz','agua']);
            $table->integer('conta_id')->unsigned();
            $table->foreign('conta_id')
                ->references('id')
                ->on('contas');
            $table->integer('lancamento_mensal_id')->unsigned();
            $table->foreign('lancamento_mensal_id')
                ->references('id')
                ->on('lancamento_mensals');
            $table->integer('quantidadeLeitura');
            $table->decimal('valorUnitario', 10, 2);
            $table->decimal('valor', 10, 2);
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
        Schema::dropIfExists('conta_lancamentos');
    }
}
