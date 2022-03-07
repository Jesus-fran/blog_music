<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id')->nullable(false);
            $table->string('email_usuario')->nullable(false);
            $table->foreign('email_usuario')->references('email')->on('usuarios');
            $table->unsignedInteger('id_post')->nullable(false);
            $table->foreign('id_post')->references('id')->on('posts');
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
        Schema::dropIfExists('comentarios');
    }
}
