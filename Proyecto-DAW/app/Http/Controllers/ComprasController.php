<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Proveedores;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComprasController extends Controller {
    
    public function index(){
        
        // Recoger todos los registros de la tabla
        $datosServidor = Compras::all();

        // Obtener todas las compras con los nombres de los empleados asociados
        $datosServidor = Compras::with('inventario:idInventario,farmaco', 'proveedores:idProveedor,empresa')->get();

        $proveedores = Proveedores::pluck('empresa');

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');
        // Invocar la vista de Inertia en 'resources/Pages/Empleados' pasando la prop usuarios
        // return Inertia::render('Empleados/Empleados', compact('usuarios', 'sesionUsuario'));
        return Inertia::render('Compras/Compras', compact('sesionUsuario', 'datosServidor', 'proveedores'));
    }

    // Añadir compras a la tabla compras
    public function insert(Request $request) {
        
        $proveedor = Proveedores::where('empresa', $request->proveedor)->first();

        // NO ESTOY MUY CONVENCIDO DE QUE VAYA A FUNCIONAR ESTO!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $inventario = Inventario::where('farmaco', $request->farmaco && 'nombre', $request->nombre)->value('stock');
        
        dd($inventario);

        // Crear un objeto para guardar los datos
        $compra = new Compras();
        $compra->importe = $request->importe;
        $compra->unidades = $request->unidades;
        $compra->fecha = $request->fecha;
        $compra->idProveedor = $proveedor->idProveedor;
        ( count($inventario) == 1 ) ? $stock + $inventario
        // HACER EL IF DE SI EXISTE EN EL INVENTARIO ESTA VAINA
        // Falta sacar el idInventario!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        $compra->save();
        return redirect()->route('compras.index');
    }
}
