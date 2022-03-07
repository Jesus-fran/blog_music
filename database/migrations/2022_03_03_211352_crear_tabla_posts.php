<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->nullable(false);
            $table->string('email_redactor', 255)->nullable(false);
            $table->foreign('email_redactor')->references('email')->on('usuarios');
            $table->text('categoria')->nullable(false);
            $table->text('titulo')->nullable(false);
            $table->text('contenido')->nullable(false);
            $table->text('imagen')->nullable(false);
            $table->text('tags')->nullable(false);
            $table->dateTime('created_at')->nullable(false);
            $table->dateTime('updated_at')->nullable(false);
            $table->dateTime('deleted_at')->nullable(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
