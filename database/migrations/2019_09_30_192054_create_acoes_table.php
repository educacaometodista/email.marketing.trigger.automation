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
            $table->string('titulo');
            $table->integer('destinatarios');
            $table->string('status');
            $table->string('agendamento');
            $table->string('tipo_de_acao');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('tipo_de_acao_da_instituicao_id');
            $table->timestamps();

            $table->foreign('usuario_id')
                ->references('id')
                ->on('admins');

            $table->foreign('tipo_de_acao_da_instituicao_id')
                ->references('id')
                ->on('tipos_de_acoes_das_instituicoes');

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
