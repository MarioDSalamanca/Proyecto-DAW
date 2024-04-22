<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    // Nombre de la clave primaria
    protected $primaryKey = 'idCliente';

    // Añadir los campos accesibles
    protected $fillable = ['nombre', 'apellido', 'DNI/CIF'];
    
    public function ventas() {
        return $this->hasMany(Ventas::class, 'idCliente', 'idVenta');
    }
}
