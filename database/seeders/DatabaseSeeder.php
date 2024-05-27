<?php

namespace Database\Seeders;

use App\Models\Artistas;
use App\Models\Comentario;
use App\Models\Musica;
use App\Models\Publicacion;
use App\Models\Discusiones;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Usuario::factory(20)->create();//->has(Receta::factory()->count(2))->create();
        Artistas::factory(30)->create();
        Discusiones::factory(30)->create();
        Publicacion::factory(30)->create();
        Comentario::factory(30)->create();
        Musica::factory(30)->create();

    }
}
