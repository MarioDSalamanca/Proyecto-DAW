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

    public function logout() {
        session()->forget('usuario_autenticado');
        return redirect()->route('login');
    }

    // Para almacenar usuarios en la bbdd, coge los datos con el objeto Request del formulario
    public function save(Request $request) {
        
        // Crear un objeto para guardar los datos
        $usuario = new Usuarios();
        $usuario->Nombre = $request->input('nombre');
        $usuario->Apellido = $request->input('apellido');
        $usuario->Correo = $request->input('correo');
        $usuario->Contrasena = Hash::make($request->input('contrasena'));;
        $usuario->Rol = $request->input('rol');

        $usuario->save();
        return redirect()->route('empleados.index');
    }

    /*public function update(Request $request, $id) {
        $usuario = Usuarios::find($id);
        $usuario->fill($request->input())->saveOrFail();
        return redirect('empleados');
    }*/

}