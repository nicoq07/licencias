<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Examen>
 */
class ExamenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTime(),
            'usuario_id' => $this->faker->numberBetween(1, 4),
            'nota' => $this->faker->numberBetween(5, 10),
            'intento' => 1,
            'activo' => false
        ];
    }
}
