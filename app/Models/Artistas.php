<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artistas extends Model
{
    /**
     * El nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'artistas';
    use HasFactory;

    public function publicacion(){
        return $this->hasMany(Publicacion::class,'id_artista');
    }
    public function musica(){
        return $this->hasMany(Musica::class,'id_artista');
    }


}

