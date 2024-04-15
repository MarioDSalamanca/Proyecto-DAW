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

        // Invocar la vista de Inertia en 'resources/Pages/Tareas' pasando la prop usuarios
        // return Inertia::render('Tareas/Tareas', compact('usuarios', 'sesionUsuario'));
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

        $empleado = Empleados::where('correo', $request->empleados['correo'])->first();

        $tarea = Tareas::where('idTarea', $request->idTarea)->first();

        ($request->nombre != $tarea->nombre) ? $tarea->nombre = $request->nombre : null;
        ($request->fecha != $tarea->fecha) ? $tarea->fecha = $request->fecha : null;
        ($request->descripcion != $tarea->descripcion) ? $tarea->descripcion = $request->descripcion : null;
        ($request->estado != $tarea->estado) ? $tarea->estado = $request->estado : null;

        // Falta comparar el correo anterior con el correo nuevo y si es distinto actualizar el idEmpleado que le corresponda
        /***************************************************************************************************************** */
        /***************************************************************************************************************** */
        /***************************************************************************************************************** */
        /***************************************************************************************************************** */
        ($request->estado != $tarea->estado) ? $tarea->estado = $request->estado : null;
        
        $tarea->save();
        return redirect()->route('tareas.index');
    }

    // Eliminar tareas de la tabla tareas
    public function delete(Request $request) {

        $usuario = Tareas::where('correo', $request->dato);
        $usuario->delete();

        return redirect()->route('tareas.index');
    }
}
