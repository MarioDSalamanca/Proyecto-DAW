<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function showLogin() {
        return Inertia::render('Auth/Login');
    }
    public function auth(Request $request) {
        // Buscar al usuario por su dirección de correo electrónico
        $usuario = Usuarios::where('Correo', $request->correo)->first();
        //dd($request->contrasena, $usuario->Contrasena);
        if ($usuario) { 
            // Verificar si se encontró un usuario y si la contraseña proporcionada es correcta
            if (Hash::check($request->contrasena, $usuario->Contrasena)) {

                // Iniciar la sesión en el servidor
                //$request->session()->put('usuario_autenticado', true);
                // Redirigir al home
                return redirect()->route('empleados.index');
            } else {
                // Contraseña incorrecta
                return Inertia::render('Auth/Login', ['errores' => ['contrasena' => 'La contraseña proporcionada es incorrecta.']]);

            }
        } else {
            // Usuario incorrecto
            return Inertia::render('Auth/Login', ['errores' => ['correo' => 'No se encontró ningún usuario con este correo electrónico.']]);

        }
    }
}