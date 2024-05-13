<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Ventas;
use App\Models\Tareas;
use App\Models\Empleados;
use Inertia\Inertia;
use Carbon\Carbon;

class HomeController extends Controller {
    public function index() {
    $sesionUsuario = session()->get('usuario_autenticado');

    // Obtener las últimas ventas agrupadas por mes
    $fecha = Carbon::now()->subMonths(6);
    $ventas = Ventas::selectRaw('YEAR(fecha) as año, MONTH(fecha) as mes, SUM(importe) as importe')
        ->where('fecha', '>=', $fecha)
        ->groupBy('año', 'mes')
        ->get();

    // Obtener las últimas compras agrupadas por mes
    $compras = Compras::selectRaw('YEAR(fecha) as año, MONTH(fecha) as mes, SUM(importe) as importe')
        ->where('fecha', '>=', $fecha)
        ->groupBy('año', 'mes')
        ->get();


    $idUsuario = Empleados::where('correo', $sesionUsuario)->value('idEmpleado');
    $tareas = Tareas::where('idEmpleado', $idUsuario)->get();

    return Inertia::render('Home', compact('sesionUsuario', 'ventas', 'compras', 'tareas'));
}


    // Cerrar sesión
    public function logout() {
        session()->forget('usuario_autenticado');
        return redirect()->route('login');
    }
}
