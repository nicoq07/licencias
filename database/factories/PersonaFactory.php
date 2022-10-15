<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Persona::class;
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'documento' => $this->faker->numberBetween(10000000, 99999999),
            'fecha_nacimiento' => $this->faker->date(),
            'utiliza_anteojos' => $this->faker->boolean(),
            'sexo_id' => $this->faker->numberBetween(1, 3),
            'grupo_sanguineo_id' => $this->faker->numberBetween(1, 8),
            'tipo_documento_id' => $this->faker->numberBetween(1, 1)
        ];
    }
}
