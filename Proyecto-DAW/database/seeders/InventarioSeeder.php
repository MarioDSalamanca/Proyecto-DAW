<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventario;

class InventarioSeeder extends Seeder
{
    public function run() {
        
        $inventario = [
            ['nombre' => 'ibufen', 'farmaco' => 'ibuprofeno', 'precio' => 2, 'stock' => 56],
            ['nombre' => 'norlevo', 'farmaco' => 'levonogestrel', 'precio' => 1.5, 'stock' => 70],
            ['nombre' => 'eutirox', 'farmaco' => 'levotiroxina', 'precio' => 3, 'stock' => 45],
            ['nombre' => 'lumigan', 'farmaco' => 'Bimatoprost', 'precio' => 2.5, 'stock' => 60],
            ['nombre' => 'Viread', 'farmaco' => 'Tenofovir', 'precio' => 4, 'stock' => 30],
            ['nombre' => 'Valium', 'farmaco' => 'Diazepam', 'precio' => 3.5, 'stock' => 25],
            ['nombre' => 'Plenur', 'farmaco' => 'Carbonato de Calcio', 'precio' => 5, 'stock' => 20],
            ['nombre' => 'Sintrom', 'farmaco' => 'Acenocumarol', 'precio' => 4, 'stock' => 40],
            ['nombre' => 'Nolotil', 'farmaco' => 'Metamizol magnésico', 'precio' => 6, 'stock' => 15],
            ['nombre' => 'Ebastina', 'farmaco' => 'Ebastina', 'precio' => 4.2, 'stock' => 25],
        ];

        // Crear registros de inventario
        foreach ($inventario as $producto) {
            Inventario::create($producto);
        }
    }
}