<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipoConta',['luz','agua','outros']);
            $table->string("nomeConta");
            $table->boolean("statusPagamento");
            $table->integer('quantidadeMedicao');
            $table->float('valor');
            $table->date("dataIniLeitura");
            $table->date("dataFimLeitura");
            $table->string("mesRef");
            $table->float("porcentagemMultaAtraso");
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
        Schema::dropIfExists('contas');
    }
}
