<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventarioController extends Controller {
    
    public function index(){

        // Recoger todos los registros de la tabla
        $datosServidor = Inventario::all();

        // Capturar la variable de sesión
        $sesionUsuario = session()->get('usuario_autenticado');

        return Inertia::render('Inventario/Inventario', compact('sesionUsuario', 'datosServidor'));
    }

    public function update(Request $request) {
        
        $inventrario = Inventario::where('idInventario', $request->idInventario)->first();

        ($request->precio != $inventrario->precio) ? $inventrario->precio = $request->precio : null;
        ($request->stock != $inventrario->stock) ? $inventrario->stock = $request->stock : null;
        
        $inventrario->save();
        return redirect()->route('inventario.index');
    }

    public function delete(Request $request) {

        $inventario = Inventario::where('idInventario', $request->dato)->first();
        $inventario->delete();

        return redirect()->route('inventario.index');
    }
}
