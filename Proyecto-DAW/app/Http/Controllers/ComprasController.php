<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Empleados;
use App\Models\Proveedores;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComprasController extends Controller {
    
    // Index del módulo de Compras
    public function index(){
        
        /* Recoger todos los registros de la tabla compras 
         con los productos de la tabla inventario y los provedores relacionados */
        $datosServidor = Compras::with('inventario:idInventario,farmaco', 'proveedores:idProveedor,empresa')->orderBy('fecha', 'desc')->get();

        // Recoger el campo empresa de todos los registros de la tabla proveedores
        $proveedores = Proveedores::pluck('empresa');

        // Recoger las variables de sesión
        $sesionUsuario = session()->get('usuario_autenticado');
        $mensaje = session()->get('mensaje');

        // Eliminar el mensaje de la sesión para que no se muestre en la siguiente solicitud
        session()->forget('mensaje');

        // Comporbar el rol del usuario de sesión
        $rolUsuario = Empleados::where('correo', $sesionUsuario)->first();
        $rolUsuario = $rolUsuario->rol;

        if ($rolUsuario === 'titular') {
            return Inertia::render('Compras/Compras', compact('sesionUsuario', 'datosServidor', 'proveedores', 'mensaje'));
        } else {
            return Inertia::render('SinPermisos');
        }
    }

    // Añadir compras a la tabla compras
    public function insert(Request $request) {
        
        // Buscar el registro del producto
        $inventario = Inventario::where('farmaco', $request->farmaco)->where('nombre', $request->nombre)->first();

        // Buscar el registro del proveedor
        $proveedor = Proveedores::where('empresa', $request->proveedor)->first();
    
        // Comprobar que el producto existe
        if ($inventario) {

            // Actualizar el producto
            $inventario->stock += $request->unidades;
            ($request->precio != $inventario->precio) ? $inventario->precio = $request->precio : null;
            ($request->prescripcion != $inventario->prescripcion) ? $inventario->prescripcion = $request->prescripcion : null;

        } else {

            // Si el producto no existe, añadirlo a la tabla inventario
            $inventario = new Inventario();
            $inventario->farmaco = $request->farmaco;
            $inventario->nombre = $request->nombre;
            $inventario->precio = $request->precio;
            $inventario->prescripcion = $request->prescripcion;
            $inventario->stock = $request->unidades;

        }
    
        $inventario->save();

        $compra = new Compras();
        $compra->importe = $request->importe;
        $compra->unidades = $request->unidades;
        $compra->fecha = $request->fecha;
        $compra->idProveedor = $proveedor->idProveedor;
        $compra->idInventario = $inventario->idInventario;

        if($compra->save() && $inventario->save()) {
            $mensaje = ['exito' => 'Compra añadida'];

        } else {
            $mensaje = ['error' => 'Error al añadir la compra, intentelo más tarde o contacte con soporte'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('compras.index');
    }

    // Eliminar un registro de la tabla
    public function delete(Request $request) {

        $compra = Compras::where('idCompra', $request->dato)->first();
        if ($compra->delete()) {
            $mensaje = ['exito' => 'Compra eliminada'];

        } else {
            $mensaje = ['error' => 'Error al eliminar la compra, intentelo más tarde o contacte con soporte'];

        }
        
        session()->flash('mensaje', $mensaje);

        return redirect()->route('compras.index');
    }
}
