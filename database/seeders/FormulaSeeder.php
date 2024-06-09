<?php

namespace Database\Seeders;

use App\Models\Formula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formulas = [
            ['codigo' => '001', 'descripcion' => 'SUELDO BASICO'],
            ['codigo' => '003', 'descripcion' => 'SOBRETIEMPO 1.25'],
            ['codigo' => '004', 'descripcion' => 'DSCTO X TARDANZA'],
            ['codigo' => '006', 'descripcion' => 'SNP'],
            ['codigo' => '007', 'descripcion' => 'AFP'],
            ['codigo' => '008', 'descripcion' => 'ESSALUD'],
            ['codigo' => '009', 'descripcion' => 'IES'],
            ['codigo' => '010', 'descripcion' => 'ADELANTO AUTOMATICO'],
            ['codigo' => '012', 'descripcion' => 'GRATIFICACION'],
            ['codigo' => '013', 'descripcion' => 'EL MISMO VALOR DADO'],
            ['codigo' => '017', 'descripcion' => 'IMPUESTO A LA RENTA'],
            ['codigo' => '018', 'descripcion' => 'IESS'],
            ['codigo' => '019', 'descripcion' => 'ESSALUD VIDA'],
            ['codigo' => '024', 'descripcion' => 'ADELANTO QUINCENAL'],
            ['codigo' => '025', 'descripcion' => 'ASIGNACION FAMILIAR'],
            ['codigo' => '026', 'descripcion' => 'RETENCION JUDICIAL %'],
            ['codigo' => '027', 'descripcion' => 'MONTO POR DIAS'],
            ['codigo' => '028', 'descripcion' => 'ASIG.QUIEBRE DE CJA'],
            ['codigo' => '029', 'descripcion' => 'D.S. ENERO'],
            // Continuar con los demás datos
        ];

        // Iterar sobre los datos y crear registros en la base de datos
        foreach ($formulas as $formula) {
            Formula::create($formula);
        }
        
    }
}
