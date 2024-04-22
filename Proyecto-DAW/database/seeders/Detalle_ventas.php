<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Detalle_ventas;

class Detalle_ventasSeeder extends Seeder
{
    public function run() {

        $detalle_ventas = [
            ["unidades" => 3, "idInventario" => 7],
            ["unidades" => 5, "idInventario" => 4],
            ["unidades" => 1, "idInventario" => 1],
            ["unidades" => 3, "idInventario" => 6],
            ["unidades" => 4, "idInventario" => 8],
            ["unidades" => 4, "idInventario" => 5],
            ["unidades" => 6, "idInventario" => 3],
            ["unidades" => 1, "idInventario" => 9],
            ["unidades" => 3, "idInventario" => 2],
            ["unidades" => 5, "idInventario" => 7],
            ["unidades" => 1, "idInventario" => 4],
            ["unidades" => 3, "idInventario" => 1],
            ["unidades" => 4, "idInventario" => 6],
            ["unidades" => 4, "idInventario" => 8],
            ["unidades" => 6, "idInventario" => 5],
            ["unidades" => 1, "idInventario" => 3],
            ["unidades" => 3, "idInventario" => 9],
            ["unidades" => 3, "idInventario" => 2],
            ["unidades" => 5, "idInventario" => 7],
            ["unidades" => 1, "idInventario" => 4],
            ["unidades" => 3, "idInventario" => 1],
            ["unidades" => 4, "idInventario" => 6],
            ["unidades" => 4, "idInventario" => 8],
            ["unidades" => 6, "idInventario" => 5],
            ["unidades" => 1, "idInventario" => 3],
            ["unidades" => 3, "idInventario" => 9],
            ["unidades" => 4, "idInventario" => 2],
            ["unidades" => 5, "idInventario" => 7],
            ["unidades" => 1, "idInventario" => 4],
            ["unidades" => 3, "idInventario" => 1],
            ["unidades" => 4, "idInventario" => 6],
            ["unidades" => 4, "idInventario" => 8],
            ["unidades" => 6, "idInventario" => 5],
            ["unidades" => 1, "idInventario" => 3],
            ["unidades" => 3, "idInventario" => 9],
            ["unidades" => 3, "idInventario" => 2],
            ["unidades" => 5, "idInventario" => 7],
            ["unidades" => 1, "idInventario" => 4],
            ["unidades" => 3, "idInventario" => 1],
            ["unidades" => 4, "idInventario" => 6],
            ["unidades" => 4, "idInventario" => 8],
            ["unidades" => 6, "idInventario" => 5],
            ["unidades" => 1, "idInventario" => 3],
            ["unidades" => 3, "idInventario" => 9],
            ["unidades" => 4, "idInventario" => 2],
            ["unidades" => 5, "idInventario" => 7],
            ["unidades" => 1, "idInventario" => 4],
            ["unidades" => 3, "idInventario" => 1],
            ["unidades" => 4, "idInventario" => 6],
            ["unidades" => 4, "idInventario" => 8],
            ["unidades" => 6, "idInventario" => 5],
            ["unidades" => 1, "idInventario" => 3],         
        ];

        // Crear registros de detalle_ventas
        foreach ($detalle_ventas as $detalle_venta) {
            Detalle_ventas::create($detalle_venta);
        }

        
    }
}