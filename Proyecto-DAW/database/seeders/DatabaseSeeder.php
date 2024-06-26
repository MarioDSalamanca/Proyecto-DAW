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
            ['nombre' => 'Ibufen', 'farmaco' => 'Ibuprofeno', 'precio' => 2, 'prescripcion' => false, 'stock' => 56],
            ['nombre' => 'Norlevo', 'farmaco' => 'Levonorgestrel', 'precio' => 1.5, 'prescripcion' => true, 'stock' => 70],
            ['nombre' => 'Eutirox', 'farmaco' => 'Levotiroxina', 'precio' => 3, 'prescripcion' => true, 'stock' => 5],
            ['nombre' => 'Tylenol', 'farmaco' => 'Paracetamol', 'precio' => 1.8, 'prescripcion' => false, 'stock' => 50],
            ['nombre' => 'Lumigan', 'farmaco' => 'Bimatoprost', 'precio' => 2.5, 'prescripcion' => true, 'stock' => 60],
            ['nombre' => 'Viread', 'farmaco' => 'Tenofovir', 'precio' => 4, 'prescripcion' => true, 'stock' => 30],
            ['nombre' => 'Valium', 'farmaco' => 'Diazepam', 'precio' => 3.5, 'prescripcion' => true, 'stock' => 25],
            ['nombre' => 'Plenur', 'farmaco' => 'Carbonato de calcio', 'precio' => 5, 'prescripcion' => true, 'stock' => 20],
            ['nombre' => 'Sintrom', 'farmaco' => 'Acenocumarol', 'precio' => 4, 'prescripcion' => true, 'stock' => 40],
            ['nombre' => 'Nolotil', 'farmaco' => 'Metamizol magnésico', 'precio' => 6, 'prescripcion' => true, 'stock' => 15],
            ['nombre' => 'Ebastina', 'farmaco' => 'Ebastina', 'precio' => 3.2, 'prescripcion' => true, 'stock' => 25],
        ];

        // Crear registros de inventario
        foreach ($inventario as $producto) {
            Inventario::create($producto);
        }

        $proveedores = [
            ['empresa' => 'Bidafarma'],
            ['empresa' => 'Cofares'],
            ['empresa' => 'Bayer'],
        ];

        // Crear registros de proveedores
        foreach ($proveedores as $proveedor) {
            Proveedores::create($proveedor);
        }

        $compras = [
            ['importe' => 28, 'unidades' => 35, 'fecha' => '2023-12-03 10:30:00', 'idProveedor' => 1, 'idInventario' => 2],
            ['importe' => 38, 'unidades' => 75, 'fecha' => '2023-12-05 15:20:00', 'idProveedor' => 1, 'idInventario' => 4],
            ['importe' => 31, 'unidades' => 95, 'fecha' => '2023-12-27 10:40:00', 'idProveedor' => 2, 'idInventario' => 5],
            ['importe' => 55, 'unidades' => 70, 'fecha' => '2023-12-09 11:10:00', 'idProveedor' => 2, 'idInventario' => 3],
            ['importe' => 29, 'unidades' => 20, 'fecha' => '2024-01-10 11:10:00', 'idProveedor' => 3, 'idInventario' => 7],
            ['importe' => 46, 'unidades' => 60, 'fecha' => '2024-01-28 14:05:00', 'idProveedor' => 1, 'idInventario' => 3],
            ['importe' => 55, 'unidades' => 50, 'fecha' => '2024-01-17 12:35:00', 'idProveedor' => 2, 'idInventario' => 7],
            ['importe' => 30, 'unidades' => 80, 'fecha' => '2024-01-05 08:25:00', 'idProveedor' => 1, 'idInventario' => 1],
            ['importe' => 45, 'unidades' => 40, 'fecha' => '2024-02-15 09:45:00', 'idProveedor' => 2, 'idInventario' => 9],
            ['importe' => 42, 'unidades' => 75, 'fecha' => '2024-02-11 16:00:00', 'idProveedor' => 2, 'idInventario' => 8],
            ['importe' => 36, 'unidades' => 45, 'fecha' => '2024-02-22 11:50:00', 'idProveedor' => 1, 'idInventario' => 9],
            ['importe' => 19, 'unidades' => 50, 'fecha' => '2024-02-03 14:50:00', 'idProveedor' => 3, 'idInventario' => 8],
            ['importe' => 42, 'unidades' => 50, 'fecha' => '2024-03-04 11:20:00', 'idProveedor' => 1, 'idInventario' => 1],
            ['importe' => 50, 'unidades' => 55, 'fecha' => '2024-03-05 16:00:00', 'idProveedor' => 1, 'idInventario' => 3],
            ['importe' => 35, 'unidades' => 80, 'fecha' => '2024-03-07 08:30:00', 'idProveedor' => 1, 'idInventario' => 1],
            ['importe' => 48, 'unidades' => 90, 'fecha' => '2024-03-08 12:45:00', 'idProveedor' => 1, 'idInventario' => 9],
            ['importe' => 34, 'unidades' => 60, 'fecha' => '2024-04-16 14:15:00', 'idProveedor' => 2, 'idInventario' => 4],
            ['importe' => 49, 'unidades' => 100, 'fecha' => '2024-04-22 14:20:00', 'idProveedor' => 2, 'idInventario' => 5],
            ['importe' => 62, 'unidades' => 50, 'fecha' => '2024-04-23 09:50:00', 'idProveedor' => 3, 'idInventario' => 8],
            ['importe' => 32, 'unidades' => 80, 'fecha' => '2024-05-02 14:30:00', 'idProveedor' => 2, 'idInventario' => 7],
            ['importe' => 45, 'unidades' => 35, 'fecha' => '2024-05-03 09:45:00', 'idProveedor' => 3, 'idInventario' => 6],
            ['importe' => 42, 'unidades' => 50, 'fecha' => '2024-05-04 11:20:00', 'idProveedor' => 1, 'idInventario' => 1],
            ['importe' => 65, 'unidades' => 80, 'fecha' => '2024-05-07 08:30:00', 'idProveedor' => 1, 'idInventario' => 1],
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
            ["importe" => 0, "fecha" => "2023-12-04 14:22:00", "idCliente" => null, "idEmpleado" => 9],
            ["importe" => 0, "fecha" => "2023-12-22 16:50:00", "idCliente" => 8, "idEmpleado" => 11],
            ["importe" => 0, "fecha" => "2023-12-08 10:05:00", "idCliente" => 1, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2023-12-15 14:10:00", "idCliente" => 3, "idEmpleado" => 5],
            ["importe" => 0, "fecha" => "2023-12-04 14:22:00", "idCliente" => 7, "idEmpleado" => 9],
            ["importe" => 0, "fecha" => "2023-12-22 16:50:00", "idCliente" => 8, "idEmpleado" => 11],
            ["importe" => 0, "fecha" => "2023-12-08 10:05:00", "idCliente" => 1, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2023-12-15 14:10:00", "idCliente" => 3, "idEmpleado" => 5],
            ["importe" => 0, "fecha" => "2023-12-01 09:45:00", "idCliente" => 2, "idEmpleado" => 8],
            ["importe" => 0, "fecha" => "2023-12-27 11:25:00", "idCliente" => 11, "idEmpleado" => 3],
            ["importe" => 0, "fecha" => "2023-12-19 14:40:00", "idCliente" => 5, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2023-12-06 09:05:00", "idCliente" => 3, "idEmpleado" => 2],
            ["importe" => 0, "fecha" => "2023-12-30 14:20:00", "idCliente" => 2, "idEmpleado" => 13],
            ["importe" => 0, "fecha" => "2023-12-13 16:25:00", "idCliente" => 4, "idEmpleado" => 1],
            ["importe" => 0, "fecha" => "2023-12-11 08:50:00", "idCliente" => 8, "idEmpleado" => 4],
            ["importe" => 0, "fecha" => "2023-12-25 12:34:00", "idCliente" => 6, "idEmpleado" => 3],
            ["importe" => 0, "fecha" => "2023-12-07 13:20:00", "idCliente" => 3, "idEmpleado" => 5],
            ["importe" => 0, "fecha" => "2023-12-17 14:30:00", "idCliente" => 13, "idEmpleado" => 4],
            ["importe" => 0, "fecha" => "2024-01-11 08:30:00", "idCliente" => 12, "idEmpleado" => 3],
            ["importe" => 0, "fecha" => "2024-01-03 09:15:00", "idCliente" => 14, "idEmpleado" => 4],
            ["importe" => 0, "fecha" => "2024-01-20 11:40:00", "idCliente" => 6, "idEmpleado" => 12],
            ["importe" => 0, "fecha" => "2024-01-29 10:30:00", "idCliente" => 13, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-01-11 08:30:00", "idCliente" => 12, "idEmpleado" => 3],
            ["importe" => 0, "fecha" => "2024-01-03 09:15:00", "idCliente" => 14, "idEmpleado" => 4],
            ["importe" => 0, "fecha" => "2024-01-20 11:40:00", "idCliente" => 6, "idEmpleado" => 12],
            ["importe" => 0, "fecha" => "2024-01-29 10:30:00", "idCliente" => 13, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-01-05 12:00:00", "idCliente" => 8, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2024-01-12 15:30:00", "idCliente" => 7, "idEmpleado" => 4],
            ["importe" => 0, "fecha" => "2024-01-23 11:50:00", "idCliente" => 9, "idEmpleado" => 12],
            ["importe" => 0, "fecha" => "2024-01-08 10:40:00", "idCliente" => 10, "idEmpleado" => 3],
            ["importe" => 0, "fecha" => "2024-01-25 09:30:00", "idCliente" => 1, "idEmpleado" => 8],
            ["importe" => 0, "fecha" => "2024-01-16 13:00:00", "idCliente" => 5, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-01-20 11:00:00", "idCliente" => 10, "idEmpleado" => 12],
            ["importe" => 0, "fecha" => "2024-01-14 10:55:00", "idCliente" => 2, "idEmpleado" => 13],
            ["importe" => 0, "fecha" => "2024-01-28 09:25:00", "idCliente" => 12, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-02-16 12:45:00", "idCliente" => 5, "idEmpleado" => 2],
            ["importe" => 0, "fecha" => "2024-02-24 13:35:00", "idCliente" => 9, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-02-12 15:20:00", "idCliente" => 10, "idEmpleado" => 13],
            ["importe" => 0, "fecha" => "2024-02-02 16:55:00", "idCliente" => 4, "idEmpleado" => 1],
            ["importe" => 0, "fecha" => "2024-02-16 12:45:00", "idCliente" => 5, "idEmpleado" => 2],
            ["importe" => 0, "fecha" => "2024-02-24 13:35:00", "idCliente" => 9, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-02-12 15:20:00", "idCliente" => 10, "idEmpleado" => 13],
            ["importe" => 0, "fecha" => "2024-02-02 16:55:00", "idCliente" => 4, "idEmpleado" => 1],
            ["importe" => 0, "fecha" => "2024-02-08 13:05:00", "idCliente" => 1, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-02-27 10:15:00", "idCliente" => 14, "idEmpleado" => 11],
            ["importe" => 0, "fecha" => "2024-02-14 13:45:00", "idCliente" => 6, "idEmpleado" => 5],
            ["importe" => 0, "fecha" => "2024-02-05 12:10:00", "idCliente" => 11, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2024-02-21 15:55:00", "idCliente" => 12, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-02-19 11:35:00", "idCliente" => 9, "idEmpleado" => 11],
            ["importe" => 0, "fecha" => "2024-02-18 09:15:00", "idCliente" => 7, "idEmpleado" => 2],
            ["importe" => 0, "fecha" => "2024-02-04 08:10:00", "idCliente" => 11, "idEmpleado" => 1],
            ["importe" => 0, "fecha" => "2024-02-22 10:40:00", "idCliente" => 4, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2024-03-01 09:15:00", "idCliente" => 5, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2024-03-02 10:30:00", "idCliente" => 4, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-03-04 13:00:00", "idCliente" => 2, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-03-05 14:15:00", "idCliente" => 9, "idEmpleado" => 12],
            ["importe" => 0, "fecha" => "2024-03-06 15:30:00", "idCliente" => 6, "idEmpleado" => 13],
            ["importe" => 0, "fecha" => "2024-03-01 09:45:00", "idCliente" => 5, "idEmpleado" => 8],
            ["importe" => 0, "fecha" => "2024-03-02 10:20:00", "idCliente" => 10, "idEmpleado" => 11],
            ["importe" => 0, "fecha" => "2024-03-04 13:30:00", "idCliente" => 3, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2024-03-05 14:50:00", "idCliente" => 1, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-03-06 15:15:00", "idCliente" => 12, "idEmpleado" => 9],
            ["importe" => 0, "fecha" => "2024-03-01 09:15:00", "idCliente" => 3, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2024-03-02 10:30:00", "idCliente" => 4, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-03-04 13:00:00", "idCliente" => 2, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-03-05 14:15:00", "idCliente" => 9, "idEmpleado" => 12],
            ["importe" => 0, "fecha" => "2024-04-14 08:30:00", "idCliente" => 7, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-04-15 09:00:00", "idCliente" => 9, "idEmpleado" => 4],
            ["importe" => 0, "fecha" => "2024-04-16 10:55:00", "idCliente" => 4, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-04-17 12:10:00", "idCliente" => 13, "idEmpleado" => 11],
            ["importe" => 0, "fecha" => "2024-04-14 08:30:00", "idCliente" => 7, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-04-15 09:00:00", "idCliente" => 9, "idEmpleado" => 4],
            ["importe" => 0, "fecha" => "2024-04-16 10:55:00", "idCliente" => 4, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-04-17 12:10:00", "idCliente" => 13, "idEmpleado" => 11],
            ["importe" => 0, "fecha" => "2024-04-18 13:20:00", "idCliente" => 2, "idEmpleado" => 8],
            ["importe" => 0, "fecha" => "2024-04-19 14:40:00", "idCliente" => 11, "idEmpleado" => 3],
            ["importe" => 0, "fecha" => "2024-04-21 17:20:00", "idCliente" => 5, "idEmpleado" => 12],
            ["importe" => 0, "fecha" => "2024-04-25 22:10:00", "idCliente" => 4, "idEmpleado" => 13],
            ["importe" => 0, "fecha" => "2024-04-14 08:15:00", "idCliente" => 3, "idEmpleado" => 8],
            ["importe" => 0, "fecha" => "2024-04-15 09:30:00", "idCliente" => 7, "idEmpleado" => 3],
            ["importe" => 0, "fecha" => "2024-04-16 10:45:00", "idCliente" => 4, "idEmpleado" => 5],
            ["importe" => 0, "fecha" => "2024-04-17 12:00:00", "idCliente" => 11, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-04-18 13:15:00", "idCliente" => 2, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-04-19 14:30:00", "idCliente" => 9, "idEmpleado" => 1],
            ["importe" => 0, "fecha" => "2024-04-21 17:00:00", "idCliente" => 13, "idEmpleado" => 2],
            ["importe" => 0, "fecha" => "2024-04-23 19:30:00", "idCliente" => 3, "idEmpleado" => 7],
            ["importe" => 0, "fecha" => "2024-04-24 20:45:00", "idCliente" => 12, "idEmpleado" => 9],
            ["importe" => 0, "fecha" => "2024-04-25 22:00:00", "idCliente" => 10, "idEmpleado" => 13],
            ["importe" => 0, "fecha" => "2024-05-08 18:15:00", "idCliente" => 3, "idEmpleado" => 1],
            ["importe" => 0, "fecha" => "2024-05-10 20:40:00", "idCliente" => 10, "idEmpleado" => 5],
            ["importe" => 0, "fecha" => "2024-05-11 21:50:00", "idCliente" => 7, "idEmpleado" => 10],
            ["importe" => 0, "fecha" => "2024-05-08 18:15:00", "idCliente" => 3, "idEmpleado" => 1],
            ["importe" => 0, "fecha" => "2024-05-12 23:20:00", "idCliente" => 12, "idEmpleado" => 12],
            ["importe" => 0, "fecha" => "2024-05-13 07:30:00", "idCliente" => 1, "idEmpleado" => 6],
            ["importe" => 0, "fecha" => "2024-05-08 18:00:00", "idCliente" => 8, "idEmpleado" => 1],
            ["importe" => 0, "fecha" => "2024-05-10 20:30:00", "idCliente" => 12, "idEmpleado" => 4],
            ["importe" => 0, "fecha" => "2024-05-11 21:45:00", "idCliente" => 10, "idEmpleado" => 9],
            ["importe" => 0, "fecha" => "2024-05-12 23:00:00", "idCliente" => 5, "idEmpleado" => 11],
            ["importe" => 0, "fecha" => "2024-05-13 07:00:00", "idCliente" => 1, "idEmpleado" => 7],
        ];

        // Crear registros de ventas
        foreach ($ventas as $venta) {
            Ventas::create($venta);
        }

        // Inserción para detalle_ventas
        // Preparar una sin prescripción
        $detalle_ventas = [["unidades" => 2, "idInventario" => 1, "idVenta" => 1]];
        
        $ids = [];

        for ($idVenta = 2; $idVenta <= 99; $idVenta++) {
            
            $n = rand(1, 3);

            for ($i = 0; $i < $n; $i++) {

                $unidades = rand(1, 2);
                $idInventario = rand(1, 11);

                if (!in_array($idInventario, $ids)) {
                    $ids[] = $idInventario;
                }

                $detalle_ventas[] = [
                    "unidades" => $unidades,
                    "idInventario" => $idInventario,
                    "idVenta" => $idVenta
                ];
            }
        }

        foreach ($detalle_ventas as $detalle_venta) {
            Detalle_ventas::create($detalle_venta);
        }

        $ventas = Ventas::pluck('idVenta', 'importe');

        $ventas = Ventas::pluck('importe', 'idVenta');

        foreach ($ventas as $idVenta => $importe) {

            // Buscar todos los productos vendidos en esta venta
            $productos = Detalle_ventas::where('idVenta', $idVenta)->get();

            $importeVenta = 0;

            // Calcular el importe para esta venta
            foreach ($productos as $producto) {
                
                $precioProducto = $producto->inventario->precio;

                $importeVenta += $precioProducto * $producto->unidades;
            }

            Ventas::where('idVenta', $idVenta)->update(['importe' => $importeVenta]);
        }
    }
}