<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventario;
use App\Models\Proveedores;

class Compras extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idCompra';

    // Añadir los campos accesibles
    protected $fillable = ['importe', 'unidades', 'fecha', 'idProveedor', 'idInventario'];

    public function inventario() {
        // Cada empleado tiene una tarea (clave primaria)
        return $this->belongsTo(Inventario::class, 'idInventario');
    }

    public function proveedores() {
        // Cada empleado tiene una tarea (clave primaria)
        return $this->belongsTo(Proveedores::class, 'idProveedor');
    }
}
