<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->unique();
            $table->string('envio');
            $table->integer('destinatarios');
            $table->string('nome_do_remetente');
            $table->string('email_do_remetente');
            $table->string('email_de_retorno');
            $table->string('status');
            $table->unsignedInteger('mensagem_id');
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
        Schema::dropIfExists('acoes');
    }
}
