<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposDeAcoesDasInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_de_acoes_das_instituicoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->unsignedInteger('tipo_de_acao_id');
            $table->unsignedInteger('instituicao_id');
            $table->unsignedInteger('filtro_id');
            $table->unsignedInteger('mensagem_id');
            $table->timestamps();

            $table->foreign('tipo_de_acao_id')
                ->references('id')
                ->on('tipos_de_acoes')
                ->onDelete('cascade');

            $table->foreign('instituicao_id')
                ->references('id')
                ->on('instituicoes')
                ->onDelete('cascade');

            $table->foreign('filtro_id')
                ->references('id')
                ->on('filtros')
                ->onDelete('cascade');

            $table->foreign('mensagem_id')
                ->references('id')
                ->on('mensagens')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_de_acoes_das_instituicoes');
    }
}
