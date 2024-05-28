<?php
namespace App\Http\Controllers;

use App\Models\Artistas;
use App\Models\Comentario;
use App\Models\Discusiones;
use App\Models\Musica;
use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MostrarController extends Controller
{

    public function mostrarDiscusion(Discusiones $discusionId){
        $comprobar = Auth::user();
        $discusionesRelacionadas = Discusiones::where('id_usuario',$discusionId->id_usuario )->where('id', '!=', $discusionId)->orderBy('id','desc')->paginate(4);
        $discusiones = Discusiones::inRandomOrder()->paginate(4);
        return view('web.discusion',compact('discusionId','discusiones','comprobar','discusionesRelacionadas'));
    }

    public function mostrarPublicacion(Publicacion $publicacionId){
        $comprobar = Auth::user();
        $publicacionesRelacionadas = Publicacion::where('id_artista',$publicacionId->id_artista )->where('id', '!=', $publicacionId)->orderBy('id','desc')->paginate(4);
        $musica = Musica::where('id_publicacion',$publicacionId->id)->get();
        $publicaciones = Publicacion::inRandomOrder()->paginate(4);
        return view('web.publicacion',compact('publicacionId','comprobar','publicaciones','publicacionesRelacionadas','musica'));
    }

    public function mostrarArtista(Artistas $artistaId){
        $comprobar = Auth::user();
        $publicaciones = Publicacion::where('id_artista',$artistaId->id)->orderBy('id', 'desc')->paginate(1);;
        $publicacionesAleatorias = Publicacion::where('id_artista',$artistaId->id)->inRandomOrder()->get();;
        $publicacionesRec = Publicacion::where('id_artista',$artistaId->id)->inRandomOrder()->paginate(1);;
        return view('web.perfilArtista',compact('artistaId','comprobar','publicaciones','publicacionesAleatorias','publicacionesRec'));
    }
    public function mostrarCrearPublicacion(){
        $comprobar = Auth::user();
        $artistas = Artistas::all();
        return view('web.crearPublicacion',compact('comprobar','artistas'));
    }
    public function mostrarCrearDiscusion(){
        $comprobar = Auth::user();
        return view('web.crearDiscusion',compact('comprobar'));
    }

    public function mostrarCrearMusica(){
        $comprobar = Auth::user();
        $artistas = Artistas::all();
        $publicaciones=Publicacion::all();
        return view('web.crearMusica',compact('comprobar','artistas','publicaciones'));
    }

    public function mostrarCrearArtista(){
        $comprobar = Auth::user();
        return view('web.crearArtista',compact('comprobar'));
    }

    public function mostrarRegistrarUsuarioAd(){
        $comprobar = Auth::user();
        return view('web.registrarUsuario',compact('comprobar'));
    }

    public function muestraUsuario(Usuario $id ){
        $comprobar = Auth::user();
        $discusiones = Discusiones::where('id_usuario', $id->id)->orderBy('id', 'desc')->paginate();
        $numeroDeDiscusiones = Discusiones::where('id_usuario', $id->id)->count();
        return view('web.miPerfil',compact('id','comprobar','discusiones', 'numeroDeDiscusiones'));
    }
    public function muestraEditarUsuario(Usuario $id ){
        $comprobar = Auth::user();
        $discusiones = Discusiones::where('id_usuario', $id->id)->orderBy('id', 'desc')->paginate();
        return view('web.miPerfilEditar',compact('id','comprobar','discusiones'));
    }
    public function muestraCambiarContraseña(Usuario $id ){
        $comprobar = Auth::user();
        $discusiones = Discusiones::where('id_usuario', $id->id)->orderBy('id', 'desc')->paginate();
        return view('web.cambiarContraseña',compact('id','comprobar','discusiones'));
    }

    public function muestraEditarPublicacion(Publicacion $id ){
        $comprobar = Auth::user();
        $artistas = Artistas::all();
        return view('web.publicacionEditar',compact('id','comprobar','artistas'));
    }
    public function muestraEditarDiscusion(Discusiones $id ){
        $comprobar = Auth::user();
        return view('web.discusionEditar',compact('id','comprobar'));
    }
    public function muestraEditarMusica(Musica $id ){
        $comprobar = Auth::user();
        $artistas = Artistas::all();
        $publicaciones=Publicacion::all();
        return view('web.musicaEditar',compact('id','comprobar','artistas','publicaciones'));
    }
    public function muestraEditarArtista(Artistas $id ){
        $comprobar = Auth::user();
        return view('web.editarArtista',compact('id','comprobar'));
    }

    public function stalker(Usuario $id){
        $comprobar = Auth::user();
        $discusiones = Discusiones::where('id_usuario', $id->id)->orderBy('id', 'desc')->paginate();
        $numeroDeDiscusiones = Discusiones::where('id_usuario', $id->id)->count();
        return view('web.stalker',compact('id','comprobar','discusiones','numeroDeDiscusiones'));
    }
}

?>
