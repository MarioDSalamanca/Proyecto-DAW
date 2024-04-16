<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComprasController extends Controller {
    
    public function index(){
        
        // Recoger todos los registros de la tabla
        $datosServidor = Compras::all();

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');
        // Invocar la vista de Inertia en 'resources/Pages/Empleados' pasando la prop usuarios
        // return Inertia::render('Empleados/Empleados', compact('usuarios', 'sesionUsuario'));
        return Inertia::render('Compras/Compras', compact('sesionUsuario', 'datosServidor'));
    }
}
