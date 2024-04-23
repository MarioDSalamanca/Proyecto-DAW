<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
USE App\Models\Inventario;
USE App\Models\Ventas;

class Detalle_ventas extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idDetalleVenta';

    // Añadir los campos accesibles
    protected $fillable = ['unidades', 'idInventario', 'idVenta'];
    
    public function inventario() {
        return $this->belongsTo(Inventario::class, 'idInventario');
    }

    public function ventas() {
        return $this->belongsTo(Ventas::class, 'idVenta');
    }
}
