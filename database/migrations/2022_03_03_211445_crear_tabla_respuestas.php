<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id')->autoIncrement()->nullable(false);
            $table->string('email_usuario')->nullable(false);
            $table->foreign('email_usuario')->references('email')->on('usuarios');
            $table->unsignedInteger('id_comentario')->nullable(false);
            $table->foreign('id_comentario')->references('id')->on('comentarios');
            $table->text('texto')->nullable(false);
            $table->dateTime('created_at')->nullable(false);
            $table->dateTime('updated_at')->nullable(false);
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
