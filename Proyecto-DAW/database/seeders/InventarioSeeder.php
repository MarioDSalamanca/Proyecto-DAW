<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventario;

class InventarioSeeder extends Seeder
{
    public function run() {
        
        $inventario = [
            [ 'nombre' => 'ibufen', 'farmaco' => 'ibuprofeno', 'precio' => 2, 'stock' => 56 ]
        ];

        // Crear registros de inventario
        foreach ($inventario as $producto) {
            Inventario::create($producto);
        }
    }
}