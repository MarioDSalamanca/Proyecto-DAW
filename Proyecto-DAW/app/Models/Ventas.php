<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleados;
use App\Models\Clientes;
use App\Models\Detalle_ventas;

class Ventas extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idVenta';

    // Añadir los campos accesibles
    protected $fillable = ['importe', 'fecha', 'idDetalleVenta', 'idCliente', 'idEmpleado'];

    public function clientes() {
        return $this->belongsTo(Clientes::class, 'idCliente');
    }
    
    public function empleados() {
        return $this->belongsTo(Empleados::class, 'idEmpleado');
    }
    
    public function detalle_ventas() {
        return $this->hasMany(Detalle_ventas::class, 'idVenta');
    }
    
}
