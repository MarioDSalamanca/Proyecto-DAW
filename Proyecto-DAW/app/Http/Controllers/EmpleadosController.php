<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class empleadosController extends Controller {
    public function index() {
        // Recoger todos los registros de la tabla empleados refiriendonos al modelo empleados
        $datosServidor = Empleados::all();

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');

        // Comporbar el rol del usuario de sesión
        $rolUsuario = Empleados::where('correo', $sesionUsuario)->first();
        $rolUsuario = $rolUsuario->rol;

        if ($rolUsuario === 'adjunto' || $rolUsuario === 'titular') {
            return Inertia::render('Empleados/Empleados', compact('datosServidor', 'sesionUsuario'));
        } else {
            return Inertia::render('SinPermisos');
        }
    }

    // Añadir empleados a la tabla empleados
    public function insert(Request $request) {
        
        // Crear un objeto para guardar los datos
        $usuario = new Empleados();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->correo = $request->correo;
        $usuario->contrasena = Hash::make($request->contrasena);;
        $usuario->rol = $request->rol;

        $usuario->save();
        return redirect()->route('empleados.index');
    }

    // Editar empleados de la tabla empleados
    public function update(Request $request) {

        $usuario = Empleados::where('idEmpleado', $request->idEmpleado)->first();

        ($request->nombre != $usuario->nombre) ? $usuario->nombre = $request->nombre : null;
        ($request->apellido != $usuario->apellido) ? $usuario->apellido = $request->apellido : null;
        ($request->correo != $usuario->correo) ? $usuario->correo = $request->correo : null;
        ($request->contrasena != $usuario->contrasena) ? $usuario->contrasena = Hash::make($request->contrasena) : null;
        ($request->rol != $usuario->rol) ? $usuario->rol = $request->rol : null;
        
        $usuario->save();
        return redirect()->route('empleados.index');
    }

    // Eliminar empleados de la tabla empleados
    public function delete(Request $request) {

        $usuario = Empleados::where('correo', $request->dato);
        $usuario->delete();

        return redirect()->route('empleados.index');
    }
}
