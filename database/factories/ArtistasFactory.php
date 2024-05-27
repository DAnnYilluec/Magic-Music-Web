<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artistas>
 */
class ArtistasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nombre' => $this->faker->name,
            'texto' => $this->faker->text,
            'imagen'=>null,
            'imagenDePortada'=>null
        ];
    }
}
?>
