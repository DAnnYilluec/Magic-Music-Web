<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discusiones>
 */
class DiscusionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuariosIds = Usuario::pluck('id')->toArray();
        return [
            'titulo'=>fake()->name(),
            'texto'=>fake()->paragraph(),
            'imagen'=> null,
            'imagenDePortada'=>null,
            'id_usuario'=>$this->faker->randomElement($usuariosIds)
        ];
    }
}
