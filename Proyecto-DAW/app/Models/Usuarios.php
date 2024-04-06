<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idUsuario';

    // Añadir los campos accesibles por los usuarios ('IdUsuarios' no es modificable)
    protected $fillable = ['nombre', 'apellido', 'correo', 'contrasena', 'rol'];
}