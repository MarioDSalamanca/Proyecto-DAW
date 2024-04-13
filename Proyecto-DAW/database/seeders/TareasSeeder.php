<?php

namespace Database\Seeders;

use App\Models\Tareas;
use Illuminate\Database\Seeder;

class TareasSeeder extends Seeder
{
    public function run() {
        if (Tareas::count() === 0) {
            
            Tareas::create([
                'nombre' => 'Fórmula magistral',
                'fecha' => '2024-04-30 14:30:00',
                'descripcion' => 'Elaborar fórmula magistral de "Disolución de Lugol"',
                'estado' => 'pendiente',
                'idEmpleado' => '1',
            ]);

            Tareas::create([
                'nombre' => 'Fórmula magistral',
                'fecha' => '2024-05-10 14:30:00',
                'descripcion' => 'Elaborar fórmula magistral de "Cápsulas de sulfato de Zinc"',
                'estado' => 'pendiente',
                'idEmpleado' => '2',
            ]);
    
            Tareas::create([
                'nombre' => 'Inventario',
                'fecha' => '2024-05-31 19:00:00',
                'descripcion' => 'Inventario de productos caducados y su posterior destrucción',
                'estado' => 'pendiente',
                'idEmpleado' => '3',
            ]);
        }
    }
}
