<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->string('prefixo')->unique();
            $table->string('remetente_do_email');
            $table->string('remetente_do_sms');
            $table->string('email_do_remetente');
            $table->string('email_de_retorno');
            $table->string('codigo_da_empresa');
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
        Schema::dropIfExists('instituicoes');
    }
}
