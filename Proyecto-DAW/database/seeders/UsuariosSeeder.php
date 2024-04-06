<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuariosSeeder extends Seeder
{
    public function run() {
        if (Usuarios::count() === 0) {
            
            Usuarios::create([
                'nombre' => 'Mario',
                'apellido' => 'Dieguez',
                'correo' => 'mario@example.com',
                'contrasena' => bcrypt('Mario123'),
                'rol' => 'titular',
            ]);

            Usuarios::create([
                'nombre' => 'Sandra',
                'apellido' => 'Bujak',
                'correo' => 'sandra@example.com',
                'contrasena' => bcrypt('Sandra123'),
                'rol' => 'adjunto',
            ]);
    
            Usuarios::create([
                'nombre' => 'Iker',
                'apellido' => 'Casillas',
                'correo' => 'iker@example.com',
                'contrasena' => bcrypt('Iker123'),
                'rol' => 'auxiliar',
            ]);
        }
    }
}