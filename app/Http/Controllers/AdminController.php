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

class AdminController extends Controller
{
    public function mostrarPagAdmin(){
        $comprobar = Auth::user();
        return view('web.administrador',compact('comprobar'));
    }
    public function mostrarUsuariosAdmin(){
        $comprobar = Auth::user();
        $usuarios = Usuario::orderBy('id', 'asc')->paginate(12);
        return view('web.administradorUsuarios',compact('comprobar','usuarios'));
    }
    public function mostrarPublicAdmin(){
        $comprobar = Auth::user();
        $publicaciones= Publicacion::orderBy('id', 'asc')->paginate(12);
        return view('web.administradorPub',compact('comprobar','publicaciones'));
    }
    public function mostrarDiscusionesAdmin(){
        $comprobar = Auth::user();
        $discusiones = Discusiones::orderBy('id', 'asc')->paginate(12);
        return view('web.administradorDis',compact('comprobar','discusiones'));
    }
    public function mostrarMusicaAdmin(){
        $comprobar = Auth::user();
        $musica = Musica::orderBy('id', 'asc')->paginate(12);
        $artistas = Artistas::orderBy('id', 'asc')->paginate(12);
        return view('web.administradorMusica',compact('comprobar','musica','artistas'));
    }
    public function busquedaUsu(Request $request)
    {
        $termino = $request->q;

        $comprobar = Auth::user();

        // Buscar usuarios que contengan el término en cualquier columna relevante
        $usuarios = Usuario::where('nombre_usuario', 'like', '%' . $termino . '%')
            ->orWhere('nombre', 'like', '%' . $termino . '%')
            ->paginate(8);

        return view('web.administradorUsuarios', ['usuarios' => $usuarios],compact('comprobar'));
    }
    public function busquedaDis(Request $request)
    {
        $termino = $request->q;

        $comprobar = Auth::user();

        $discusiones = Discusiones::where('titulo', 'like', '%' . $termino . '%')
            ->orWhere('titulo', 'like', '%' . $termino . '%')
            ->paginate(8);

        return view('web.administradorDis', ['discusiones' => $discusiones],compact('comprobar'));
    }
    public function busquedaMusica(Request $request)
    {
        $termino = $request->q;

        $comprobar = Auth::user();

        $musica = Publicacion::where('nombre', 'like', '%' . $termino . '%')
            ->orWhere('nombre', 'like', '%' . $termino . '%')
            ->paginate(8);
        $artistas = Artistas::where('nombre', 'like', '%' . $termino . '%')
            ->orWhere('nombre', 'like', '%' . $termino . '%')
            ->paginate(8);


        return view('web.administradorMusica', ['musica' => $musica, 'artistas' => $artistas],compact('comprobar'));
    }
    public function busquedaPub(Request $request)
    {
        $termino = $request->q;

        $comprobar = Auth::user();

        $publicaciones = Publicacion::where('nombre', 'like', '%' . $termino . '%')
            ->orWhere('nombre', 'like', '%' . $termino . '%')
            ->paginate(8);

        return view('web.administradorPub', ['publicaciones' => $publicaciones],compact('comprobar'));
    }


    public function destroyad($id)
    {
        $user = Usuario::find($id);

        if ($user) {
            foreach ($user->comentarios as $comentario) {
                $comentario->delete();
            }
            foreach ($user->discusion as $discusiones) {
                foreach ($discusiones->comentarios as $comentario) {
                    $comentario->delete();
                }
                $discusiones->delete();
            }
            foreach ($user->publicacion as $publicacion) {
                $publicacion->delete();
            }
            $user->delete();

            return redirect()->route('panelAdminUsu')->with('success', 'Usuario eliminado con éxito');
        } else {
            return redirect()->route('panelAdminUsu')->with('error', 'Usuario no encontrado');
        }
    }

    public function destroyPubad($id)
    {
        $user = Publicacion::find($id);

        if ($user) {

            $user->delete();

            return redirect()->route('panelAdminPublic')->with('success', 'Usuario eliminado con éxito');
        } else {
            return redirect()->route('panelAdminPublic')->with('error', 'Usuario no encontrado');
        }
    }

    public function destroyMusad($id)
    {
        $user = Musica::find($id);

        if ($user) {

            $user->delete();

            return redirect()->route('panelAdminMusica')->with('success', 'Usuario eliminado con éxito');
        } else {
            return redirect()->route('panelAdminMusica')->with('error', 'Usuario no encontrado');
        }
    }

    public function destroyArtad($id)
    {
        $user = Artistas::find($id);

        if ($user) {

            $user->delete();

            return redirect()->route('panelAdminMusica')->with('success', 'Usuario eliminado con éxito');
        } else {
            return redirect()->route('panelAdminMusica')->with('error', 'Usuario no encontrado');
        }
    }

    public function destroyDisad($id)
    {
        $user = Discusiones::find($id);

        if ($user) {
            foreach ($user->comentarios as $comentario) {
                $comentario->delete();
            }
            foreach ($user->discusion as $discusiones) {
                foreach ($discusiones->comentarios as $comentario) {
                    $comentario->delete();
                }
                $discusiones->delete();
            }
            $user->delete();

            return redirect()->route('panelAdminDiscu')->with('success', 'Usuario eliminado con éxito');
        } else {
            return redirect()->route('panelAdminDiscu')->with('error', 'Usuario no encontrado');
        }
    }



}

?>
