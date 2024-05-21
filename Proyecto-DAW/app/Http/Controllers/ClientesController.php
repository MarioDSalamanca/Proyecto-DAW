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
        $cliente = new Clientes();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->cipa = $request->cipa;

        $cliente->save();
        return redirect()->route('clientes.index');
    }

    // Editar Clientes de la tabla Clientes
    public function update(Request $request) {

        $cliente = Clientes::where('idCliente', $request->idCliente)->first();

        ($request->nombre != $cliente->nombre) ? $cliente->nombre = $request->nombre : null;
        ($request->apellido != $cliente->apellido) ? $cliente->apellido = $request->apellido : null;
        ($request->cipa != $cliente->cipa) ? $cliente->cipa = $request->cipa : null;
        
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    // Eliminar Clientes de la tabla Clientes
    public function delete(Request $request) {

        $cliente = Clientes::where('cipa', $request->dato);
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}
