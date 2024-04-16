<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compras;

class Proveedores extends Model
{
    use HasFactory;
    
    // Nombre de la clave primaria
    protected $primaryKey = 'idProveedor';

    // Añadir los campos accesibles
    protected $fillable = ['empresa', 'especialidad'];

    public function tareas() {
        // Cada empleado tiene una tarea (clave foránea / clave primaria)
        return $this->hasMany(Compras::class, 'idCompra', 'idProveedor');
    }
}
