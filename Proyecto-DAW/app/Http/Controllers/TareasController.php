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
        $datosServidor = Tareas::with('empleados')->get();

        // Invocar la vista de Inertia en 'resources/Pages/Tareas' pasando la prop usuarios
        // return Inertia::render('Tareas/Tareas', compact('usuarios', 'sesionUsuario'));
        return Inertia::render('Tareas/Tareas', compact('sesionUsuario', 'datosServidor'));
    }
    
    // Añadir tareas a la tabla tareas
    public function insert(Request $request) {
        
        $empleado = Empleados::where('idEmpleado', $request->idEmpleado)->first();
        dd($empleado);
        // Crear un objeto para guardar los datos
        $tarea = new Tareas();
        $tarea->nombre = $request->nombre;
        $tarea->fecha = $request->fecha;
        $tarea->descripcion = $request->descripcion;
        $tarea->estado = $request->estado;
        $tarea->rol = $request->rol;

        $tarea->save();
        return redirect()->route('tareas.index');
    }

    // Editar tareas de la tabla tareas
    public function update(Request $request) {

        $usuario = Tareas::where('idEmpleado', $request->idEmpleado)->first();

        ($request->nombre != $usuario->nombre) ? $usuario->nombre = $request->nombre : null;
        ($request->apellido != $usuario->apellido) ? $usuario->apellido = $request->apellido : null;
        ($request->correo != $usuario->correo) ? $usuario->correo = $request->correo : null;
        //($request->contrasena != $usuario->contrasena) ? $usuario->contrasena = Hash::make($request->contrasena) : null;
        ($request->rol != $usuario->rol) ? $usuario->rol = $request->rol : null;
        
        $usuario->save();
        return redirect()->route('tareas.index');
    }

    // Eliminar tareas de la tabla tareas
    public function delete(Request $request) {

        $usuario = Tareas::where('correo', $request->dato);
        $usuario->delete();

        return redirect()->route('tareas.index');
    }
}
