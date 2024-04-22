<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
USE App\Models\Compras;
USE App\Models\Detalle_ventas;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventario';

    // Nombre de la clave primaria
    protected $primaryKey = 'idInventario';

    // Añadir los campos accesibles
    protected $fillable = ['nombre', 'farmaco', 'precio', 'stock'];

    public function compras() {
        // Cada empleado tiene una tarea (clave foránea / clave primaria)
        return $this->hasMany(Compras::class, 'idCompra', 'idInventario');
    }

    public function detalle_ventas() {
        return $this->hasMany(Detalle_ventas::class, 'idDetalleVenta', 'idInventario');
    }
}
