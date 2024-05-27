<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    /**
     * El nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'musica';
    use HasFactory;

    public function artistas()
    {
        return $this->belongsTo(Artistas::class, 'id_artistaCan');
    }

    public function publicacion()
{
    return $this->belongsTo(Publicacion::class);
}
}
