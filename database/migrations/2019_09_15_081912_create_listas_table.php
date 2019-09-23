<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_da_lista');
            $table->string('nome_do_arquivo');
            $table->integer('contatos');
            $table->string('conteudo');
            $table->unsignedInteger('instituicao_id');
            $table->timestamps();

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
        Schema::dropIfExists('listas');
    }
}
