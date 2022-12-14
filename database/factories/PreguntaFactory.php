<?php

namespace Database\Factories;


use App\Models\Respuesta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pregunta>
 */
class PreguntaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'descripcion' => $this->faker->sentence(5),
            'respuesta_id' => Respuesta::factory()
        ];
    }
}
