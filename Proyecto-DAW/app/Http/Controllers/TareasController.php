<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Tareas;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TareasController extends Controller {
    public function index(){

        /* Recoger todos los registros de la tabla compras 
         con los empleados de la tabla empleados relacionados */
        $datosServidor = Tareas::with('empleados:idEmpleado,correo')->get();

        // Recoger el campo correo de todos los registros de la tabla empleados
        $empleados = Empleados::pluck('correo');

        // Recoger las variables de sesión
        $sesionUsuario = session()->get('usuario_autenticado');
        $mensaje = session()->get('mensaje');

        // Eliminar el mensaje de la sesión para que no se muestre en la siguiente solicitud
        session()->forget('mensaje');

        // Invocar la vista de Inertia en 'resources/Pages/Tareas' pasando las prop
        return Inertia::render('Tareas/Tareas', compact('sesionUsuario', 'datosServidor', 'empleados', 'mensaje'));
    }
    
    // Añadir un registro a la tabla
    public function insert(Request $request) {
        
        $empleado = Empleados::where('correo', $request->empleado)->first();
        
        // Crear un objeto para guardar los datos
        $tarea = new Tareas();
        $tarea->nombre = $request->nombre;
        $tarea->fecha = $request->fecha;
        $tarea->descripcion = $request->descripcion;
        $tarea->estado = $request->estado;
        $tarea->idEmpleado = $empleado->idEmpleado;

        if ($tarea->save()) {
            $mensaje = ['exito' => 'Tarea añadida'];

        } else {
            $mensaje = ['error' => 'Error al añadir la tarea, intentelo más tarde o contacte con soporte'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('tareas.index');
    }

    // Actualizar un registro de la tabla
    public function update(Request $request) {
        
        // Comprobar si se ha modificado o no el correo al editar
        if (isset($request->empleados['correo'])) {
            $empleado = Empleados::where('correo', $request->empleados['correo'])->value('idEmpleado');

        } else if (isset($request->empleados)) {
            $empleado = Empleados::where('correo', $request->empleados)->value('idEmpleado');

        }

        $tarea = Tareas::where('idTarea', $request->idTarea)->first();

        ($request->nombre != $tarea->nombre) ? $tarea->nombre = $request->nombre : null;
        ($request->fecha != $tarea->fecha) ? $tarea->fecha = $request->fecha : null;
        ($request->descripcion != $tarea->descripcion) ? $tarea->descripcion = $request->descripcion : null;
        ($request->estado != $tarea->estado) ? $tarea->estado = $request->estado : null;
        ($empleado != null && $empleado != $tarea->idEmpleado) ? $tarea->idEmpleado = $empleado : null;
        
        if ($tarea->save()) {
            $mensaje = ['exito' => 'Tarea actualizada'];

        } else {
            $mensaje = ['error' => 'Error al actualizar la tarea, intentelo más tarde o contacte con soporte'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('tareas.index');
    }

    // Eliminar un registro de la tabla
    public function delete(Request $request) {

        $tarea = Tareas::where('idTarea', $request->dato)->first();
        
        if ($tarea->delete()) {
            $mensaje = ['exito' => 'Tarea eliminada'];

        } else {
            $mensaje = ['error' => 'Error al eliminar la tarea, intentelo más tarde o contacte con soporte'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('tareas.index');
    }
}
