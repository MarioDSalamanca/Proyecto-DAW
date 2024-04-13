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
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->correo = $request->input('correo');
        $usuario->contrasena = Hash::make($request->input('contrasena'));;
        $usuario->rol = $request->input('rol');

        $usuario->save();
        return redirect()->route('empleados.index');
    }

    // Editar empleados de la tabla empleados
    public function update(Request $request) {

        $usuario = Empleados::where('idEmpleado', $request->input('idEmpleado'))->first();

        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->correo = $request->input('correo');
        if ($request->contrasena != $usuario->contrasena) {
            //dd($request->contrasena, $usuario->contrasena);
            $usuario->contrasena = Hash::make($request->input('contrasena'));
            //dd($request->contrasena, $usuario->contrasena);
        }
        $usuario->rol = $request->input('rol');
        
        $usuario->save();
        return redirect()->route('empleados.index');
    }

    // Eliminar empleados de la tabla empleados
    public function delete(Request $request) {

        $usuario = Empleados::where('correo', $request->input('correo'));
        $usuario->delete();

        return redirect()->route('empleados.index');
        //return Inertia::render('Empleados/Empleados', ['mensaje' => ['Se ha eliminado el usuario '. $request->input('correo') .'']]);
    }
}
