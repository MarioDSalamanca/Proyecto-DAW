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
            [ 'nombre' => 'Mario', 'apellido' => 'Dieguez', 'correo' => 'mario@example.com', 'contrasena' => bcrypt('Mario123'), 'rol' => 'titular' ],
            [ 'nombre' => 'Sandra', 'apellido' => 'Bujak', 'correo' => 'sandra@example.com', 'contrasena' => bcrypt('Sandra123'), 'rol' => 'adjunto' ],
            [ 'nombre' => 'Iker', 'apellido' => 'Casillas', 'correo' => 'iker@example.com', 'contrasena' => bcrypt('Iker1234'), 'rol' => 'adjunto' ],        
            [ 'nombre' => 'Sergio', 'apellido' => 'Ramos', 'correo' => 'ramos@example.com', 'contrasena' => bcrypt('Ramos123'), 'rol' => 'adjunto' ],        
            [ 'nombre' => 'Carles', 'apellido' => 'Puyol', 'correo' => 'puyol@example.com', 'contrasena' => bcrypt('Puyol123'), 'rol' => 'adjunto' ],        
            [ 'nombre' => 'Gerard', 'apellido' => 'Pique', 'correo' => 'pique@example.com', 'contrasena' => bcrypt('Pique123'), 'rol' => 'auxiliar' ],        
            [ 'nombre' => 'Joan', 'apellido' => 'Capdevila', 'correo' => 'capdevila@example.com', 'contrasena' => bcrypt('Capdevila123'), 'rol' => 'auxiliar' ],        
            [ 'nombre' => 'Xabi', 'apellido' => 'Alonso', 'correo' => 'xabi@example.com', 'contrasena' => bcrypt('Xabi1234'), 'rol' => 'adjunto' ],        
            [ 'nombre' => 'Sergio', 'apellido' => 'Busquets', 'correo' => 'busquets@example.com', 'contrasena' => bcrypt('Busquets123'), 'rol' => 'auxiliar' ],        
            [ 'nombre' => 'Andrés', 'apellido' => 'Iniesta', 'correo' => 'iniesta@example.com', 'contrasena' => bcrypt('Iniesta123'), 'rol' => 'adjunto' ],        
            [ 'nombre' => 'David', 'apellido' => 'Villa', 'correo' => 'villa@example.com', 'contrasena' => bcrypt('Villa123'), 'rol' => 'adjunto' ],        
            [ 'nombre' => 'Pedro', 'apellido' => 'Rodríguez', 'correo' => 'pedro@example.com', 'contrasena' => bcrypt('Pedro123'), 'rol' => 'auxiliar' ],        
            [ 'nombre' => 'Fernando', 'apellido' => 'Torres', 'correo' => 'fernando@example.com', 'contrasena' => bcrypt('Torres123'), 'rol' => 'adjunto' ]
        ];

        // Crear registros de empleados
        foreach ($empleados as $empleado) {
            Empleados::create($empleado);
        }

        $tareas = [
            [ 'nombre' => 'Fórmula magistral', 'fecha' => '2024-04-30 14:30:00', 'descripcion' => 'Elaborar fórmula magistral de "Disolución de Lugol"', 'idEmpleado' => 1 ],
            [ 'nombre' => 'Fórmula magistral', 'fecha' => '2024-05-10 14:30:00', 'descripcion' => 'Elaborar fórmula magistral de "Cápsulas de sulfato de Zinc"', 'idEmpleado' => 2 ],
            [ 'nombre' => 'Control de caducidades', 'fecha' => '2024-05-31 19:00:00', 'descripcion' => 'Revisar la fecha de caducidad de los productos en el inventario y retirar aquellos que estén vencidos', 'idEmpleado' => 3 ],
            [ 'nombre' => 'Revisión de inventario', 'fecha' => '2024-05-31 09:00:00', 'descripcion' => 'Realizar revisión del inventario de productos para reabastecer aquellos que estén bajos en stock.', 'idEmpleado' => 5 ],
            [ 'nombre' => 'Fórmula magistral', 'fecha' => '2024-05-10 14:30:00', 'descripcion' => 'Elaborar fórmula magistral de "Jarabe de Ipecacuana"', 'idEmpleado' => 4 ],        
            [ 'nombre' => 'Pedido de medicamentos', 'fecha' => '2024-06-02 10:00:00', 'descripcion' => 'Realizar pedido de medicamentos a proveedores para mantener el inventario adecuado.', 'idEmpleado' => 2 ],        
            [ 'nombre' => 'Recepción de pedidos', 'fecha' => '2024-06-03 08:30:00', 'descripcion' => 'Recibir y revisar los pedidos de medicamentos entregados por los proveedores.', 'idEmpleado' => 7 ],        
            [ 'nombre' => 'Atención al cliente', 'fecha' => '2024-06-03 11:00:00', 'descripcion' => 'Atender a los clientes que llegan a la farmacia, proporcionando asesoramiento sobre productos y medicamentos.', 'idEmpleado' => 11 ],        
            [ 'nombre' => 'Control de caducidades', 'fecha' => '2024-06-04 15:00:00', 'descripcion' => 'Revisar la fecha de caducidad de los productos en el inventario y retirar aquellos que estén vencidos.', 'idEmpleado' => 8 ],        
            [ 'nombre' => 'Mantenimiento de la farmacia', 'fecha' => '2024-06-05 13:30:00', 'descripcion' => 'Realizar tareas de limpieza y mantenimiento de la farmacia para garantizar un entorno limpio y ordenado.', 'idEmpleado' => 13 ]
        ];

        // Crear registros de tareas
        foreach ($tareas as $tarea) {
            Tareas::create($tarea);
        }

        $inventario = [
            [ 'nombre' => 'ibufen', 'farmaco' => 'ibuprofeno', 'precio' => 2, 'stock' => 56 ]
        ];

        // Crear registros de inventario
        foreach ($inventario as $producto) {
            Inventario::create($producto);
        }

        $proveedores = [
            [ 'empresa' => 'Pfizer', 'especialidad' => 'Vacunas y medicamentos'] ,
            [ 'empresa' => 'Johnson & Johnson', 'especialidad' => 'Productos médicos y farmacéuticos'] ,
            [ 'empresa' => 'Roche', 'especialidad' => 'Productos farmacéuticos y diagnósticos'] ,
            [ 'empresa' => 'Novartis', 'especialidad' => 'Medicamentos y productos oftalmológicos'] ,
            [ 'empresa' => 'Merck & Co.', 'especialidad' => 'Productos farmacéuticos'] ,
            [ 'empresa' => 'Sanofi', 'especialidad' => 'Vacunas y productos farmacéuticos'] ,
            [ 'empresa' => 'GlaxoSmithKline', 'especialidad' => 'Medicamentos y vacunas'] ,
            [ 'empresa' => 'AstraZeneca', 'especialidad' => 'Medicamentos para enfermedades respiratorias y cardiovasculares'] ,
            [ 'empresa' => 'Bayer', 'especialidad' => 'Medicamentos y productos de salud animal'] ,
            [ 'empresa' => 'AbbVie', 'especialidad' => 'Medicamentos biotecnológicos' ]
        ];

        // Crear registros de proveedores
        foreach ($proveedores as $proveedor) {
            Proveedores::create($proveedor);
        }

        $compras = [
            [ 'importe' => 400, 'unidades' => 220, 'fecha' => '2024-04-10 14:30:00', 'idProveedor' => '2', 'idInventario' => '1' ]
        ];

        // Crear registros de compras
        foreach ($compras as $compra) {
            Compras::create($compra);
        }
    }
}