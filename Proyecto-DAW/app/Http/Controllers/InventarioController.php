<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventarioController extends Controller {
    
    // Index del módulo de clientes
    public function index(){

        // Recoger todos los registros de la tabla inventario
        $datosServidor = Inventario::all();

        // Recoger las variables de sesión
        $sesionUsuario = session()->get('usuario_autenticado');
        $mensaje = session()->get('mensaje');

        // Eliminar el mensaje de la sesión para que no se muestre en la siguiente solicitud
        session()->forget('mensaje');

        return Inertia::render('Inventario/Inventario', compact('sesionUsuario', 'datosServidor', 'mensaje'));
    }

    // Actualizar un registro de la tabla
    public function update(Request $request) {
        
        $inventario = Inventario::where('idInventario', $request->idInventario)->first();

        ($request->precio != $inventario->precio) ? $inventario->precio = $request->precio : null;
        ($request->stock != $inventario->stock) ? $inventario->stock = $request->stock : null;
        
        if ($inventario->save()) {
            $mensaje = ['exito' => 'Producto actualizado.'];

        } else {
            $mensaje = ['error' => 'Error al actualizar el producto, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('inventario.index');
    }

    // Eliminar un registro de la tabla
    public function delete(Request $request) {

        $inventario = Inventario::where('idInventario', $request->dato)->first();
        
        if ($inventario->delete()) {
            $mensaje = ['exito' => 'Producto eliminado.'];
            
        } else {
            $mensaje = ['error' => 'Error al eliminar el producto, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('inventario.index');
    }
}
