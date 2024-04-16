<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Tareas;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TareasController extends Controller {
    public function index(){

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');

        // Obtener todas las tareas con los nombres de los empleados asociados
        $datosServidor = Tareas::with('empleados:idEmpleado,correo')->get();

        $empleados = Empleados::pluck('correo');

        // Invocar la vista de Inertia en 'resources/Pages/Tareas' pasando las prop
        return Inertia::render('Tareas/Tareas', compact('sesionUsuario', 'datosServidor', 'empleados'));
    }
    
    // Añadir tareas a la tabla tareas
    public function insert(Request $request) {
        
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

    // Editar tareas de la tabla tareas
    public function update(Request $request) {
        
        // Comprobar si se ha modificado o no el correo al editar
        if (isset($request->empleados['correo'])) {
            $empleado = Empleados::where('correo', $request->empleados['correo'])->value('idEmpleado');

        } else if (isset($request->empleados)) {
            $empleado = Empleados::where('correo', $request->empleados)->value('idEmpleado');

        }

        // Sacar el id de la tarea que se va a modificar
        $tarea = Tareas::where('idTarea', $request->idTarea)->first();

        ($request->nombre != $tarea->nombre) ? $tarea->nombre = $request->nombre : null;
        ($request->fecha != $tarea->fecha) ? $tarea->fecha = $request->fecha : null;
        ($request->descripcion != $tarea->descripcion) ? $tarea->descripcion = $request->descripcion : null;
        ($request->estado != $tarea->estado) ? $tarea->estado = $request->estado : null;
        // Comprueba si $empleados es null (si se ha ingresado un empleado válido) y si es distinto del que había
        ($empleado != null && $empleado != $tarea->idEmpleado) ? $tarea->idEmpleado = $empleado : null;
        
        $tarea->save();
        return redirect()->route('tareas.index');
    }

    // Eliminar tareas de la tabla tareas
    public function delete(Request $request) {

        $tarea = Tareas::where('idTarea', $request->dato)->first();
        $tarea->delete();

        return redirect()->route('tareas.index');
    }
}
