<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VentasController extends Controller {
    public function index(){

        // Obtener todas las compras con los nombres de los empleados asociados
        $datosServidor = Ventas::with('clientes:idCliente,DNI/CIF', 'empleados:idEmpleado,correo')->get();
        dd($datosServidor);

        $sesionUsuario = session()->get('usuario_autenticado');

        return Inertia::render('Ventas/Ventas', compact('sesionUsuario', 'datosServidor'));
    }
}
