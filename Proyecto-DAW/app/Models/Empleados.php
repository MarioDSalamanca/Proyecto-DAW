<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tareas;

class Empleados extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idEmpleado';

    // Añadir los campos accesibles por los usuarios ('IdEmpleado' no es modificable)
    protected $fillable = ['nombre', 'apellido', 'correo', 'contrasena', 'rol'];

    public function tareas() {
        // Cada empleado tiene una tarea (clave foránea / clave primaria)
        return $this->hasMany(Tareas::class, 'idEmpleado', 'idTarea');
    }

}