<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TipoTrabajadorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_trabajadors')->insert([
            [
                'codigo_sunat'=>'19',
                'descripcion' => 'EJECUTIVO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat'=>'20',
                'descripcion' => 'OBRERO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat'=>'21',
                'descripcion' => 'EMPLEADO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat'=>'22',
                'descripcion' => 'TRABAJADOR PORTUARIO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat'=>'23',
                'descripcion' => 'PRACTICANTE SENATI',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat'=>'24',
                'descripcion' => 'PENSIONISTA O CESANTE',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat'=>'26',
                'descripcion' => 'PENSIONISTA - LEY 28320',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat'=>'27',
                'descripcion' => 'CONSTRUCCIÓN CIVIL',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '28',
                'descripcion' => 'PILOTO Y COPILOTO DE AVIA. COM.',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '29',
                'descripcion' => 'MARÍTIMO, FLUVIAL O LACUSTRE',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '30',
                'descripcion' => 'PERIODISTA',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '31',
                'descripcion' => 'TRAB. DE LA INDUSTRIA DE CUERO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '32',
                'descripcion' => 'MINERO DE MINA DE SOCAVÓN',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '36',
                'descripcion' => 'PESCADOR - LEY 28320',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '37',
                'descripcion' => 'MINERO DE TAJO ABIERTO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '38',
                'descripcion' => 'MINERO DE INDUSTRIA MINERA METALÚRGICA',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '56',
                'descripcion' => 'ARTISTA - LEY DEL ARTISTA - LEY 28131',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '64',
                'descripcion' => 'AGRARIO DEPENDIENTE - LEY 27360',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '65',
                'descripcion' => 'TRABAJADOR ACTIVIDAD ACUÍCOLA - LEY 27460',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '66',
                'descripcion' => 'PESCADOR Y PROCESADOR ARTESANAL INDEPENDIENTE',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '67',
                'descripcion' => 'REG. ESPECIAL D. LEG.1057',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '68',
                'descripcion' => 'TRABAJADOR DE LA MICROEMPRESA AFILIADO AL SIS',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '69',
                'descripcion' => 'CONDUCTOR DE LA MICROEMPRESA AFILIADO AL SIS',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '70',
                'descripcion' => 'CONDUCTOR DE LA MICROEMPRESA - SEGURO REGULAR',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '82',
                'descripcion' => 'FUNCIONARIO PÚBLICO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now(),
            ],
            [
                'codigo_sunat' => '83',
                'descripcion' => 'EMPLEADO DE CONFIANZA',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '84',
                'descripcion' => 'SERVIDOR PÚBLICO - DIRECTIVO SUPERIOR',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '85',
                'descripcion' => 'SERVIDOR PÚBLICO - EJECUTIVO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '86',
                'descripcion' => 'SERVIDOR PÚBLICO - ESPECIALISTA',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '87',
                'descripcion' => 'SERVIDOR PÚBLICO - DE APOYO',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '88',
                'descripcion' => 'PERSONAL DE LA ADMINISTRACIÓN PÚBLICA - ASIGNACIÓN ESPECIAL - D.U. 126-2001',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo_sunat' => '98',
                'descripcion' => 'PERSONA QUE GENERA INGRESOS DE CUARTA - QUINTA CATEGORÍA',
                'estado' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Añade más registros si es necesario
        ]);
        
    }
}
