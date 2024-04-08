<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LoginController extends Controller {
    public function showLogin() {
        return Inertia::render('Auth/Login');
    }

    public function auth(Request $request) {
        
        // Buscar al usuario por su dirección de correo electrónico
        $usuario = Empleados::where('correo', $request->correo)->first();
        //dd($request->contrasena, $usuario->Contrasena);
        if ($usuario) { 

            // Verificar si se encontró un usuario y si la contraseña proporcionada es correcta
            if (Hash::check($request->contrasena, $usuario->contrasena)) {

                // Iniciar variable de sesión con los valores del usuario
                $request->session()->put('usuario_autenticado', $request->correo);
                // Redirigir al home
                return redirect()->route('home');
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
