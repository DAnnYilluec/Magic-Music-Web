<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    /**
     * El nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'publicacion';

    use HasFactory;
    public function musica(){
        return $this->belongsToMany(Musica::class, 'musica-publicacion', 'id_publicacion', 'id_musica');
    }
    public function canciones()
{
    return $this->hasMany(Musica::class);
}

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function artistas(){
        return $this->belongsTo(Artistas::class,'id_artista');
    }
}
