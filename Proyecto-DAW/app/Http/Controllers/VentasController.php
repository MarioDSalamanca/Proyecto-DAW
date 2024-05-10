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
    public function index(){

        // Obtener todas las compras con los nombres de los empleados asociados
        $datosServidor = Ventas::with(
            'clientes:idCliente,nombre,apellido,cipa',
            'empleados:idEmpleado,correo',
            'detalle_ventas:idDetalleVenta,unidades,idVenta,idInventario',
            'detalle_ventas.inventario:idInventario,nombre,farmaco,stock'
        )->get();

        $empleados = Empleados::pluck('correo');

        $clientes = Clientes::pluck('cipa');

        $productos = Inventario::all(['idInventario', 'nombre', 'prescripcion']);

        $sesionUsuario = session()->get('usuario_autenticado');

        return Inertia::render('Ventas/Ventas', compact('sesionUsuario', 'datosServidor', 'empleados', 'clientes', 'productos'));
    }

    // Añadir tareas a la tabla tareas
    public function insert(Request $request) {
        
        //dd($request);
        /* {
        "empleado":"iker@example.com",
        "fecha":"2024-05-10T08:41",
        "productos-1":{
            "producto":{
                "idInventario":1,
                "nombre":"ibufen",
                "prescripcion":0},
                "unidades":1
            }
        } */

        // Capturar el empleado
        $idEmpleado = Empleados::where('correo', $request->empleado)->get('idEmpleado');

        // Capturar el cipa si llega en la llamada
        if ($request->cipa) {

            // Comprobar que existe un cliente con ese cipa
            $cliente = Clientes::where('cipa', $request->cipa)->first();

            // Si existe capturar su id
            if ($cliente) {

                $idCliente = $cliente->idCliente;

            // Si no existe crearlo y capturar el id
            } else {
                $cliente = new Cliente();
                $cliente->cipa = $request->cipa;
                $cliente->nombre = $request->nombre;
                $cliente->apellido = $request->apellido;

                $cliente->save();

                $idCliente = Clientes::where('cipa', $cliente->cipa)->get('idCliente');
            }
        }

        // Capturar los productos que llegan en la llamada

        $datos = $request->all();

        $idsInventario = [];

        $importe = 0;

        foreach ($datos as $i => $dato) {
            if (Str::startsWith($i, 'productos-')) {

                $idInventario = $dato['producto']['idInventario'];

                array_push($idsInventario, $idInventario);

                $producto = Inventario::find($idInventario);

                $importe += $producto->precio*$dato['unidades'];
                $producto->stock -= $dato['unidades'];
                $producto->save();
            }
        }

        dd($idsInventario, $idCliente, $idEmpleado);
        





        // Crear un objeto para guardar los datos
        $venta = new Venta();
        $venta->importe = $importe;
        $venta->fecha = $request->fecha;
        $idCliente ? $venta->idCliente = $idCliente : null;
        $venta->idEmpleado = $request->idEmpleado;


        $venta->save();
        return redirect()->route('tareas.index');
    }

    public function delete(Request $request) {

        $venta = Ventas::where('idVenta', $request->dato)->first();
        $venta->delete();

        return redirect()->route('ventas.index');
    }
}
