<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductosController extends Controller {
    
    public function index(){
        // Recoger todos los registros de la tabla usuarios refiriendonos al modelo Usuarios
        // $usuarios = Usuarios::all();

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');
        // Invocar la vista de Inertia en 'resources/Pages/Empleados' pasando la prop usuarios
        // return Inertia::render('Empleados/Empleados', compact('usuarios', 'sesionUsuario'));
        return Inertia::render('Productos/Productos', compact('sesionUsuario'));
    }
}
