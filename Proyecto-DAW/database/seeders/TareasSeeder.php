<?php

namespace Database\Seeders;

use App\Models\Tareas;
use Illuminate\Database\Seeder;

class TareasSeeder extends Seeder
{
    public function run() {

        Tareas::create([
            'nombre' => 'Fórmula magistral',
            'fecha' => '2024-04-30 14:30:00',
            'descripcion' => 'Elaborar fórmula magistral de "Disolución de Lugol"',
            'estado' => 'pendiente',
            'idEmpleado' => 1,
        ]);

        Tareas::create([
            'nombre' => 'Fórmula magistral',
            'fecha' => '2024-05-10 14:30:00',
            'descripcion' => 'Elaborar fórmula magistral de "Cápsulas de sulfato de Zinc"',
            'estado' => 'pendiente',
            'idEmpleado' => 2,
        ]);

        Tareas::create([
            'nombre' => 'Control de caducidades',
            'fecha' => '2024-05-31 19:00:00',
            'descripcion' => 'Revisar la fecha de caducidad de los productos en el inventario y retirar aquellos que estén vencidos',
            'estado' => 'pendiente',
            'idEmpleado' => 3,
        ]);

        Tareas::create([
            'nombre' => 'Revisión de inventario',
            'fecha' => '2024-05-31 09:00:00',
            'descripcion' => 'Realizar revisión del inventario de productos para reabastecer aquellos que estén bajos en stock.',
            'estado' => 'pendiente',
            'idEmpleado' => 5,
        ]);

        Tareas::create([
            'nombre' => 'Fórmula magistral',
            'fecha' => '2024-05-10 14:30:00',
            'descripcion' => 'Elaborar fórmula magistral de "Jarabe de Ipecacuana"',
            'estado' => 'pendiente',
            'idEmpleado' => 4,
        ]);
        
        Tareas::create([
            'nombre' => 'Pedido de medicamentos',
            'fecha' => '2024-06-02 10:00:00',
            'descripcion' => 'Realizar pedido de medicamentos a proveedores para mantener el inventario adecuado.',
            'estado' => 'pendiente',
            'idEmpleado' => 2,
        ]);
        
        Tareas::create([
            'nombre' => 'Recepción de pedidos',
            'fecha' => '2024-06-03 08:30:00',
            'descripcion' => 'Recibir y revisar los pedidos de medicamentos entregados por los proveedores.',
            'estado' => 'pendiente',
            'idEmpleado' => 7,
        ]);
        
        Tareas::create([
            'nombre' => 'Atención al cliente',
            'fecha' => '2024-06-03 11:00:00',
            'descripcion' => 'Atender a los clientes que llegan a la farmacia, proporcionando asesoramiento sobre productos y medicamentos.',
            'estado' => 'pendiente',
            'idEmpleado' => 11,
        ]);
        
        Tareas::create([
            'nombre' => 'Control de caducidades',
            'fecha' => '2024-06-04 15:00:00',
            'descripcion' => 'Revisar la fecha de caducidad de los productos en el inventario y retirar aquellos que estén vencidos.',
            'estado' => 'pendiente',
            'idEmpleado' => 8,
        ]);
        
        Tareas::create([
            'nombre' => 'Mantenimiento de la farmacia',
            'fecha' => '2024-06-05 13:30:00',
            'descripcion' => 'Realizar tareas de limpieza y mantenimiento de la farmacia para garantizar un entorno limpio y ordenado.',
            'estado' => 'pendiente',
            'idEmpleado' => 13,
        ]);
    }
}
