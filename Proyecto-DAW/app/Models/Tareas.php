<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleados;

class Tareas extends Model
{
    use HasFactory;
    
    // Nombre de la clave primaria
    protected $primaryKey = 'idTarea';

    // Añadir los campos accesibles por los usuarios ('IdEmpleado' no es modificable)
    protected $fillable = ['nombre', 'fecha', 'descripcion', 'estado', 'idEmpleado'];

    public function empleados() {
        // Cada empleado tiene una tarea (clave primaria)
        return $this->belongsTo(Empleados::class, 'idEmpleado');
    }
}