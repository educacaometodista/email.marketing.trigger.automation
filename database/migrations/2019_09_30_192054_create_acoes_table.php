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
            $table->string('agendamento');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('instituicao_id');
            $table->timestamps();

            $table->foreign('usuario_id')
                ->references('id')
                ->on('admins');

            $table->foreign('instituicao_id')
                ->references('id')
                ->on('instituicoes');

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
