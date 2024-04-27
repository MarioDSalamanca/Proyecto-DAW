<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleados;
use App\Models\Inventario;
use App\Models\Proveedores;
use App\Models\Tareas;
use App\Models\Compras;
use App\Models\Clientes;
use App\Models\Ventas;
use App\Models\Detalle_ventas;

class DatabaseSeeder extends Seeder
{
    public function run() {

        $empleados = [
            ['nombre' => 'Mario', 'apellido' => 'Dieguez', 'correo' => 'mario@example.com', 'contrasena' => bcrypt('Mario123'), 'rol' => 'titular'],
            ['nombre' => 'Sandra', 'apellido' => 'Bujak', 'correo' => 'sandra@example.com', 'contrasena' => bcrypt('Sandra123'), 'rol' => 'adjunto'],
            ['nombre' => 'Iker', 'apellido' => 'Casillas', 'correo' => 'iker@example.com', 'contrasena' => bcrypt('Iker1234'), 'rol' => 'adjunto'],        
            ['nombre' => 'Sergio', 'apellido' => 'Ramos', 'correo' => 'ramos@example.com', 'contrasena' => bcrypt('Ramos123'), 'rol' => 'adjunto'],        
            ['nombre' => 'Carles', 'apellido' => 'Puyol', 'correo' => 'puyol@example.com', 'contrasena' => bcrypt('Puyol123'), 'rol' => 'adjunto'],        
            ['nombre' => 'Gerard', 'apellido' => 'Pique', 'correo' => 'pique@example.com', 'contrasena' => bcrypt('Pique123'), 'rol' => 'auxiliar'],        
            ['nombre' => 'Joan', 'apellido' => 'Capdevila', 'correo' => 'capdevila@example.com', 'contrasena' => bcrypt('Capdevila123'), 'rol' => 'auxiliar'],        
            ['nombre' => 'Xabi', 'apellido' => 'Alonso', 'correo' => 'xabi@example.com', 'contrasena' => bcrypt('Xabi1234'), 'rol' => 'adjunto'],        
            ['nombre' => 'Sergio', 'apellido' => 'Busquets', 'correo' => 'busquets@example.com', 'contrasena' => bcrypt('Busquets123'), 'rol' => 'auxiliar'],        
            ['nombre' => 'Andrés', 'apellido' => 'Iniesta', 'correo' => 'iniesta@example.com', 'contrasena' => bcrypt('Iniesta123'), 'rol' => 'adjunto'],        
            ['nombre' => 'David', 'apellido' => 'Villa', 'correo' => 'villa@example.com', 'contrasena' => bcrypt('Villa123'), 'rol' => 'adjunto'],        
            ['nombre' => 'Pedro', 'apellido' => 'Rodríguez', 'correo' => 'pedro@example.com', 'contrasena' => bcrypt('Pedro123'), 'rol' => 'auxiliar'],        
            ['nombre' => 'Fernando', 'apellido' => 'Torres', 'correo' => 'fernando@example.com', 'contrasena' => bcrypt('Torres123'), 'rol' => 'adjunto']
        ];

        // Crear registros de empleados
        foreach ($empleados as $empleado) {
            Empleados::create($empleado);
        }

        $tareas = [
            ['nombre' => 'Fórmula magistral', 'fecha' => '2024-04-30 14:30:00', 'descripcion' => 'Elaborar fórmula magistral de "Disolución de Lugol"', 'idEmpleado' => 1],
            ['nombre' => 'Fórmula magistral', 'fecha' => '2024-05-10 14:30:00', 'descripcion' => 'Elaborar fórmula magistral de "Cápsulas de sulfato de Zinc"', 'idEmpleado' => 2],
            ['nombre' => 'Control de caducidades', 'fecha' => '2024-05-31 19:00:00', 'descripcion' => 'Revisar la fecha de caducidad de los productos en el inventario y retirar aquellos que estén vencidos', 'idEmpleado' => 3],
            ['nombre' => 'Revisión de inventario', 'fecha' => '2024-05-31 09:00:00', 'descripcion' => 'Realizar revisión del inventario de productos para reabastecer aquellos que estén bajos en stock.', 'idEmpleado' => 5],
            ['nombre' => 'Fórmula magistral', 'fecha' => '2024-05-10 14:30:00', 'descripcion' => 'Elaborar fórmula magistral de "Jarabe de Ipecacuana"', 'idEmpleado' => 4],        
            ['nombre' => 'Pedido de medicamentos', 'fecha' => '2024-06-02 10:00:00', 'descripcion' => 'Realizar pedido de medicamentos a proveedores para mantener el inventario adecuado.', 'idEmpleado' => 2],        
            ['nombre' => 'Recepción de pedidos', 'fecha' => '2024-06-03 08:30:00', 'descripcion' => 'Recibir y revisar los pedidos de medicamentos entregados por los proveedores.', 'idEmpleado' => 7],        
            ['nombre' => 'Atención al cliente', 'fecha' => '2024-06-03 11:00:00', 'descripcion' => 'Atender a los clientes que llegan a la farmacia, proporcionando asesoramiento sobre productos y medicamentos.', 'idEmpleado' => 11],        
            ['nombre' => 'Control de caducidades', 'fecha' => '2024-06-04 15:00:00', 'descripcion' => 'Revisar la fecha de caducidad de los productos en el inventario y retirar aquellos que estén vencidos.', 'idEmpleado' => 8],        
            ['nombre' => 'Mantenimiento de la farmacia', 'fecha' => '2024-06-05 13:30:00', 'descripcion' => 'Realizar tareas de limpieza y mantenimiento de la farmacia para garantizar un entorno limpio y ordenado.', 'idEmpleado' => 13]
        ];

        // Crear registros de tareas
        foreach ($tareas as $tarea) {
            Tareas::create($tarea);
        }

        $inventario = [
            ['nombre' => 'ibufen', 'farmaco' => 'ibuprofeno', 'precio' => 2, 'prescripcion' => false, 'stock' => 56],
            ['nombre' => 'norlevo', 'farmaco' => 'levonogestrel', 'precio' => 1.5, 'prescripcion' => true, 'stock' => 70],
            ['nombre' => 'eutirox', 'farmaco' => 'levotiroxina', 'precio' => 3, 'prescripcion' => true, 'stock' => 5],
            ['nombre' => 'lumigan', 'farmaco' => 'Bimatoprost', 'precio' => 2.5, 'prescripcion' => true, 'stock' => 60],
            ['nombre' => 'Viread', 'farmaco' => 'Tenofovir', 'precio' => 4, 'prescripcion' => true, 'stock' => 30],
            ['nombre' => 'Valium', 'farmaco' => 'Diazepam', 'precio' => 3.5, 'prescripcion' => true, 'stock' => 25],
            ['nombre' => 'Plenur', 'farmaco' => 'Carbonato de Calcio', 'precio' => 5, 'prescripcion' => true, 'stock' => 20],
            ['nombre' => 'Sintrom', 'farmaco' => 'Acenocumarol', 'precio' => 4, 'prescripcion' => true, 'stock' => 40],
            ['nombre' => 'Nolotil', 'farmaco' => 'Metamizol magnésico', 'precio' => 6, 'prescripcion' => true, 'stock' => 15],
            ['nombre' => 'Ebastina', 'farmaco' => 'Ebastina', 'precio' => 4.2, 'prescripcion' => true, 'stock' => 25],
        ];

        // Crear registros de inventario
        foreach ($inventario as $producto) {
            Inventario::create($producto);
        }

        $proveedores = [
            ['empresa' => 'bidafarma'],
            ['empresa' => 'cofares'],
            ['empresa' => 'Bayer'],
        ];

        // Crear registros de proveedores
        foreach ($proveedores as $proveedor) {
            Proveedores::create($proveedor);
        }

        $compras = [
            ['importe' => 500, 'unidades' => 100, 'fecha' => '2024-04-01 10:15:00', 'idProveedor' => 1, 'idInventario' => 5],
            ['importe' => 320, 'unidades' => 80, 'fecha' => '2024-04-02 14:30:00', 'idProveedor' => 2, 'idInventario' => 7],
            ['importe' => 750, 'unidades' => 200, 'fecha' => '2024-04-03 09:45:00', 'idProveedor' => 3, 'idInventario' => 6],
            ['importe' => 420, 'unidades' => 150, 'fecha' => '2024-04-04 11:20:00', 'idProveedor' => 1, 'idInventario' => 1],
            ['importe' => 800, 'unidades' => 120, 'fecha' => '2024-04-05 16:00:00', 'idProveedor' => 1, 'idInventario' => 3],
            ['importe' => 280, 'unidades' => 50, 'fecha' => '2024-04-06 13:10:00', 'idProveedor' => 2, 'idInventario' => 5],
            ['importe' => 650, 'unidades' => 180, 'fecha' => '2024-04-07 08:30:00', 'idProveedor' => 1, 'idInventario' => 1],
            ['importe' => 480, 'unidades' => 90, 'fecha' => '2024-04-08 12:45:00', 'idProveedor' => 1, 'idInventario' => 9],
            ['importe' => 880, 'unidades' => 250, 'fecha' => '2024-04-09 15:20:00', 'idProveedor' => 2, 'idInventario' => 6],
            ['importe' => 360, 'unidades' => 70, 'fecha' => '2024-04-10 14:30:00', 'idProveedor' => 1, 'idInventario' => 10],
            ['importe' => 700, 'unidades' => 160, 'fecha' => '2024-04-11 09:00:00', 'idProveedor' => 1, 'idInventario' => 3],
            ['importe' => 520, 'unidades' => 110, 'fecha' => '2024-04-12 11:45:00', 'idProveedor' => 1, 'idInventario' => 2],
            ['importe' => 930, 'unidades' => 300, 'fecha' => '2024-04-13 16:30:00', 'idProveedor' => 1, 'idInventario' => 8],
            ['importe' => 400, 'unidades' => 80, 'fecha' => '2024-04-14 13:00:00', 'idProveedor' => 1, 'idInventario' => 4],
            ['importe' => 780, 'unidades' => 200, 'fecha' => '2024-04-15 10:25:00', 'idProveedor' => 1, 'idInventario' => 1],
            ['importe' => 340, 'unidades' => 60, 'fecha' => '2024-04-16 14:15:00', 'idProveedor' => 2, 'idInventario' => 4],
            ['importe' => 600, 'unidades' => 150, 'fecha' => '2024-04-17 09:30:00', 'idProveedor' => 3, 'idInventario' => 2],
            ['importe' => 460, 'unidades' => 100, 'fecha' => '2024-04-18 12:00:00', 'idProveedor' => 1, 'idInventario' => 9],
            ['importe' => 850, 'unidades' => 220, 'fecha' => '2024-04-19 16:45:00', 'idProveedor' => 1, 'idInventario' => 7],
            ['importe' => 320, 'unidades' => 70, 'fecha' => '2024-04-20 11:00:00', 'idProveedor' => 1, 'idInventario' => 10],
            ['importe' => 670, 'unidades' => 180, 'fecha' => '2024-04-21 10:40:00', 'idProveedor' => 1, 'idInventario' => 3],
            ['importe' => 490, 'unidades' => 100, 'fecha' => '2024-04-22 14:20:00', 'idProveedor' => 2, 'idInventario' => 5],
            ['importe' => 920, 'unidades' => 250, 'fecha' => '2024-04-23 09:50:00', 'idProveedor' => 3, 'idInventario' => 8],
            ['importe' => 380, 'unidades' => 70, 'fecha' => '2024-04-24 13:30:00', 'idProveedor' => 1, 'idInventario' => 9],
        ];

        // Crear registros de compras
        foreach ($compras as $compra) {
            Compras::create($compra);
        }

        $clientes = [
            ["nombre" => "Thibaut", "apellido" => "Courtois", "cipa" => "2345678952"],
            ["nombre" => "Daniel", "apellido" => "Carvajal", "cipa" => "0123456716"],        
            ["nombre" => "Luka", "apellido" => "Modric", "cipa" => "2345678167"],        
            ["nombre" => "Vinicius", "apellido" => "Junior", "cipa" => "1345678994"],        
            ["nombre" => "Toni", "apellido" => "Kroos", "cipa" => "4567890154"],       
            ["nombre" => "Jude", "apellido" => "Bellingham", "cipa" => "1234567878"], 
            ["nombre" => "Ferland", "apellido" => "Mendy", "cipa" => "5678901648"],
            ["nombre" => "Rodrygo", "apellido" => "Goes", "cipa" => "6789012794"],        
            ["nombre" => "Eder", "apellido" => "Militao", "cipa" => "7890123543"],        
            ["nombre" => "Lucas", "apellido" => "Vazquez", "cipa" => "8901234468"],        
            ["nombre" => "Federico", "apellido" => "Valverde", "cipa" => "9012345798"],        
            ["nombre" => "David", "apellido" => "Alaba", "cipa" => "0123456287"],        
            ["nombre" => "Eduardo", "apellido" => "Camavinga", "cipa" => "5123456752"],        
            ["nombre" => "Carlo", "apellido" => "Ancelotti", "cipa" => "0123456729"],
        ];

        // Crear registros de clientes
        foreach ($clientes as $cliente) {
            Clientes::create($cliente);
        }

        $ventas = [

            ["importe" => 10.50, "fecha" => "2024-04-01 09:15:00", "idCliente" => null, "idEmpleado" => 8],
            ["importe" => 7.25, "fecha" => "2024-04-02 10:30:00", "idCliente" => 4, "idEmpleado" => 10],
            ["importe" => 13.75, "fecha" => "2024-04-03 11:45:00", "idCliente" => 11, "idEmpleado" => 3],
            ["importe" => 8, "fecha" => "2024-04-04 13:00:00", "idCliente" => 2, "idEmpleado" => 6],
            ["importe" => 6.30, "fecha" => "2024-04-05 14:15:00", "idCliente" => 9, "idEmpleado" => 12],
            ["importe" => 12.45, "fecha" => "2024-04-06 15:30:00", "idCliente" => 6, "idEmpleado" => 13],
            ["importe" => 9.75, "fecha" => "2024-04-07 16:45:00", "idCliente" => 13, "idEmpleado" => 5],
            ["importe" => 8.60, "fecha" => "2024-04-08 18:00:00", "idCliente" => 8, "idEmpleado" => 1],
            ["importe" => 11.25, "fecha" => "2024-04-09 19:15:00", "idCliente" => 3, "idEmpleado" => 2],
            ["importe" => 9, "fecha" => "2024-04-10 20:30:00", "idCliente" => 12, "idEmpleado" => 4],
            ["importe" => 10.20, "fecha" => "2024-04-11 21:45:00", "idCliente" => 10, "idEmpleado" => 9],
            ["importe" => 7.15, "fecha" => "2024-04-12 23:00:00", "idCliente" => 5, "idEmpleado" => 11],
            ["importe" => 14.80, "fecha" => "2024-04-13 07:00:00", "idCliente" => 1, "idEmpleado" => 7],
            ["importe" => 8.50, "fecha" => "2024-04-14 08:15:00", "idCliente" => 13, "idEmpleado" => 8],
            ["importe" => 11.75, "fecha" => "2024-04-15 09:30:00", "idCliente" => 7, "idEmpleado" => 3],
            ["importe" => 10, "fecha" => "2024-04-16 10:45:00", "idCliente" => 4, "idEmpleado" => 5],
            ["importe" => 10.20, "fecha" => "2024-04-17 12:00:00", "idCliente" => 11, "idEmpleado" => 10],
            ["importe" => 13.40, "fecha" => "2024-04-18 13:15:00", "idCliente" => 2, "idEmpleado" => 6],
            ["importe" => 10.30, "fecha" => "2024-04-19 14:30:00", "idCliente" => 9, "idEmpleado" => 1],
            ["importe" => 12.90, "fecha" => "2024-04-20 15:45:00", "idCliente" => 6, "idEmpleado" => 11],
            ["importe" => 9.75, "fecha" => "2024-04-21 17:00:00", "idCliente" => 13, "idEmpleado" => 2],
            ["importe" => 14.60, "fecha" => "2024-04-22 18:15:00", "idCliente" => 8, "idEmpleado" => 4],
            ["importe" => 12.25, "fecha" => "2024-04-23 19:30:00", "idCliente" => 3, "idEmpleado" => 7],
            ["importe" => 12.40, "fecha" => "2024-04-24 20:45:00", "idCliente" => 12, "idEmpleado" => 9],
            ["importe" => 11.70, "fecha" => "2024-04-25 22:00:00", "idCliente" => 10, "idEmpleado" => 13],
            ["importe" => 10.90, "fecha" => "2024-04-26 07:00:00", "idCliente" => 5, "idEmpleado" => 8],
            ["importe" => 10.50, "fecha" => "2024-04-27 08:15:00", "idCliente" => 1, "idEmpleado" => 3],
            ["importe" => 13.20, "fecha" => "2024-04-28 09:30:00", "idCliente" => 13, "idEmpleado" => 12],
            ["importe" => 7.40, "fecha" => "2024-04-29 10:45:00", "idCliente" => 7, "idEmpleado" => 5],
            ["importe" => 13.80, "fecha" => "2024-04-30 12:00:00", "idCliente" => 4, "idEmpleado" => 11],
            ["importe" => 12.25, "fecha" => "2024-04-01 13:15:00", "idCliente" => 11, "idEmpleado" => 2],
            ["importe" => 9, "fecha" => "2024-04-02 14:30:00", "idCliente" => 2, "idEmpleado" => 10],
            ["importe" => 12.75, "fecha" => "2024-04-03 15:45:00", "idCliente" => 9, "idEmpleado" => 6],
            ["importe" => 10.90, "fecha" => "2024-04-04 17:00:00", "idCliente" => 6, "idEmpleado" => 1],
            ["importe" => 13.60, "fecha" => "2024-04-05 18:15:00", "idCliente" => 13, "idEmpleado" => 11],
            ["importe" => 14.30, "fecha" => "2024-04-06 19:30:00", "idCliente" => 8, "idEmpleado" => 13],
            ["importe" => 12.25, "fecha" => "2024-04-07 20:45:00", "idCliente" => 3, "idEmpleado" => 7],
            ["importe" => 13.50, "fecha" => "2024-04-08 22:00:00", "idCliente" => 12, "idEmpleado" => 5],
            ["importe" => 12.75, "fecha" => "2024-04-09 07:00:00", "idCliente" => 10, "idEmpleado" => 9],
            ["importe" => 11.60, "fecha" => "2024-04-10 08:15:00", "idCliente" => 5, "idEmpleado" => 3],
            ["importe" => 13.20, "fecha" => "2024-04-11 09:30:00", "idCliente" => 1, "idEmpleado" => 13],
            ["importe" => 8.40, "fecha" => "2024-04-12 10:45:00", "idCliente" => 13, "idEmpleado" => 8],
            ["importe" => 13.80, "fecha" => "2024-04-13 12:00:00", "idCliente" => 7, "idEmpleado" => 4],
            ["importe" => 10.75, "fecha" => "2024-04-14 13:15:00", "idCliente" => 4, "idEmpleado" => 12],
            ["importe" => 4.15, "fecha" => "2024-04-14 13:15:00", "idCliente" => 2, "idEmpleado" => 1],        
        ];

        // Crear registros de ventas
        foreach ($ventas as $venta) {
            Ventas::create($venta);
        }

        $detalle_ventas = [["unidades" => 2, "idInventario" => 1, "idVenta" => 1]];
        
        for ($i = 1; $i <= 170; $i++) {
            $detalle_ventas[] = [
                "unidades" => rand(1, 3),
                "idInventario" => rand(1, 10),
                "idVenta" => rand(2, 45)
            ];
        }
        
        foreach ($detalle_ventas as $detalle_venta) {
            Detalle_ventas::create($detalle_venta);
        }
    }
}