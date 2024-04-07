<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller {
    public function index() {
        $sesionUsuario = session()->get('usuario_autenticado');
        // Invocar la vista de Inertia en 'resources/Pages/Empleados' pasando la prop usuarios
        return Inertia::render('Home', compact('sesionUsuario'));
    }

    // Cerrar sesión
    public function logout() {
        session()->forget('usuario_autenticado');
        return redirect()->route('login');
    }
}
