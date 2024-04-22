<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clientes;

class ClientesSeeder extends Seeder
{
    public function run() {

        $clientes = [
            ["nombre" => "Thibaut", "apellido" => "Courtois", "DNI/CIF" => "23456789B"],
            ["nombre" => "Daniel", "apellido" => "Carvajañ", "DNI/CIF" => "C1234567D"],        
            ["nombre" => "Luka", "apellido" => "Modric", "DNI/CIF" => "D2345678E"],        
            ["nombre" => "Vinicius", "apellido" => "Junior", "DNI/CIF" => "13456789F"],        
            ["nombre" => "Toni", "apellido" => "Kroos", "DNI/CIF" => "4567890G"],       
            ["nombre" => "Jude", "apellido" => "Bellingham", "DNI/CIF" => "12345678A"], 
            ["nombre" => "Ferland", "apellido" => "Mendy", "DNI/CIF" => "G5678901H"],        
            ["nombre" => "Rodrygo", "apellido" => "Goes", "DNI/CIF" => "H6789012I"],        
            ["nombre" => "Eder", "apellido" => "Militao", "DNI/CIF" => "78901235J"],        
            ["nombre" => "Lucas", "apellido" => "Vazquez", "DNI/CIF" => "J8901234K"],        
            ["nombre" => "Federico", "apellido" => "Valverde", "DNI/CIF" => "K9012345L"],        
            ["nombre" => "David", "apellido" => "Alaba", "DNI/CIF" => "L0123456M"],        
            ["nombre" => "Eduardo", "apellido" => "Camavinga", "DNI/CIF" => "M1234567N"],        
            ["nombre" => "Carlo", "apellido" => "Ancelotti", "DNI/CIF" => "01234567N"],
        ];

        // Crear registros de clientes
        foreach ($clientes as $cliente) {
            Clientes::create($cliente);
        }

        
    }
}