<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    // Añadir los campos accesibles por los usuarios ('IdUsuarios' no es modificable)
    protected $fillable = ['Nombre', 'Apellido', 'Correo', 'Contrasena', 'Rol'];
}