<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuariosSeeder extends Seeder
{
    public function run() {
        if (Usuarios::count() === 0) {
            
            Usuarios::create([
                'Nombre' => 'Mario',
                'Apellido' => 'Dieguez',
                'Correo' => 'mario@example.com',
                'Contrasena' => bcrypt('Mario123'),
                'Rol' => 'titular',
            ]);

            Usuarios::create([
                'Nombre' => 'Sandra',
                'Apellido' => 'Bujak',
                'Correo' => 'sandra@example.com',
                'Contrasena' => bcrypt('Sandra123'),
                'Rol' => 'adjunto',
            ]);
    
            Usuarios::create([
                'Nombre' => 'Iker',
                'Apellido' => 'Casillas',
                'Correo' => 'iker@example.com',
                'Contrasena' => bcrypt('Iker123'),
                'Rol' => 'auxiliar',
            ]);
        }
    }
}