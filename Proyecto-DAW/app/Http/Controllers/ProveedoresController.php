<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProveedoresController extends Controller {
    public function index(){
        // Recoger todos los registros de la tabla
        $datosServidor = Proveedores::all();

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');
        // Invocar la vista de Inertia en 'resources/Pages/Empleados' pasando la prop usuarios
        // return Inertia::render('Empleados/Empleados', compact('usuarios', 'sesionUsuario'));
        return Inertia::render('Proveedores/Proveedores', compact('sesionUsuario', 'datosServidor'));
    }
}
