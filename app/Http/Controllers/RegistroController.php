<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use App\Models\Discusiones;
use App\Models\Publicacion;
use App\Models\Usuario;
use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function crearUsuario(Request $request){
        $request->validate([
            'nombre_usuario'=>[ 'required','min:4', 'max:50' ],
            'nombre'=>['required', 'max:50'],
            'correo'=>['required','email:rfc,dns'],
            'contrasena' => 'required|confirmed|min:8',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('images', $nombreImagen, 'public');
            $imagen->storeAs('images', $nombreImagen, 'public');

        } else {
            $nombreImagen = null;
        }

        $usuario = new Usuario();

        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->contrasena = $request->contrasena;
        $usuario->imagen=$nombreImagen;

        $usuario->save();
        return redirect()->route('index');
    }

    public function crearUsuarioAdmin(Request $request){
        $request->validate([
            'nombre_usuario'=>[ 'required','min:4', 'max:50' ],
            'nombre'=>['required', 'max:50'],
            'apellidos'=>['required', 'max:50'],
            'correo'=>['required','email:rfc,dns'],
            'contrasena' => 'required|confirmed|min:6',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'esAdmin' => 'required'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('images', $nombreImagen, 'public');
            $imagen->storeAs('images', $nombreImagen, 'public');

        } else {
            $nombreImagen = null;
        }

        $usuario = new Usuario();

        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->correo = $request->correo;
        $usuario->contrasena = $request->contrasena;
        $usuario->imagen=$nombreImagen;
        $usuario->esAdmin=$request->esAdmin;

        $usuario->save();
        return redirect()->route('muestraUsuarioad');
    }

    public function crearPublicacion(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'valoracion' => 'required|numeric',
            'texto' => 'required|string',
            'id_artista'=> 'required',
            'color'=>'required',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'imagenDePortada' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('images', $nombreImagen, 'public');
            $imagen->storeAs('images', $nombreImagen, 'public');
        } else {
            $nombreImagen = null;
        }

        if ($request->hasFile('imagenDePortada')) {
            $imagenDePortada = $request->file('imagenDePortada');
            $nombreImagenDePortada = time() . '_' . $imagenDePortada->getClientOriginalName();
            $ruta = $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
            $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
        } else {
            $nombreImagenDePortada = null;
        }
        $publicacion = new Publicacion();

        $publicacion->nombre = $request->nombre;
        $publicacion->valoracion = $request->valoracion;
        $publicacion->texto = $request->texto;
        $publicacion->id_artista=$request->id_artista;
        $publicacion->imagen=$nombreImagen;
        $publicacion->color= $request->color;
        $publicacion->imagenDePortada=$nombreImagenDePortada;
        $publicacion->id_usuario= Auth::id();

        $publicacion->save();
        return redirect()->route('panelAdminPublic');
    }

    public function crearDiscusion(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'imagenDePortada' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('images', $nombreImagen, 'public');
            $imagen->storeAs('images', $nombreImagen, 'public');
        } else {
            $nombreImagen = null;
        }

        if ($request->hasFile('imagenDePortada')) {
            $imagenDePortada = $request->file('imagenDePortada');
            $nombreImagenDePortada = time() . '_' . $imagenDePortada->getClientOriginalName();
            $ruta = $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
            $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
        } else {
            $nombreImagenDePortada = null;
        }
        $discusion = new Discusiones();

        $discusion->titulo = $request->titulo;
        $discusion->texto = $request->texto;
        $discusion->imagen=$nombreImagen;
        $discusion->imagenDePortada=$nombreImagenDePortada;
        $discusion->id_usuario= Auth::id();

        $discusion->save();


        return redirect()->route('pagDiscusion',$discusion->id);
    }

    public function crearMusica(Request $request){

    $request->validate([
        'nombreCan.*' => 'required|string|max:255',
        'link.*'=>'required',
        'id_artistaCan.*'=> 'required',
        'tipo.*'=>'required',
        'textoCan.*'=>'required'
    ]);

    // Preparación de los datos para la inserción masiva
    $datos = [];
    for ($i = 0; $i < count($request->nombreCan); $i++) {
        $datos[] = [
            'nombreCan' => $request->nombreCan[$i],
            'link' => $request->link[$i],
            'id_artistaCan' => $request->id_artistaCan[$i],
            'tipo' => $request->tipo[$i],
            'textoCan'=> isset($request->textoCan[$i]) ? $request->textoCan[$i] : null,
            'id_publicacion' => $request->id_publicacion,
        ];
    }

    // Inserción masiva
    Musica::insert($datos);


        return redirect()->route('panelAdminMusica');
    }

    public function crearArtista(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'texto' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'imagenDePortada' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('images', $nombreImagen, 'public');
            $imagen->storeAs('images', $nombreImagen, 'public');
        } else {
            $nombreImagen = null;
        }

        if ($request->hasFile('imagenDePortada')) {
            $imagenDePortada = $request->file('imagenDePortada');
            $nombreImagenDePortada = time() . '_' . $imagenDePortada->getClientOriginalName();
            $ruta = $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
            $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
        } else {
            $nombreImagenDePortada = null;
        }
        $artista = new Artistas();

        $artista->nombre = $request->nombre;
        $artista->texto = $request->texto;
        $artista->imagen=$nombreImagen;
        $artista->imagenDePortada=$nombreImagenDePortada;

        $artista->save();


        return redirect()->route('pagArtista',$artista->id);
    }

    public function crearRegistrarUsuarioAd(Request $request){
        $request->validate([
            'nombre_usuario'=>[ 'required','min:4', 'max:50' ],
            'nombre'=>['required', 'max:50'],
            'correo'=>['required','email:rfc,dns'],
            'contrasena' => 'required|confirmed|min:8',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('images', $nombreImagen, 'public');
            $imagen->storeAs('images', $nombreImagen, 'public');

        } else {
            $nombreImagen = null;
        }

        $usuario = new Usuario();

        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->contrasena = $request->contrasena;
        $usuario->imagen=$nombreImagen;

        $usuario->save();
        return redirect()->route('panelAdminUsu');
    }
}

