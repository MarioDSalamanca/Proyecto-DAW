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
        
        return Inertia::render('Proveedores/Proveedores', compact('sesionUsuario', 'datosServidor'));
    }

    public function insert(Request $request) {
        
        $proveedor = new Proveedores();
        $proveedor->empresa = $request->empresa;
        $proveedor->especialidad = $request->especialidad;

        $proveedor->save();
        return redirect()->route('proveedores.index');
    }

    public function delete(Request $request) {

        $compra = Proveedores::where('idProveedor', $request->dato)->first();
        $compra->delete();

        return redirect()->route('proveedores.index');
    }
}
