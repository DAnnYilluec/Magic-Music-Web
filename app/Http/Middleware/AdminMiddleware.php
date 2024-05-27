<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificamos si el usuario ha iniciado sesión
        if (Auth::check()) {
            // Obtenemos el usuario actual
            $user = Auth::user();

            // Verificamos si el usuario es administrador
            if ($user->esAdmin == 0) {
                // Si no es administrador, redirigimos al inicio
                return redirect('web/index');
            }
        }

        // Si ha iniciado sesión y es administrador, o si no ha iniciado sesión, permitimos el acceso
        return $next($request);
    }
}
