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
    public function handle(Request $request, Closure $next): Response {

        // Excluir la ruta de inicio de sesión de la verificación de autenticación
        $route = $request->route();
        //dd('usuario');
        if ($route && $route->getName() !== 'login') {
            if (!$request->session()->has('usuario_autenticado')) {
                return redirect()->route('login');
            }
        }
    
        // Si el usuario está autenticado, permite que la solicitud continúe
        return $next($request);
    }
}