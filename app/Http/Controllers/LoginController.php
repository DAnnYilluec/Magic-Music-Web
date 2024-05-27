<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function muestraForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'correo' => ['required'],
            'contrasena' => ['required','min:5'],
        ]);

        $credentials = ['correo'=>$request ['correo'],'password'=>$request['contrasena']];

        if (Auth::attempt($credentials)) {
            return redirect()->route('inicio');
        }

        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput($request->only('correo'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('autenticarse'));
    }


    public function destroy($id)
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

            return redirect()->route('index')->with('success', 'Usuario eliminado con éxito');
        } else {
            return redirect()->route('index')->with('error', 'Usuario no encontrado');
        }
    }




}

