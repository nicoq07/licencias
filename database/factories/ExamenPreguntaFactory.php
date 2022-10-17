<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreguntaExamen>
 */
class ExamenPreguntaFactory extends Factory
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
            'examen_id' => 1,
            'pregunta_id' => $this->faker->numberBetween(1, 20),
            'orden' => $this->faker->numberBetween(1, 10)
        ];
    }
}
