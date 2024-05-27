<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class Usuario extends User
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $guarded=['id','esAdmin'];

    public function comentarios(){
        return $this->hasMany(Comentario::class,'id_usuario');
    }
    
    public function discusion(){
        return $this->hasMany(Discusiones::class,'id_usuario');
    }
    
    public function publicacion(){
        return $this->hasMany(Publicacion::class,'id_usuario');
    }

    public function setContrasenaAttribute($pwd){
        $this->attributes['contrasena'] = Hash::make($pwd);
    }
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
    public function getAuthIdentifierName()
    {
        return 'id';
    }
    public function getAuthIdentifier()
    {
        return $this->id;
    }

}
