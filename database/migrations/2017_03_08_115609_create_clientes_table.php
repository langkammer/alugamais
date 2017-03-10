<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nome");
            $table->string("cpf");
            $table->string("rg");
            $table->string("numeroCarteiraTrabalho")->nullable();
            $table->decimal('renda', 10, 2);
            $table->string("telefone");
            $table->string("enderecoAnterior")->nullable();
            $table->string("banco")->nullable();
            $table->string("agencia")->nullable();
            $table->string("conta")->nullable();
            $table->enum('tipoConta',['corrente','poupanca'])->nullable();
            $table->enum('possuiFiador',['SIM','NAO']);
            $table->string("nomeFiador")->nullable();
            $table->string("cpfFiador")->nullable();
            $table->string("rgFiador")->nullable();
            $table->string("enderecoFiador")->nullable();
            $table->string("telefoneFiador")->nullable();
            $table->float("rendaFiador")->nullable();
            $table->string("emailCliente")->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
