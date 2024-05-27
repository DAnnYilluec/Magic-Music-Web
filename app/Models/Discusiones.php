<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discusiones extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }
    public function comentarios(){
        return $this->hasMany(Comentario::class,'id_discusion');
    }
    

}
