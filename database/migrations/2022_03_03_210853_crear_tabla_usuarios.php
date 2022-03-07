<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('email', 255)->nullable(false);
            $table->primary('email');
            $table->string('password', 255)->nullable(false);
            $table->string('nombre', 100)->nullable(false);
            $table->enum('tipo', ['ADMIN','LECTOR', 'REDACTOR']);
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
        Schema::dropIfExists('usuarios');
    }
}
