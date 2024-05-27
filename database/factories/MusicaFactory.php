<?php

namespace Database\Factories;

use App\Models\Artistas;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Musica>
 */
class MusicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombreCan' => $this->faker->word,
            'id_artistaCan' => Artistas::all()->random()->id,
            'id_publicacion' => Publicacion::all()->random()->id,
            'tipo' => $this->faker->randomElement(['Rock', 'Jazz', 'Hip-hop', 'Electrónica', 'Reggae', 'Clásica', 'Blues', 'R&B', 'Country', 'Folk','Pop', 'Salsa', 'Reggaetón', 'Metal', 'Indie', 'Funk', 'Soul', 'Disco', 'Punk', 'Gospel', 'Cumbia', 'Rap', 'Trap', 'Techno', 'Ska', 'House', 'Dubstep', 'Flamenco', 'Clásico','Bachata', 'Merengue', 'Tango', 'Fusión', 'Chill-out', 'Rumba', 'Grunge', 'Experimental', 'Samba', 'New Age', 'Electroswing', 'Hardcore', 'Drum and Bass', 'Ambient', 'Bluegrass', 'Industrial', 'Psychedelic', 'Dub', 'Trap Latino', 'Synthpop']),
            'link'=> $this->faker->word
        ];
    }
}
