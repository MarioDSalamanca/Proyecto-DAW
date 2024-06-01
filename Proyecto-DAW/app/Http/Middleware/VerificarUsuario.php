<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarUsuario {
    
    public function handle(Request $request, Closure $next): Response {

        // Excluir la ruta de inicio de sesión de la verificación de autenticación
        $route = $request->route();
        if ($route && $route->getName() !== 'login') {
            // Comprobar que existe la variable de sesión
            if (!$request->session()->has('usuario_autenticado')) {
                return redirect()->route('login');
            }
        }
        
        // $next($request) para continuar el flujo
        return $next($request);
    }
}