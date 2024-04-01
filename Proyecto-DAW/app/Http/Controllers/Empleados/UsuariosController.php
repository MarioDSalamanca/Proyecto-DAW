<?php

namespace App\Http\Controllers\Empleados;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request; 
use Inertia\Inertia;

class UsuariosController extends Controller
{
    public function index() {
        // Recoger todos los registros de la tabla usuarios refiriendonos al modelo Usuarios
        $usuarios = Usuarios::all();

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');
        // Invocar la vista de Inertia en 'resources/Pages/Empleados' pasando la prop usuarios
        return Inertia::render('Empleados/Index', compact('usuarios', 'sesionUsuario'));
    }

    public function logout() {
        session()->forget('usuario_autenticado');
        return redirect()->route('login');
    }

    // Para almacenar usuarios en la bbdd, coge los datos con el objeto Request del formulario
    /*public function store(Request $request) {
        // Validar los datos
        $request->validate([
            'Nombre' => 'required|max:20',
            'Apellido' => 'required|max:20',
            'Correo' => 'required|max:50',
            'Contrasena' => 'required|max:15',
            'Rol' => 'required|max:10'
        ]);
        // Crear un objeto para guardar los datos
        $usuario = new Usuarios($request->input());
        $usuario->save();
        return redirect('empleados');
    }

    public function update(Request $request, $id) {
        $usuario = Usuarios::find($id);
        $usuario->fill($request->input())->saveOrFail();
        return redirect('empleados');
    }*/

}