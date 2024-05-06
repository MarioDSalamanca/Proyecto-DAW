<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Ventas;
use App\Models\Detalle_ventas;
use App\Models\Empleados;
use App\Models\Inventario;
use Illuminate\Http\Request;
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
        
        dd("HOLA");

        $empleado = Empleados::where('correo', $request->empleado)->first();
        
        // Crear un objeto para guardar los datos
        $tarea = new Tareas();
        $tarea->nombre = $request->nombre;
        $tarea->fecha = $request->fecha;
        $tarea->descripcion = $request->descripcion;
        $tarea->estado = $request->estado;
        $tarea->idEmpleado = $empleado->idEmpleado;

        $tarea->save();
        return redirect()->route('tareas.index');
    }

    public function delete(Request $request) {

        $tarea = Ventas::where('idVenta', $request->dato)->first();
        $tarea->delete();

        return redirect()->route('ventas.index');
    }
}
