<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use App\Models\Discusiones;
use App\Models\Musica;
use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CambiarController extends Controller
{
    public function editarUsuario(Request $request, Usuario $id){
        $request->validate([
            'nombre_usuario'=>[ 'required','min:4', 'max:50' ],
            'nombre'=>['required', 'max:50'],
            'correo'=>['required','email:rfc,dns'],
            'texto'=>['required'],
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('images', $nombreImagen, 'public');
            $imagen->storeAs('images', $nombreImagen, 'public');

        } else {
            $nombreImagen = $id->imagen;
        }
        $id->nombre_usuario = $request->nombre_usuario;
        $id->nombre = $request->nombre;
        $id->correo = $request->correo;
        $id->imagen = $nombreImagen;
        $id->texto = $request->texto;

        $id->save();
        return redirect()->route('miPerfil', $id->id);
    }


    public function editarPublicacion(Request $request, Publicacion $id){
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
            $nombreImagen = $id->imagen;
        }

        if ($request->hasFile('imagenDePortada')) {
            $imagenDePortada = $request->file('imagenDePortada');
            $nombreImagenDePortada = time() . '_' . $imagenDePortada->getClientOriginalName();
            $ruta = $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
            $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
        } else {
            $nombreImagenDePortada  = $id->imagenDePortada;
        }

        $id->nombre = $request->nombre;
        $id->valoracion = $request->valoracion;
        $id->texto = $request->texto;
        $id->id_artista=$request->id_artista;
        $id->imagen=$nombreImagen;
        $id->color= $request->color;
        $id->imagenDePortada=$nombreImagenDePortada;
        $id->id_usuario= Auth::id();

        $id->save();
        return redirect()->route('panelAdminPublic');
    }

    public function editarDiscusion(Request $request, Discusiones $id){
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
            $nombreImagen = $id->imagenDePortada;
        }

        if ($request->hasFile('imagenDePortada')) {
            $imagenDePortada = $request->file('imagenDePortada');
            $nombreImagenDePortada = time() . '_' . $imagenDePortada->getClientOriginalName();
            $ruta = $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
            $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
        } else {
            $nombreImagenDePortada = $id->imagen;
        }
        $id->titulo = $request->titulo;
        $id->texto = $request->texto;
        $id->imagen=$nombreImagen;
        $id->imagenDePortada=$nombreImagenDePortada;
        $id->id_usuario= Auth::id();

        $id->save();


        return redirect()->route('panelAdminDiscu');
    }

    public function editarMusica(Request $request, Musica $id){

        $request->validate([
            'nombreCan' => 'required|string|max:255',
            'link'=>'required',
            'id_artistaCan'=> 'required',
            'tipo'=>'required',
            'textoCan'=>'required'
        ]);


                $id->nombreCan = $request->nombreCan;
                $id->link = $request->link;
                $id->id_artistaCan = $request->id_artistaCan;
                $id->tipo = $request->tipo;
                $id->textoCan= $request->textoCan;
                $id->id_publicacion = $id->id_publicacion;


        $id->save();


        return redirect()->route('panelAdminMusica');
    }
    public function editarArtista(Request $request,Artistas $id){
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
            $nombreImagen = $id->imagen;
        }

        if ($request->hasFile('imagenDePortada')) {
            $imagenDePortada = $request->file('imagenDePortada');
            $nombreImagenDePortada = time() . '_' . $imagenDePortada->getClientOriginalName();
            $ruta = $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
            $imagenDePortada->storeAs('images', $nombreImagenDePortada, 'public');
        } else {
            $nombreImagenDePortada = $id->imagenDePortada;
        }

        $id->nombre = $request->nombre;
        $id->texto = $request->texto;
        $id->imagen=$nombreImagen;
        $id->imagenDePortada=$nombreImagenDePortada;

        $id->save();


        return redirect()->route('pagArtista',$id->id);
    }

    public function cambiarContraseña(Request $request)
    {
        $contrasenaActual = $request->input('contrasenaActual');
        $nuevaContrasena = $request->input('nuevaContrasena');
        echo $contrasenaActual;

        $usuario = Auth::user();
        if (Hash::check($contrasenaActual, $usuario->password)) {
            $usuario->password = $nuevaContrasena;
            $usuario->save();

            return response()->json('La contraseña ha sido cambiada exitosamente');
        } else {
            // La contraseña actual es incorrecta, entonces retornamos un error
            return response()->json('La contraseña actual es incorrecta', 400);
        }
    }



}
