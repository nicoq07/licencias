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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->string('apellido', 100)->nullable(false);
            $table->unsignedBigInteger('documento')->nullable(false);
            $table->date('fecha_nacimiento')->nullable(false);
            $table->boolean('utiliza_anteojos')->default(false);
            $table->boolean('donante')->default(true);
            $table->unsignedBigInteger('sexo_id')->nullable(false);
            $table->unsignedBigInteger('grupo_sanguineo_id')->nullable(false);
            $table->unsignedBigInteger('tipo_documento_id')->nullable(false);
            $table->timestamps();

            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->foreign('grupo_sanguineo_id')->references('id')->on('grupos_sanguineos');
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documento');

            $table->unique(['documento', 'tipo_documento_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
