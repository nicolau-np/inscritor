<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tipo_doc')->unsigned()->index();
            $table->bigInteger('id_estudante')->unsigned()->index();
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('docs', function (Blueprint $table){
            $table->foreign('id_tipo_doc')->references('id')->on('tipo_docs')->onUpdate('cascade');
            $table->foreign('id_estudante')->references('id')->on('estudantes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docs');
    }
}