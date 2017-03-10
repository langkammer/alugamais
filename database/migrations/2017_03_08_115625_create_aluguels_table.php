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
            $table->longText('descricaoAluguel');
            $table->decimal('valorAluguelMensal', 10, 2);
            $table->decimal('valorAluguelDiario', 10, 2);
            $table->enum('status',['alugado','em_reforma','aguardoando_locacao'])->nullable();;
            $table->decimal("multaPorcentagemAtraso", 10, 2)->nullable();;
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
