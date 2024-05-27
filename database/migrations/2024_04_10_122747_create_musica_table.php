<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('musica', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombreCan');
            $table->foreignId('id_artistaCan')->constrained('artistas');
            $table->foreignId('id_publicacion')->constrained('publicacion');
            $table->enum('tipo',['Rock', 'Jazz', 'Hip-hop', 'Electrónica', 'Reggae', 'Clásica', 'Blues', 'R&B', 'Country', 'Folk','Pop', 'Salsa', 'Reggaetón', 'Metal', 'Indie', 'Funk', 'Soul', 'Disco', 'Punk', 'Gospel', 'Cumbia', 'Rap', 'Trap', 'Techno', 'Ska', 'House', 'Dubstep', 'Flamenco', 'Clásico','Bachata', 'Merengue', 'Tango', 'Fusión', 'Chill-out', 'Rumba', 'Grunge', 'Experimental', 'Samba', 'New Age', 'Electroswing', 'Hardcore', 'Drum and Bass', 'Ambient', 'Bluegrass', 'Industrial', 'Psychedelic', 'Dub', 'Trap Latino', 'Synthpop' ]);
            $table->string('link');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musica');
    }
};
