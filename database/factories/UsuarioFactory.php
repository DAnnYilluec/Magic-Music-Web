<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_usuario' => fake()->userName(),
            'nombre' => fake()->firstName(),
            'correo' => fake()->userName.'@mail.com',
            'contrasena'=>'123456',
            'texto'=>fake()->paragraph(),
            'imagen'=>null,
            'esAdmin'=> fake()->randomElement([0, 1])
        ];
    }
}
