<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compras;

class ComprasSeeder extends Seeder
{
    public function run() {

        $compras = [
            [ 'importe' => 400, 'unidades' => 220, 'fecha' => '2024-04-10 14:30:00', 'idProveedor' => '2', 'idInventario' => '1' ]
        ];

        // Crear registros de compras
        foreach ($compras as $compra) {
            Compras::create($compra);
        }
    }
}