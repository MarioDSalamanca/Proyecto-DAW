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
        return Inertia::render('Compras/Compras', compact('sesionUsuario', 'datosServidor', 'proveedores'));
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
                
                $inventario->save();

            } else {

                // Si el inventario no existe, crea uno nuevo
                $inventario = new Inventario();
                $inventario->farmaco = $request->farmaco;
                $inventario->nombre = $request->nombre;
                // Calcular el precio del producto
                /** PONER EL PRECIO DE CADA PRODUCTO AL INSERTAR LA COMPRA
                 * EN EL MÓDULO DE INVENTARIO SE PODRÁ EDITAR CADA PRODUCTO Y BORRAR UN Nº ESPECÍFICO
                 * 
                 * TAREASSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
                 * 
                 */
                $precioPorUnidad = ($request->importe / $request->unidades) + 1;
                $inventario->precio = $precioPorUnidad;
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

        } else {
            
            return null;

        }

        return redirect()->route('compras.index');
    }
}
