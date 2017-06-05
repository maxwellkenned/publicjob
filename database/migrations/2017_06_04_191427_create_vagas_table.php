<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa');
            $table->string('titutlo');
            $table->string('jornada');
            $table->string('contrato');
            $table->string('salario');
            $table->string('UF', 2);
            $table->string('cidade');
            $table->longText('descricao');
            $table->longText('exigencias');
            $table->longText('beneficios');
            $table->integer('id_user')->unsigned();;
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
        Schema::drop('vagas');
    }
}
