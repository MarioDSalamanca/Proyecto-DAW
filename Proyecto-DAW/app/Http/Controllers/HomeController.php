<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Ventas;
use Inertia\Inertia;
use Carbon\Carbon;

class HomeController extends Controller {
    public function index() {
        $sesionUsuario = session()->get('usuario_autenticado');

        // Obtener la fecha de inicio del último mes
        $fechaInicio = Carbon::now()->subMonth()->startOfMonth();
        // Obtener la fecha de fin del último mes
        $fechaFin = Carbon::now()->subMonth()->endOfMonth();

        // Calcular la suma de los importes de las compras y ventas del último mes
        $comprasMes = Compras::whereBetween('fecha', [$fechaInicio, $fechaFin])->sum('importe');
        $ventasMes = Ventas::whereBetween('fecha', [$fechaInicio, $fechaFin])->sum('importe');

        // Obtener el año actual
        $año = Carbon::now()->year;

        // Calcular la suma de los importes de las compras del año actual
        $comprasAño = Compras::whereYear('fecha', $año)->sum('importe');
        $ventasAño = Ventas::whereYear('fecha', $año)->sum('importe');

        return Inertia::render('Home', compact('sesionUsuario', 'comprasMes', 'ventasMes', 'comprasAño', 'ventasAño'));
    }

    // Cerrar sesión
    public function logout() {
        session()->forget('usuario_autenticado');
        return redirect()->route('login');
    }
}
