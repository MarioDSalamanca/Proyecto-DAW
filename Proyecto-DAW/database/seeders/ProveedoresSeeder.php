<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proveedores;

class ProveedoresSeeder extends Seeder
{
    public function run() {

        $proveedores = [
            ['empresa' => 'Pfizer', 'especialidad' => 'Vacunas y medicamentos'],
            ['empresa' => 'Johnson & Johnson', 'especialidad' => 'Productos médicos y farmacéuticos'],
            ['empresa' => 'Roche', 'especialidad' => 'Productos farmacéuticos y diagnósticos'],
            ['empresa' => 'Novartis', 'especialidad' => 'Medicamentos y productos oftalmológicos'],
            ['empresa' => 'Merck & Co.', 'especialidad' => 'Productos farmacéuticos'],
            ['empresa' => 'Sanofi', 'especialidad' => 'Vacunas y productos farmacéuticos'],
            ['empresa' => 'GlaxoSmithKline', 'especialidad' => 'Medicamentos y vacunas'],
            ['empresa' => 'AstraZeneca', 'especialidad' => 'Medicamentos para enfermedades respiratorias y cardiovasculares'],
            ['empresa' => 'Bayer', 'especialidad' => 'Medicamentos y productos de salud animal'],
            ['empresa' => 'AbbVie', 'especialidad' => 'Medicamentos biotecnológicos']
        ];

        // Crear registros de proveedores
        foreach ($proveedores as $proveedor) {
            Proveedor::create($proveedor);
        }
    }
}