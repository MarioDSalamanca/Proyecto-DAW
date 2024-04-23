<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use App\Models\Detalle_ventas;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VentasController extends Controller {
    public function index(){

        // Obtener todas las compras con los nombres de los empleados asociados
        $datosServidor = Ventas::with('clientes', 'empleados', 'detalle_venta', 'detalle_venta.inventario')->get();

        //dd($datosServidor = Ventas::with('clientes', 'empleados', 'detalle_venta', 'detalle_venta.inventario')->get());

        $sesionUsuario = session()->get('usuario_autenticado');

        return Inertia::render('Ventas/Ventas', compact('sesionUsuario', 'datosServidor'));
    }
}
