<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Empleados;
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

        // Comporbar el rol del usuario de sesión
        $rolUsuario = Empleados::where('correo', $sesionUsuario)->first();
        $rolUsuario = $rolUsuario->rol;

        if ($rolUsuario === 'adjunto' || $rolUsuario === 'titular') {
            return Inertia::render('Compras/Compras', compact('sesionUsuario', 'datosServidor', 'proveedores'));
        } else {
            return Inertia::render('SinPermisos');
        }
    }

    // Añadir compras a la tabla compras
    public function insert(Request $request) {
        
        $proveedor = Proveedores::where('empresa', $request->proveedor)->first();

        // Mirar si el proveedor existe
        if ($proveedor) {

            // Buscar el registro del producto
            $inventario = Inventario::where('farmaco', $request->farmaco)->where('nombre', $request->nombre)->first();
        
            // Verificar si se encontró el producto
            if ($inventario) {

                // Si el inventario existe, actualiza el stock
                $inventario->stock += $request->unidades;
                ($request->precio != $inventario->precio) ? $inventario->precio = $request->precio : null;
                
                $inventario->save();

            } else {

                // Si el inventario no existe, crea uno nuevo
                $inventario = new Inventario();
                $inventario->farmaco = $request->farmaco;
                $inventario->nombre = $request->nombre;
                $inventario->precio = $request->precio;
                $inventario->stock = $request->unidades;

                $inventario->save();

            }
        
            $compra = new Compras();
            $compra->importe = $request->importe;
            $compra->unidades = $request->unidades;
            $compra->fecha = $request->fecha;
            $compra->idProveedor = $proveedor->idProveedor;
            $compra->idInventario = $inventario->idInventario;

            $compra->save();

        }

        return redirect()->route('compras.index');
    }

    public function delete(Request $request) {

        $compra = Compras::where('idCompra', $request->dato)->first();
        $compra->delete();

        return redirect()->route('compras.index');
    }
}
