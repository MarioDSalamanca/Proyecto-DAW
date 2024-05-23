<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class empleadosController extends Controller {

    // Index del módulo de empleados
    public function index() {

        // Recoger todos los registros de la tabla empleados
        $datosServidor = Empleados::all();

        // Recoger las variables de sesión
        $sesionUsuario = session()->get('usuario_autenticado');
        $mensaje = session()->get('mensaje');

        // Eliminar el mensaje de la sesión para que no se muestre en la siguiente solicitud
        session()->forget('mensaje');

        // Comporbar el rol del usuario de sesión
        $rolUsuario = Empleados::where('correo', $sesionUsuario)->first();
        $rolUsuario = $rolUsuario->rol;

        if ($rolUsuario === 'adjunto' || $rolUsuario === 'titular') {
            return Inertia::render('Empleados/Empleados', compact('datosServidor', 'sesionUsuario', 'mensaje'));
        } else {
            return Inertia::render('SinPermisos');
        }
    }

    // Añadir un registro a la tabla
    public function insert(Request $request) {
        
        $existe = Empleados::where('correo', $request->correo)->first();
        
        // Comprobar si el registro existe en la tabla
        if ($existe) {
            $mensaje = ['error' => 'Ya existe un empleado con el correo ' . $request->correo];
            
        } else {
            // Crear un objeto para guardar los datos
            $usuario = new Empleados();
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->correo = $request->correo;
            $usuario->contrasena = Hash::make($request->contrasena);;
            $usuario->rol = $request->rol;

            if ($usuario->save()) {
                $mensaje = ['exito' => 'Empleado con el correo '.$request->correo.' añadido.'];

            } else {
                $mensaje = ['error' => 'Error al añadir al empleado, intentelo más tarde o contacte con soporte.'];

            }
        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('empleados.index');
    }

    // Actualizar un registro de la tabla
    public function update(Request $request) {

        $usuario = Empleados::where('idEmpleado', $request->idEmpleado)->first();

        ($request->nombre != $usuario->nombre) ? $usuario->nombre = $request->nombre : null;
        ($request->apellido != $usuario->apellido) ? $usuario->apellido = $request->apellido : null;
        ($request->correo != $usuario->correo) ? $usuario->correo = $request->correo : null;
        ($request->contrasena != $usuario->contrasena) ? $usuario->contrasena = Hash::make($request->contrasena) : null;
        ($request->rol != $usuario->rol) ? $usuario->rol = $request->rol : null;
        
        if ($usuario->save()) {
            $mensaje = ['exito' => 'Empleado con el correo '.$request->correo.' actualizado.'];

        } else {
            $mensaje = ['error' => 'Error al actualizar al empleado, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('empleados.index');
    }

    // Eliminar un registro de la tabla
    public function delete(Request $request) {

        $usuario = Empleados::where('correo', $request->dato);
        
        if ($usuario->delete()) {
            $mensaje = ['exito' => 'Empleado con el correo '.$request->dato.' eliminado.'];
            
        } else {
            $mensaje = ['error' => 'Error al eliminar al empleado, intentelo más tarde o contacte con soporte.'];

        }

        session()->flash('mensaje', $mensaje);

        return redirect()->route('empleados.index');
    }
}
