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
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_obtencion');
            $table->date('fecha_vencimiento');
            $table->unsignedBigInteger('licencia_clase_id');
            $table->unsignedBigInteger('examen_id');
            $table->unsignedBigInteger('usuario_id');
            $table->mediumText('observaciones');
            $table->timestamps();

            $table->foreign('licencia_clase_id')->references('id')->on('licencia_clases');
            $table->foreign('examen_id')->references('id')->on('examenes');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencias');
    }
};
