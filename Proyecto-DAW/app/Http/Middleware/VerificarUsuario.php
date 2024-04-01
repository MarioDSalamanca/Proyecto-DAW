<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*if (!$request->session()->has('usuario_autenticado')) {
            // Si el usuario no está autenticado, redirige al formulario de inicio de sesión
            return redirect()->route('login.showLogin');
        }*/
    
        // Si el usuario está autenticado, permite que la solicitud continúe
        return $next($request);
    }
}