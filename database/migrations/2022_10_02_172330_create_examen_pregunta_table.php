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
        Schema::create('examen_pregunta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('examen_id');
            $table->smallInteger('orden');
            $table->timestamps();

            $table->unique(['id', 'pregunta_id', 'examen_id']);
            $table->foreign('examen_id')->references('id')->on('examenes');
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_pregunta');
    }
};
