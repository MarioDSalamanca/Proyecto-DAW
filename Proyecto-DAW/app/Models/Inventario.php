<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventario';

    // Nombre de la clave primaria
    protected $primaryKey = 'idInventario';

    // Añadir los campos accesibles
    protected $fillable = ['nombre', 'marca', 'precio', 'stock'];

    public function tareas() {
        // Cada empleado tiene una tarea (clave foránea / clave primaria)
        return $this->hasMany(Compras::class, 'idCompra', 'idInventario');
    }
}
