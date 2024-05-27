<?php

namespace Database\Factories;

use App\Models\Discusiones;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuariosIds = Usuario::pluck('id')->toArray();
        $discusionesIds = Discusiones::pluck('id')->toArray();
        return [
            'texto'=>fake()->paragraph(),
            'id_usuario'=>$this->faker->randomElement($usuariosIds),
            'id_discusion'=>$this->faker->randomElement( $discusionesIds)
        ];
    }
}
