<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ventas;

class VentasSeeder extends Seeder
{
    public function run() {

        $ventas = [

            ["importe" => 10.50, "fecha" => "2024-04-01 09:15:00", "idDetalleVenta" => 1, "idCliente" => 7, "idEmpleado" => 8],
            ["importe" => 7.25, "fecha" => "2024-04-02 10:30:00", "idDetalleVenta" => 2, "idCliente" => 4, "idEmpleado" => 10],
            ["importe" => 13.75, "fecha" => "2024-04-03 11:45:00", "idDetalleVenta" => 3, "idCliente" => 11, "idEmpleado" => 3],
            ["importe" => 8, "fecha" => "2024-04-04 13:00:00", "idDetalleVenta" => 4, "idCliente" => 2, "idEmpleado" => 6],
            ["importe" => 6.30, "fecha" => "2024-04-05 14:15:00", "idDetalleVenta" => 5, "idCliente" => 9, "idEmpleado" => 12],
            ["importe" => 12.45, "fecha" => "2024-04-06 15:30:00", "idDetalleVenta" => 6, "idCliente" => 6, "idEmpleado" => 13],
            ["importe" => 9.75, "fecha" => "2024-04-07 16:45:00", "idDetalleVenta" => 7, "idCliente" => 13, "idEmpleado" => 5],
            ["importe" => 8.60, "fecha" => "2024-04-08 18:00:00", "idDetalleVenta" => 8, "idCliente" => 8, "idEmpleado" => 1],
            ["importe" => 11.25, "fecha" => "2024-04-09 19:15:00", "idDetalleVenta" => 9, "idCliente" => 3, "idEmpleado" => 2],
            ["importe" => 9, "fecha" => "2024-04-10 20:30:00", "idDetalleVenta" => 10, "idCliente" => 12, "idEmpleado" => 4],
            ["importe" => 10.20, "fecha" => "2024-04-11 21:45:00", "idDetalleVenta" => 11, "idCliente" => 10, "idEmpleado" => 9],
            ["importe" => 7.15, "fecha" => "2024-04-12 23:00:00", "idDetalleVenta" => 12, "idCliente" => 5, "idEmpleado" => 11],
            ["importe" => 14.80, "fecha" => "2024-04-13 07:00:00", "idDetalleVenta" => 13, "idCliente" => 1, "idEmpleado" => 7],
            ["importe" => 8.50, "fecha" => "2024-04-14 08:15:00", "idDetalleVenta" => 14, "idCliente" => 13, "idEmpleado" => 8],
            ["importe" => 11.75, "fecha" => "2024-04-15 09:30:00", "idDetalleVenta" => 15, "idCliente" => 7, "idEmpleado" => 3],
            ["importe" => 10, "fecha" => "2024-04-16 10:45:00", "idDetalleVenta" => 16, "idCliente" => 4, "idEmpleado" => 5],
            ["importe" => 10.20, "fecha" => "2024-04-17 12:00:00", "idDetalleVenta" => 17, "idCliente" => 11, "idEmpleado" => 10],
            ["importe" => 13.40, "fecha" => "2024-04-18 13:15:00", "idDetalleVenta" => 18, "idCliente" => 2, "idEmpleado" => 6],
            ["importe" => 10.30, "fecha" => "2024-04-19 14:30:00", "idDetalleVenta" => 19, "idCliente" => 9, "idEmpleado" => 1],
            ["importe" => 12.90, "fecha" => "2024-04-20 15:45:00", "idDetalleVenta" => 20, "idCliente" => 6, "idEmpleado" => 11],
            ["importe" => 9.75, "fecha" => "2024-04-21 17:00:00", "idDetalleVenta" => 21, "idCliente" => 13, "idEmpleado" => 2],
            ["importe" => 14.60, "fecha" => "2024-04-22 18:15:00", "idDetalleVenta" => 22, "idCliente" => 8, "idEmpleado" => 4],
            ["importe" => 12.25, "fecha" => "2024-04-23 19:30:00", "idDetalleVenta" => 23, "idCliente" => 3, "idEmpleado" => 7],
            ["importe" => 12.40, "fecha" => "2024-04-24 20:45:00", "idDetalleVenta" => 24, "idCliente" => 12, "idEmpleado" => 9],
            ["importe" => 11.70, "fecha" => "2024-04-25 22:00:00", "idDetalleVenta" => 25, "idCliente" => 10, "idEmpleado" => 13],
            ["importe" => 10.90, "fecha" => "2024-04-26 07:00:00", "idDetalleVenta" => 26, "idCliente" => 5, "idEmpleado" => 8],
            ["importe" => 10.50, "fecha" => "2024-04-27 08:15:00", "idDetalleVenta" => 27, "idCliente" => 1, "idEmpleado" => 3],
            ["importe" => 13.20, "fecha" => "2024-04-28 09:30:00", "idDetalleVenta" => 28, "idCliente" => 13, "idEmpleado" => 12],
            ["importe" => 7.40, "fecha" => "2024-04-29 10:45:00", "idDetalleVenta" => 29, "idCliente" => 7, "idEmpleado" => 5],
            ["importe" => 13.80, "fecha" => "2024-04-30 12:00:00", "idDetalleVenta" => 30, "idCliente" => 4, "idEmpleado" => 11],
            ["importe" => 12.25, "fecha" => "2024-04-01 13:15:00", "idDetalleVenta" => 31, "idCliente" => 11, "idEmpleado" => 2],
            ["importe" => 9, "fecha" => "2024-04-02 14:30:00", "idDetalleVenta" => 32, "idCliente" => 2, "idEmpleado" => 10],
            ["importe" => 12.75, "fecha" => "2024-04-03 15:45:00", "idDetalleVenta" => 33, "idCliente" => 9, "idEmpleado" => 6],
            ["importe" => 10.90, "fecha" => "2024-04-04 17:00:00", "idDetalleVenta" => 34, "idCliente" => 6, "idEmpleado" => 1],
            ["importe" => 13.60, "fecha" => "2024-04-05 18:15:00", "idDetalleVenta" => 35, "idCliente" => 13, "idEmpleado" => 11],
            ["importe" => 14.30, "fecha" => "2024-04-06 19:30:00", "idDetalleVenta" => 36, "idCliente" => 8, "idEmpleado" => 13],
            ["importe" => 12.25, "fecha" => "2024-04-07 20:45:00", "idDetalleVenta" => 37, "idCliente" => 3, "idEmpleado" => 7],
            ["importe" => 13.50, "fecha" => "2024-04-08 22:00:00", "idDetalleVenta" => 38, "idCliente" => 12, "idEmpleado" => 5],
            ["importe" => 12.75, "fecha" => "2024-04-09 07:00:00", "idDetalleVenta" => 39, "idCliente" => 10, "idEmpleado" => 9],
            ["importe" => 11.60, "fecha" => "2024-04-10 08:15:00", "idDetalleVenta" => 40, "idCliente" => 5, "idEmpleado" => 3],
            ["importe" => 13.20, "fecha" => "2024-04-11 09:30:00", "idDetalleVenta" => 41, "idCliente" => 1, "idEmpleado" => 13],
            ["importe" => 8.40, "fecha" => "2024-04-12 10:45:00", "idDetalleVenta" => 42, "idCliente" => 13, "idEmpleado" => 8],
            ["importe" => 13.80, "fecha" => "2024-04-13 12:00:00", "idDetalleVenta" => 43, "idCliente" => 7, "idEmpleado" => 4],
            ["importe" => 10.75, "fecha" => "2024-04-14 13:15:00", "idDetalleVenta" => 44, "idCliente" => 4, "idEmpleado" => 12],
            ["importe" => 4.15, "fecha" => "2024-04-14 13:15:00", "idDetalleVenta" => 45, "idCliente" => 2, "idEmpleado" => 1],        
        ];

        // Crear registros de ventas
        foreach ($ventas as $venta) {
            Ventas::create($venta);
        }

        
    }
}