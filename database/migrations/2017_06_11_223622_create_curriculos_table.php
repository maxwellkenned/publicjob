<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf');
            $table->string('email');
            $table->string('nacionalidade')->default('Brasileiro');
            $table->string('sexo', 1);
            $table->integer('idade');
            $table->string('estadocivil');
            $table->boolean('filhos');
            $table->string('endereco');
            $table->string('estado');
            $table->string('cidade');
            $table->string('telefone');
            $table->string('arquivo');
            $table->longText('rd')->nullable();
            $table->longText('atividades')->nullable();
            $table->longText('xp')->nullable();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::drop('curriculos');
    }
}
