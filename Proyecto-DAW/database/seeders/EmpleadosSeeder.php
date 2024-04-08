<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleados;

class EmpleadosSeeder extends Seeder
{
    public function run() {
        if (Empleados::count() === 0) {
            
            Empleados::create([
                'nombre' => 'Mario',
                'apellido' => 'Dieguez',
                'correo' => 'mario@example.com',
                'contrasena' => bcrypt('Mario123'),
                'rol' => 'titular',
            ]);

            Empleados::create([
                'nombre' => 'Sandra',
                'apellido' => 'Bujak',
                'correo' => 'sandra@example.com',
                'contrasena' => bcrypt('Sandra123'),
                'rol' => 'adjunto',
            ]);
    
            Empleados::create([
                'nombre' => 'Iker',
                'apellido' => 'Casillas',
                'correo' => 'iker@example.com',
                'contrasena' => bcrypt('Iker123'),
                'rol' => 'auxiliar',
            ]);
        }
    }
}