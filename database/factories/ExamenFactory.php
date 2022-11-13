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
            'fecha' => $this->faker->boolean(80) ? $this->faker->dateTime() : null,
            'usuario_id' => $this->faker->numberBetween(1, 4),
            'nota' => $this->faker->numberBetween(5, 10),
            'intento' => $this->faker->numberBetween(1, 3),
            'activo' => $this->faker->boolean(80)
        ];
    }
}
