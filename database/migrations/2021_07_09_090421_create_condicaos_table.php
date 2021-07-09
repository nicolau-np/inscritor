<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_instituicao')->unsigned()->index();
            $table->bigInteger('id_ano_lectivo')->unsigned()->index();
            $table->bigInteger('ano_inicio');
            $table->bigInteger('ano_fim');
            $table->string('estado');
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
        Schema::dropIfExists('condicaos');
    }
}