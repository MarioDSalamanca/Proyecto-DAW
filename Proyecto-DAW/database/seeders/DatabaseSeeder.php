<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleados;
use App\Models\Inventario;
use App\Models\Proveedores;
use App\Models\Tareas;
use App\Models\Compras;

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

        $proveedores = [
            ['empresa' => 'Pfizer', 'especialidad' => 'Vacunas y medicamentos'],
            ['empresa' => 'Johnson & Johnson', 'especialidad' => 'Productos de cuidado personal, dispositivos médicos y medicamentos'],
            ['empresa' => 'Roche', 'especialidad' => 'Productos farmacéuticos y diagnósticos'],
            ['empresa' => 'Merck & Co.', 'especialidad' => 'Medicamentos y productos químicos'],
            ['empresa' => 'Novartis', 'especialidad' => 'Medicamentos y cuidado de la visión'],
            ['empresa' => 'GlaxoSmithKline', 'especialidad' => 'Vacunas y medicamentos'],
            ['empresa' => 'Sanofi', 'especialidad' => 'Medicamentos y vacunas'],
            ['empresa' => 'AbbVie', 'especialidad' => 'Medicamentos biotecnológicos'],
            ['empresa' => 'AstraZeneca', 'especialidad' => 'Medicamentos para enfermedades respiratorias y cardiovasculares'],
            ['empresa' => 'Bayer', 'especialidad' => 'Medicamentos y productos de salud animal'],
            ['empresa' => 'Novo Nordisk', 'especialidad' => 'Medicamentos para la diabetes y trastornos hemorrágicos'],
            ['empresa' => 'Eli Lilly and Company', 'especialidad' => 'Medicamentos para la diabetes y enfermedades endocrinas'],
            ['empresa' => 'Bristol Myers Squibb', 'especialidad' => 'Oncología y medicamentos para enfermedades inmunológicas'],
            ['empresa' => 'Gilead Sciences', 'especialidad' => 'Medicamentos antivirales y terapia celular'],
            ['empresa' => 'Takeda Pharmaceutical Company', 'especialidad' => 'Medicamentos para enfermedades gastrointestinales y oncológicas'],
            ['empresa' => 'Abbott Laboratories', 'especialidad' => 'Productos médicos y diagnósticos'],
            ['empresa' => 'Allergan', 'especialidad' => 'Dermatología y estética'],
            ['empresa' => 'Celgene', 'especialidad' => 'Medicamentos oncológicos e inmunológicos'],
            ['empresa' => 'Mylan', 'especialidad' => 'Medicamentos genéricos y productos farmacéuticos'],
            ['empresa' => 'Vertex Pharmaceuticals', 'especialidad' => 'Medicamentos para enfermedades genéticas y raras'],
        ];

        // Crear registros de proveedores
        foreach ($proveedores as $proveedor) {
            Proveedores::create($proveedor);
        }

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