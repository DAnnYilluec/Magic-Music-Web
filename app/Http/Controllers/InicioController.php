<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use App\Models\Discusiones;
use App\Models\Musica;
use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InicioController extends Controller
{
    public function muestraPag()
    {
        $publicaciones = Publicacion::orderBy('id', 'desc')->paginate(8);
        $discusiones = Discusiones::orderBy('id', 'desc')->paginate(8);
        $artistas = Artistas::orderBy('id', 'desc')->paginate(8);
        $comprobar = Auth::user();
        return view('web/index',compact('publicaciones','comprobar','discusiones','artistas'));

    }


    public function busqueda(Request $request)
    {
        $termino = $request->q;

        $comprobar = Auth::user();

        // Buscar usuarios que contengan el término en cualquier columna relevante
        $usuarios = Usuario::where('nombre_usuario', 'like', '%' . $termino . '%')
            ->orWhere('nombre_usuario', 'like', '%' . $termino . '%')
            ->get();


        // Buscar publicaciones que contengan el término en cualquier columna relevante
        $publicaciones = Publicacion::where('nombre', 'like', '%' . $termino . '%')
            ->orWhere('nombre', 'like', '%' . $termino . '%')
            ->get();

        // Buscar las discusiones creadas por el usuario y cualquier discusión que contenga el término en cualquier columna
        $discusiones = Discusiones::whereHas('usuario', function ($query) use ($termino) {
            $query->where('nombre_usuario', 'like', '%' . $termino . '%');
        })->orWhere(function ($query) use ($termino) {
            $query->where('titulo', 'like', '%' . $termino . '%')
                ->orWhere('titulo', 'like', '%' . $termino . '%');
        })->get();
        $artistas = Artistas::where('nombre', 'like', '%' . $termino . '%')
            ->orWhere('nombre', 'like', '%' . $termino . '%')
            ->get();

        return view('web/paginaDeBusqueda', ['usuarios' => $usuarios, 'publicaciones' => $publicaciones, 'discusiones' => $discusiones, 'artistas' => $artistas],compact('comprobar'));
    }



    public function muestraPagArtistas()
    {
        $artistas = Artistas::orderBy('id', 'desc')->paginate(12);
        $comprobar = Auth::user();
        return view('web/artistas',compact('comprobar','artistas'));

    }
    public function muestraPagDiscusiones()
    {
        $discusiones = Discusiones::orderBy('id', 'desc')->paginate(12);
        $comprobar = Auth::user();
        return view('web/discusiones',compact('comprobar','discusiones'));

    }
    public function muestraPagPublicaciones()
    {
        $publicaciones = Publicacion::orderBy('id', 'desc')->paginate(12);
        $comprobar = Auth::user();
        return view('web/publicaciones',compact('comprobar','publicaciones'));

    }



}
