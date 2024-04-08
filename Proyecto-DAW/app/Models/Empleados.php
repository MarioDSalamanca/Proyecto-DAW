<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idEmpleado';

    // Añadir los campos accesibles por los usuarios ('IdEmpleado' no es modificable)
    protected $fillable = ['nombre', 'apellido', 'correo', 'contrasena', 'rol'];
}