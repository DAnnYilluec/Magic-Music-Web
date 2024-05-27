<?php

namespace Database\Factories;

use App\Models\Artistas;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publicacion>
 */
class PublicacionFactory extends Factory
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
            'nombre'=>fake()->name(),
            'valoracion'=>fake()->randomElement([1,1.5,2,2.5,3,3.5,4,4.5,5]),
            'texto'=>fake()->paragraph(),
            'imagenDePortada'=> null,
            'imagen'=> null,
            'id_usuario'=>$this->faker->randomElement($usuariosIds),
            'id_artista' => Artistas::all()->random()->id
        ];

    }
}
