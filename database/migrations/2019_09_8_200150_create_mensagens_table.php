<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('nome_do_arquivo');
            $table->longText('conteudo');
            $table->string('assunto');
            $table->string('tipo_de_acao');
            $table->unsignedInteger('instituicao_id');
            $table->timestamps();

            $table->foreign('instituicao_id')
                ->references('id')
                ->on('instituicoes');

            $table->foreign('tipo_de_acao_id')
                ->references('id')
                ->on('tipos_de_acoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensagens');
    }
}
