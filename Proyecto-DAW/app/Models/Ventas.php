<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleados;
use App\Models\Detalle_ventas;
use App\Models\Clientes;

class Ventas extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idVenta';

    // Añadir los campos accesibles
    protected $fillable = ['importe', 'fecha', 'idDetalleVenta', 'idCliente', 'idEmpleado'];

    public function empleados() {
        // Cada empleado tiene una tarea (clave primaria)
        return $this->belongsTo(Empleados::class, 'idEmpleado');
    }

    public function clientes() {
        // Cada empleado tiene una tarea (clave primaria)
        return $this->belongsTo(Clientes::class, 'idCliente');
    }

    public function detalle_ventas() {
        return $this->hasMany(Detalle_ventas::class, 'idVenta');
    }

    public function inventario() {
        return $this->belongsToMany(Inventario::class, 'detalle_ventas', 'idVenta', 'idInventario')
            ->withPivot('unidades');
    }

    
}
