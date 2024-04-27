<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use App\Models\Detalle_ventas;
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

        $sesionUsuario = session()->get('usuario_autenticado');

        return Inertia::render('Ventas/Ventas', compact('sesionUsuario', 'datosServidor'));
    }

    // Añadir tareas a la tabla tareas
    /*public function insert(Request $request) {
        
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

        $tarea = Tareas::where('idTarea', $request->dato)->first();
        $tarea->delete();

        return redirect()->route('tareas.index');
    }*/
}
