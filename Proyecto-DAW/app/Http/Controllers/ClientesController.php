<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientesController extends Controller {

    // Index del módulo de clientes
    public function index() {

        // Recoger todos los registros de la tabla clientes
        $datosServidor = Clientes::all();

        // Recoger las variables de sesión
        $sesionUsuario = session()->get('usuario_autenticado');
        $mensaje = session()->get('mensaje');

        // Eliminar el mensaje de la sesión para que no se muestre en la siguiente solicitud
        session()->forget('mensaje');

        return Inertia::render('Clientes/Clientes', compact('datosServidor', 'sesionUsuario', 'mensaje'));
    }

    // Añadir un registro a la tabla
    public function insert(Request $request) {

        $existe = Clientes::where('cipa', $request->cipa)->first();

        // Comprobar si el registro existe en la tabla
        if ($existe) {
            $mensaje = ['error' => 'Ya existe un cliente con el cipa ' . $request->cipa];
            
        } else {
            // Crear un objeto para guardar los datos
            $cliente = new Clientes();
            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->cipa = $request->cipa;

            if ($cliente->save()) {
                $mensaje = ['exito' => 'Cliente con el cipa '.$request->cipa.' añadido.'];

            } else {
                $mensaje = ['error' => 'Error al añadir al cliente, intentelo más tarde o contacte con soporte.'];

            }
        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('clientes.index');
    }

    // Actualizar un registro de la tabla
    public function update(Request $request) {

        $cliente = Clientes::where('idCliente', $request->idCliente)->first();

        ($request->nombre != $cliente->nombre) ? $cliente->nombre = $request->nombre : null;
        ($request->apellido != $cliente->apellido) ? $cliente->apellido = $request->apellido : null;
        ($request->cipa != $cliente->cipa) ? $cliente->cipa = $request->cipa : null;
        
        if ($cliente->save()) {
            $mensaje = ['exito' => 'Cliente con el cipa '.$request->cipa.' actualizado.'];

        } else {
            $mensaje = ['error' => 'Error al actualizar al cliente, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('clientes.index');
    }

    // Eliminar un registro de la tabla
    public function delete(Request $request) {

        $cliente = Clientes::where('cipa', $request->dato);
        
        if ($cliente->delete()) {
            $mensaje = ['exito' => 'Cliente con el cipa '.$request->dato.' eliminado.'];

        } else {
            $mensaje = ['error' => 'Error al eliminar al cliente, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('clientes.index');
    }
}
