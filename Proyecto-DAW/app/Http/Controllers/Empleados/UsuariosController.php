<?php

namespace App\Http\Controllers\Empleados;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UsuariosController extends Controller
{
    public function index() {
        // Recoger todos los registros de la tabla usuarios refiriendonos al modelo Usuarios
        $usuarios = Usuarios::all();

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');
        // Invocar la vista de Inertia en 'resources/Pages/Empleados' pasando la prop usuarios
        return Inertia::render('Empleados/Empleados', compact('usuarios', 'sesionUsuario'));
    }

    // Añadir empleados a la tabla usuarios
    public function insert(Request $request) {
        
        // Crear un objeto para guardar los datos
        $usuario = new Usuarios();
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->correo = $request->input('correo');
        $usuario->contrasena = Hash::make($request->input('contrasena'));;
        $usuario->rol = $request->input('rol');

        $usuario->save();
        return redirect()->route('empleados.index');
    }

    // Editar empleados de la tabla usuarios
    public function update(Request $request) {
        $usuario = Usuarios::where('idUsuario', $request->input('idUsuario'))->first();

        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->correo = $request->input('correo');
        $usuario->contrasena = Hash::make($request->input('contrasena'));;
        $usuario->rol = $request->input('rol');
        
        $usuario->save();
        return redirect()->route('empleados.index');
    }

    // Eliminar empleados de la tabla usuarios
    public function delete(Request $request) {

        $usuario = Usuarios::where('correo', $request->input('correo'));
        $usuario->delete();

        return redirect()->route('empleados.index');
        //return Inertia::render('Empleados/Empleados', ['mensaje' => ['Se ha eliminado el usuario '. $request->input('correo') .'']]);
    }

    // Cerrar sesión
    public function logout() {
        session()->forget('usuario_autenticado');
        return redirect()->route('login');
    }
}