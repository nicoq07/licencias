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
        Schema::create('preguntas_examen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examen_id');
            $table->unsignedBigInteger('pregunta_id');
            $table->smallInteger('orden');
            $table->timestamps();

            $table->unique(['id', 'examen_id', 'pregunta_id']);
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
        Schema::dropIfExists('preguntas_examen');
    }
};
