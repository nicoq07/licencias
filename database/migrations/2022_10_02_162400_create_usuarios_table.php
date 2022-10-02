<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id')->nullable(false);
            $table->string('nombre_usuario', 100)->nullable(false);
            $table->string('email')->nullable(false);
            $table->unsignedBigInteger('rol_id')->nullable(false);
            $table->boolean('activo')->nullable(false);
            $table->rememberToken();
            $table->timestamps();

            $table->unique('nombre_usuario');
            $table->unique('email');

            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('persona_id')->references('id')->on('personas');
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
};
