<?php

namespace Database\Seeders;

use App\Models\DatosPersonal;
use App\Models\JornadaLaboral;
use App\Models\ModalidadFormativa;
use App\Models\PeriodoLaboral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatosPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 5; $i++) {
            // Crear PeriodoLaboral
            $periodoLaboral = PeriodoLaboral::create([
                'categoria_periodos_id' => 1, // Asumiendo que esta categoría existe
                'fecha_inicio' => now()->subYears(1)->toDateString(),
                'fecha_fin' => null,
                'motivo_fin_id' => null,
            ]);

            // Crear JornadaLaboral
            $jornadaLaboral = JornadaLaboral::create([
                'horas_trabajadas' => 40,
                'minutos_trabajados' => 0,
                'horas_sobretiempo' => 0,
                'minutos_sobretiempo' => 0,
                'descripcion' => 'Jornada estándar',
                'numero_dias_semana' => 5,
                'hora_ingreso' => '09:00:00',
                'hora_salida' => '18:00:00',
            ]);

            // Crear ModalidadFormativa
            $modalidadFormativa = ModalidadFormativa::create([
                'discapacidad' => 0,
                'institucion_id' => 1, // Asumiendo que este ID existe
                'horario_nocturno' => 0,
                'tipo_pago_id' => 1, // Asumiendo que este ID existe
                'tipo_banco_id' => 1, // Asumiendo que este ID existe
                'numero_bancaria' => '1234567890',
                'monto_pago' => 1025.00,
                'periodo_laboral_id' => $periodoLaboral->id,
                'jornada_laboral_id' => $jornadaLaboral->id,
                'sucursal_establecimiento_laboral_id' => 1, // Asumiendo que este ID existe
            ]);

            // Crear DatosPersonal
            DatosPersonal::create([
                'tipo_documento_id' => 1, // Asumiendo que este ID existe
                'numero_documento' => '12345678' . $i,
                'apellido_paterno' => 'Apellido' . $i,
                'apellido_materno' => 'Materno' . $i,
                'nombres' => 'Nombre' . $i,
                'fecha_nacimiento' => now()->subYears(30)->toDateString(),
                'sexo' => 'M',
                'nacionalidad_id' => 1, // Asumiendo que este ID existe
                'telefono' => '987654321' . $i,
                'correo_electronico' => 'correo' . $i . '@example.com',
                'imagen' => null,
                'curriculum' => null,
                'essalud_vida' => 0,
                'domiciliado' => 0,
                'via_id' => 1, // Asumiendo que este ID existe
                'nombre_via' => 'Calle' . $i,
                'numero_via' => '100' . $i,
                'interior' => 'A',
                'zona_id' => 1, // Asumiendo que este ID existe
                'nombre_zona' => 'Zona' . $i,
                'referencia' => 'Referencia' . $i,
                'distrito_id' => 1, // Asumiendo que este ID existe
                'modaliad_formativa_id' => $modalidadFormativa->id,
            ]);
        }
    }
}
