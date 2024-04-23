<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
USE App\Models\Inventario;

class Detalle_ventas extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idDetalleVenta';

    // Añadir los campos accesibles
    protected $fillable = ['unidades', 'idInventario'];
    
    public function inventario() {
        return $this->belongsTo(Inventario::class, 'idInventario');
    }
}
