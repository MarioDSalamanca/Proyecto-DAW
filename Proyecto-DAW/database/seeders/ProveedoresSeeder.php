<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proveedores;

class ProveedoresSeeder extends Seeder
{
    public function run() {

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
            Proveedor::create($proveedor);
        }
    }
}