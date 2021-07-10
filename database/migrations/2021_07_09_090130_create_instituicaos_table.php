<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tipo_instituicao')->unsigned()->index();
            $table->bigInteger('id_nivel_instituicao')->unsigned()->index();
            $table->string('nome');
            $table->string('bairro');
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('instituicaos', function (Blueprint $table) {
            $table->foreign('id_tipo_instituicao')->references('id')->on('tipo_instituicaos')->onUpdate('cascade');
            $table->foreign('id_nivel_instituicao')->references('id')->on('nivel_instituicaos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituicaos');
    }
}