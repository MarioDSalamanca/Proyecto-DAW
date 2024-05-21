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

        // Recuperar el mensaje de la sesión
        $mensaje = session()->get('mensaje');

        // Eliminar el mensaje de la sesión para que no se muestre en la siguiente solicitud
        session()->forget('mensaje');

        return Inertia::render('Clientes/Clientes', compact('datosServidor', 'sesionUsuario', 'mensaje'));
    }

    // Añadir Clientes a la tabla Clientes
    public function insert(Request $request) {
        
        $datosServidor = Clientes::all();
        $sesionUsuario = session()->get('usuario_autenticado');

        $existe = Clientes::where('cipa', $request->cipa)->first();

        if ($existe) {

            $mensaje = ['error' => 'Ya existe un cliente con el cipa ' . $request->cipa];

            // Almacenar el mensaje en la sesión
            session()->flash('mensaje', $mensaje);

            // Redireccionar de vuelta a la página de clientes.index
            return redirect()->route('clientes.index');
            
        } else {
            // Crear un objeto para guardar los datos
            $cliente = new Clientes();
            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->cipa = $request->cipa;

            $cliente->save();
            
            $mensaje = ['exito' => 'Cliente con el cipa '.$request->cipa.' añadido.'];

            // Almacenar el mensaje en la sesión
            session()->flash('mensaje', $mensaje);

            // Redireccionar de vuelta a la página de clientes.index
            return redirect()->route('clientes.index');
        }        
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
