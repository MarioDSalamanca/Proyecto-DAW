<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Ventas;
use App\Models\Detalle_ventas;
use App\Models\Empleados;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class VentasController extends Controller {

    // Index del módulo de ventas
    public function index(){

        /* Recoger todos los registros de la tabla ventas 
         y los clientes y empleados de las tablas clientes y empleados
         y los detalles_venta de la tabla detalle_ventas 
         y productos de la tabla inventario relacionados con la tabla ventas */
        $datosServidor = Ventas::with(
            'clientes:idCliente,nombre,apellido,cipa',
            'empleados:idEmpleado,correo',
            'detalle_ventas:idDetalleVenta,unidades,idVenta,idInventario',
            'detalle_ventas.inventario:idInventario,nombre,farmaco,precio,stock'
        )->get();

        // Recoger el campo correo de todos los registros de la tabla empleados
        $empleados = Empleados::pluck('correo');

        // Recoger el campo cipa de todos los registros de la tabla clientes
        $clientes = Clientes::pluck('cipa');

        // Recoger los campos nombre y prescripción de todos los registros de la tabla inventario
        $productos = Inventario::all(['idInventario', 'nombre', 'prescripcion']);

        // Recoger las variables de sesión
        $sesionUsuario = session()->get('usuario_autenticado');
        $mensaje = session()->get('mensaje');

        // Eliminar el mensaje de la sesión para que no se muestre en la siguiente solicitud
        session()->forget('mensaje');

        return Inertia::render('Ventas/Ventas', compact('sesionUsuario', 'datosServidor', 'empleados', 'clientes', 'productos', 'mensaje'));
    }

    // Añadir un registro a la tabla
    public function insert(Request $request) {

        $idEmpleado = Empleados::where('correo', $request->empleado)->value('idEmpleado');

        // Inicializar cliente nulo
        $idCliente = null;

        // Capturar el cipa si llega en la llamada
        if ($request->cipa) {

            // Comprobar que existe un cliente con ese cipa
            $cliente = Clientes::where('cipa', $request->cipa)->first();

            // Si existe capturar su id
            if ($cliente) {

                $idCliente = Clientes::where('cipa', $request->cipa)->value('idCliente');

            // Si no existe crearlo y capturar el id
            } else {
                
                $cliente = new Clientes();
                $cliente->cipa = $request->cipa;
                $cliente->nombre = $request->nombre;
                $cliente->apellido = $request->apellido;

                $cliente->save();

                $idCliente = Clientes::where('cipa', $request->cipa)->value('idCliente');
            }
        }

        // Crear un objeto para guardar los datos
        $venta = new Ventas();
        $venta->importe = $importe;
        $venta->fecha = $request->fecha;
        $idCliente != null ? $venta->idCliente = $idCliente : $venta->idCliente = null;
        $venta->idEmpleado = $idEmpleado;

        // Insertar el registro de la venta y capturar su idVenta
        $venta->save();
        $idVenta = $venta->idVenta;

        // Capturar los productos que llegan en la llamada
        $datos = $request->all();

        $importe = 0;
        $insertados;

        // Recorrer todas las listas de productos
        foreach ($datos as $i => $dato) {
            if (Str::startsWith($i, 'productos-')) {

                // Capturar el producto de cada lista
                $idInventario = $dato['producto']['idInventario'];

                // Actualizar el registro de cada producto
                $producto = Inventario::find($idInventario);

                $importe += $producto->precio*$dato['unidades'];
                $producto->stock -= $dato['unidades'];

                $producto->save();

                // Crear la relación entre ventas e inventario en la tabla detalle_ventas
                $detalle_venta = new Detalle_ventas();
                $detalle_venta->unidades = $dato['unidades'];
                $detalle_venta->idInventario = $idInventario;
                $detalle_venta->idVenta = $idVenta;

                $detalle_venta->save();

                // Comprobar que se guardan los registros en las tablas
                if ($detalle_venta->save() && $producto->save()) {
                    $insertados = true;
                } else {
                    $insertados = false;
                    break;
                }
            }
        }

        if ($venta->save() && $insertados) {
            $mensaje = ['exito' => 'Registro de venta añadido.'];

        } else {
            $mensaje = ['error' => 'Error al añadir la venta, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('ventas.index');
    }

    // Eliminar un registro de la tabla
    public function delete(Request $request) {

        $venta = Ventas::where('idVenta', $request->dato)->first();
        
        if ($venta->delete()) {
            $mensaje = ['exito' => 'Registro de venta eliminado.'];

        } else {
            $mensaje = ['error' => 'Error al eliminar el registro de la venta, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('ventas.index');
    }
}
