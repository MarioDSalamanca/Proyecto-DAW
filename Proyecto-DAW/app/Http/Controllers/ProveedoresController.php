<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Empleados;

class ProveedoresController extends Controller {

    // Index del módulo de proveedores
    public function index(){

        // Recoger todos los registros de la tabla proveedores
        $datosServidor = Proveedores::all();

        // Recoger las variables de sesión
        $sesionUsuario = session()->get('usuario_autenticado');
        $mensaje = session()->get('mensaje');

        // Eliminar el mensaje de la sesión para que no se muestre en la siguiente solicitud
        session()->forget('mensaje');
        
        // Comporbar el rol del usuario de sesión
        $rolUsuario = Empleados::where('correo', $sesionUsuario)->first();
        $rolUsuario = $rolUsuario->rol;

        if ($rolUsuario === 'adjunto' || $rolUsuario === 'titular') {
            return Inertia::render('Proveedores/Proveedores', compact('sesionUsuario', 'datosServidor', 'mensaje'));
        } else {
            return Inertia::render('SinPermisos');
        }
    }

    // Añadir un registro a la tabla
    public function insert(Request $request) {
        
        $existe = Proveedores::where('empresa', $request->empresa)->first();

        // Comprobar si el registro existe en la tabla
        if ($existe) {
            $mensaje = ['error' => 'Ya existe un proveedor con esas características.'];
            
        } else {

            $proveedor = new Proveedores();
            $proveedor->empresa = $request->empresa;

            if ($proveedor->save()) {
                $mensaje = ['exito' => 'Proveedor añadido.'];

            } else {
                $mensaje = ['error' => 'Error al añadir el proveedor, intentelo más tarde o contacte con soporte.'];

            }
        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('proveedores.index');
    }

    public function delete(Request $request) {

        $proveedor = Proveedores::where('empresa', $request->dato)->first();
        
        if ($proveedor->delete()) {
            $mensaje = ['exito' => 'Proveedor '.$request->dato.' eliminado.'];

        } else {
            $mensaje = ['error' => 'Error al eliminar el proveedor, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('proveedores.index');
    }
}
