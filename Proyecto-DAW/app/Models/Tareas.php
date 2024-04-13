<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;
    
    // Nombre de la clave primaria
    protected $primaryKey = 'idTarea';

    // Añadir los campos accesibles por los usuarios ('IdEmpleado' no es modificable)
    protected $fillable = ['nombre', 'fecha', 'descripcion', 'estado', 'idEmpleado'];
}