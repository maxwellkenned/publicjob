<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_vagas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_vaga');
            $table->integer('id_cv');
            $table->integer('id_user');
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
        Schema::drop('usuario_vagas');
    }
}
