<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clientes;

class ClientesSeeder extends Seeder
{
    public function run() {

        $clientes = [
            ["nombre" => "Thibaut", "apellido" => "Courtois", "dni-cif" => "23456789B"],
            ["nombre" => "Daniel", "apellido" => "Carvajañ", "dni-cif" => "C1234567D"],        
            ["nombre" => "Luka", "apellido" => "Modric", "dni-cif" => "D2345678E"],        
            ["nombre" => "Vinicius", "apellido" => "Junior", "dni-cif" => "13456789F"],        
            ["nombre" => "Toni", "apellido" => "Kroos", "dni-cif" => "4567890G"],       
            ["nombre" => "Jude", "apellido" => "Bellingham", "dni-cif" => "12345678A"], 
            ["nombre" => "Ferland", "apellido" => "Mendy", "dni-cif" => "G5678901H"],        
            ["nombre" => "Rodrygo", "apellido" => "Goes", "dni-cif" => "H6789012I"],        
            ["nombre" => "Eder", "apellido" => "Militao", "dni-cif" => "78901235J"],        
            ["nombre" => "Lucas", "apellido" => "Vazquez", "dni-cif" => "J8901234K"],        
            ["nombre" => "Federico", "apellido" => "Valverde", "dni-cif" => "K9012345L"],        
            ["nombre" => "David", "apellido" => "Alaba", "dni-cif" => "L0123456M"],        
            ["nombre" => "Eduardo", "apellido" => "Camavinga", "dni-cif" => "M1234567N"],        
            ["nombre" => "Carlo", "apellido" => "Ancelotti", "dni-cif" => "01234567N"],
        ];

        // Crear registros de clientes
        foreach ($clientes as $cliente) {
            Clientes::create($cliente);
        }

        
    }
}