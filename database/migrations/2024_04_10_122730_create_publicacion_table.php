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
        Schema::create('publicacion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->enum('valoracion',['1','1.5','2','2.5','3','3.5','4','4.5','5']);
            $table->text('texto')->nullable();
            $table->foreignId('id_artista')->constrained('artistas');
            $table->string('imagenDePortada')->nullable();
            $table->string('imagen')->nullable();
            $table->foreignId('id_usuario')->constrained('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion');
    }
};
