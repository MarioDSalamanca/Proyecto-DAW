<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientesController extends Controller {
    public function index() {
        // Recoger todos los registros de la tabla Clientes refiriendonos al modelo Clientes
        $datosServidor = Clientes::all();

        // Coger la variable de sesión para pruebas
        $sesionUsuario = session()->get('usuario_autenticado');

        return Inertia::render('Clientes/Clientes', compact('datosServidor', 'sesionUsuario'));
    }

    // Añadir Clientes a la tabla Clientes
    public function insert(Request $request) {
        
        // Crear un objeto para guardar los datos
        $usuario = new Clientes();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->correo = $request->correo;
        $usuario->contrasena = Hash::make($request->contrasena);;
        $usuario->rol = $request->rol;

        $usuario->save();
        return redirect()->route('Clientes.index');
    }

    // Editar Clientes de la tabla Clientes
    public function update(Request $request) {

        $usuario = Clientes::where('idEmpleado', $request->idEmpleado)->first();

        ($request->nombre != $usuario->nombre) ? $usuario->nombre = $request->nombre : null;
        ($request->apellido != $usuario->apellido) ? $usuario->apellido = $request->apellido : null;
        ($request->correo != $usuario->correo) ? $usuario->correo = $request->correo : null;
        ($request->contrasena != $usuario->contrasena) ? $usuario->contrasena = Hash::make($request->contrasena) : null;
        ($request->rol != $usuario->rol) ? $usuario->rol = $request->rol : null;
        
        $usuario->save();
        return redirect()->route('Clientes.index');
    }

    // Eliminar Clientes de la tabla Clientes
    public function delete(Request $request) {

        $usuario = Clientes::where('correo', $request->dato);
        $usuario->delete();

        return redirect()->route('Clientes.index');
    }
}
