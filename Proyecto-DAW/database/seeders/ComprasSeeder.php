<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compras;

class ComprasSeeder extends Seeder
{
    public function run() {

        $compras = [
            ['importe' => 500, 'unidades' => 100, 'fecha' => '2024-04-01 10:15:00', 'idProveedor' => 1, 'idInventario' => 5],
            ['importe' => 320, 'unidades' => 80, 'fecha' => '2024-04-02 14:30:00', 'idProveedor' => 2, 'idInventario' => 7],
            ['importe' => 750, 'unidades' => 200, 'fecha' => '2024-04-03 09:45:00', 'idProveedor' => 3, 'idInventario' => 6],
            ['importe' => 420, 'unidades' => 150, 'fecha' => '2024-04-04 11:20:00', 'idProveedor' => 4, 'idInventario' => 1],
            ['importe' => 800, 'unidades' => 120, 'fecha' => '2024-04-05 16:00:00', 'idProveedor' => 5, 'idInventario' => 3],
            ['importe' => 280, 'unidades' => 50, 'fecha' => '2024-04-06 13:10:00', 'idProveedor' => 6, 'idInventario' => 5],
            ['importe' => 650, 'unidades' => 180, 'fecha' => '2024-04-07 08:30:00', 'idProveedor' => 7, 'idInventario' => 1],
            ['importe' => 480, 'unidades' => 90, 'fecha' => '2024-04-08 12:45:00', 'idProveedor' => 8, 'idInventario' => 9],
            ['importe' => 880, 'unidades' => 250, 'fecha' => '2024-04-09 15:20:00', 'idProveedor' => 9, 'idInventario' => 6],
            ['importe' => 360, 'unidades' => 70, 'fecha' => '2024-04-10 14:30:00', 'idProveedor' => 10, 'idInventario' => 10],
            ['importe' => 700, 'unidades' => 160, 'fecha' => '2024-04-11 09:00:00', 'idProveedor' => 11, 'idInventario' => 3],
            ['importe' => 520, 'unidades' => 110, 'fecha' => '2024-04-12 11:45:00', 'idProveedor' => 12, 'idInventario' => 2],
            ['importe' => 930, 'unidades' => 300, 'fecha' => '2024-04-13 16:30:00', 'idProveedor' => 13, 'idInventario' => 8],
            ['importe' => 400, 'unidades' => 80, 'fecha' => '2024-04-14 13:00:00', 'idProveedor' => 14, 'idInventario' => 4],
            ['importe' => 780, 'unidades' => 200, 'fecha' => '2024-04-15 10:25:00', 'idProveedor' => 15, 'idInventario' => 1],
            ['importe' => 340, 'unidades' => 60, 'fecha' => '2024-04-16 14:15:00', 'idProveedor' => 16, 'idInventario' => 4],
            ['importe' => 600, 'unidades' => 150, 'fecha' => '2024-04-17 09:30:00', 'idProveedor' => 17, 'idInventario' => 2],
            ['importe' => 460, 'unidades' => 100, 'fecha' => '2024-04-18 12:00:00', 'idProveedor' => 18, 'idInventario' => 9],
            ['importe' => 850, 'unidades' => 220, 'fecha' => '2024-04-19 16:45:00', 'idProveedor' => 8, 'idInventario' => 7],
            ['importe' => 320, 'unidades' => 70, 'fecha' => '2024-04-20 11:00:00', 'idProveedor' => 5, 'idInventario' => 10],
            ['importe' => 670, 'unidades' => 180, 'fecha' => '2024-04-21 10:40:00', 'idProveedor' => 1, 'idInventario' => 3],
            ['importe' => 490, 'unidades' => 100, 'fecha' => '2024-04-22 14:20:00', 'idProveedor' => 2, 'idInventario' => 5],
            ['importe' => 920, 'unidades' => 250, 'fecha' => '2024-04-23 09:50:00', 'idProveedor' => 3, 'idInventario' => 8],
            ['importe' => 380, 'unidades' => 70, 'fecha' => '2024-04-24 13:30:00', 'idProveedor' => 4, 'idInventario' => 9],
        ];

        // Crear registros de compras
        foreach ($compras as $compra) {
            Compras::create($compra);
        }
    }
}