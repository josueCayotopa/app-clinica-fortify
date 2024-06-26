<?php

namespace Database\Seeders;

use App\Models\ConceptoSunat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConceptoSunatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conceptos = [
            ["CODIGO" => "100", "DESCRIPCION" => "INGRESOS"],
            ["CODIGO" => "101", "DESCRIPCION" => "ALIMENTACIÓN PRINCIPAL EN DINERO"],
            ["CODIGO" => "102", "DESCRIPCION" => "ALIMENTACIÓN PRINCIPAL EN ESPECIE"],
            ["CODIGO" => "103", "DESCRIPCION" => "COMISIONES O DESTAJO"],
            ["CODIGO" => "104", "DESCRIPCION" => "COMISIONES EVENTUALES A TRABAJADORES"],
            ["CODIGO" => "105", "DESCRIPCION" => "TRABAJO EN SOBRETIEMPO (HORAS EXTRAS) 25%"],
            ["CODIGO" => "106", "DESCRIPCION" => "TRABAJO EN SOBRETIEMPO (HORAS EXTRAS) 35%"],
            ['CODIGO' => '107', 'DESCRIPCION' => 'TRABAJO EN DÍA FERIADO O DÍA DE DESCANSO'],
            ['CODIGO' => '108', 'DESCRIPCION' => 'INCREMENTO EN SNP 3.3 %'],
            ['CODIGO' => '109', 'DESCRIPCION' => 'INCREMENTO POR AFILIACIÓN A AFP 10.23%'],
            ['CODIGO' => '110', 'DESCRIPCION' => 'INCREMENTO POR AFILIACIÓN A AFP 3.00%'],
            ['CODIGO' => '111', 'DESCRIPCION' => 'PREMIOS POR VENTAS'],
            ['CODIGO' => '112', 'DESCRIPCION' => 'PRESTACIONES ALIMENTARIAS - SUMINISTROS DIRECTOS'],
            ['CODIGO' => '113', 'DESCRIPCION' => 'PRESTACIONES ALIMENTARIAS - SUMINISTROS INDIRECTOS'],
            ['CODIGO' => '114', 'DESCRIPCION' => 'VACACIONES TRUNCAS'],
            ['CODIGO' => '115', 'DESCRIPCION' => 'REMUNERACIÓN DÍA DE DESCANSO Y FERIADOS (INCLUIDA LA DEL 1° DE MAYO)'],
            ['CODIGO' => '116', 'DESCRIPCION' => 'REMUNERACIÓN EN ESPECIE'],
            ['CODIGO' => '117', 'DESCRIPCION' => 'COMPENSACIÓN VACACIONAL'],
            ['CODIGO' => '118', 'DESCRIPCION' => 'REMUNERACIÓN VACACIONAL'],
            ['CODIGO' => '119', 'DESCRIPCION' => 'REMUNERACIONES DEVENGADAS'],
            ['CODIGO' => '120', 'DESCRIPCION' => 'SUBVENCIÓN ECONÓMICA MENSUAL (PRACTICANTE SENATI)'],
            ['CODIGO' => '121', 'DESCRIPCION' => 'REMUNERACIÓN O JORNAL BÁSICO'],
            ['CODIGO' => '122', 'DESCRIPCION' => 'REMUNERACIÓN PERMANENTE'],
            ['CODIGO' => '123', 'DESCRIPCION' => 'REMUNERACIÓN DE LOS SOCIOS DE COOPERATIVAS'],
            ['CODIGO' => '124', 'DESCRIPCION' => 'REMUNERACIÓN POR LA HORA DE PERMISO POR LACTANCIA'],
            ['CODIGO' => '125', 'DESCRIPCION' => 'REMUNERACIÓN INTEGRAL ANUAL - CUOTA'],
            ['CODIGO' => '200', 'DESCRIPCION' => 'INGRESOS: ASIGNACIONES'],
            ['CODIGO' => '201', 'DESCRIPCION' => 'ASIGNACIÓN FAMILIAR'],
            ['CODIGO' => '202', 'DESCRIPCION' => 'ASIGNACIÓN O BONIFICACIÓN POR EDUCACIÓN'],
            ['CODIGO' => '203', 'DESCRIPCION' => 'ASIGNACIÓN POR CUMPLEAÑOS'],
            ['CODIGO' => '204', 'DESCRIPCION' => 'ASIGNACIÓN POR MATRIMONIO'],
            ['CODIGO' => '205', 'DESCRIPCION' => 'ASIGNACIÓN POR NACIMIENTO DE HIJOS'],
            ['CODIGO' => '206', 'DESCRIPCION' => 'ASIGNACIÓN POR FALLECIMIENTO DE FAMILIARES'],
            ['CODIGO' => '207', 'DESCRIPCION' => 'ASIGNACIÓN POR OTROS MOTIVOS PERSONALES'],
            ['CODIGO' => '208', 'DESCRIPCION' => 'ASIGNACIÓN POR FESTIVIDAD'],
            ['CODIGO' => '209', 'DESCRIPCION' => 'ASIGNACIÓN PROVISIONAL POR DEMANDA DE TRABAJADOR DESPEDIDO'],
            ['CODIGO' => '210', 'DESCRIPCION' => 'ASIGNACIÓN VACACIONAL'],
            ['CODIGO' => '211', 'DESCRIPCION' => 'ASIGNACIÓN POR ESCOLARIDAD 30 JORNALES BASICOS/AÑO'],
            ['CODIGO' => '212', 'DESCRIPCION' => 'ASIGNACIONES OTORGADAS POR ÚNICA VEZ CON MOTIVO DE CIERTAS CONTINGENCIAS'],
            ['CODIGO' => '213', 'DESCRIPCION' => 'ASIGNACIONES OTORGADAS REGULARMENTE'],
            ['CODIGO' => '214', 'DESCRIPCION' => 'ASIGNACIÓN POR FALLECIMIENTO 1 UIT'],
            ['CODIGO' => '300', 'DESCRIPCION' => 'INGRESOS: BONIFICACIONES'],
            ['CODIGO' => '301', 'DESCRIPCION' => 'BONIFICACIÓN POR 25 Y 30 AÑOS DE SERVICIOS'],
            ['CODIGO' => '302', 'DESCRIPCION' => 'BONIFICACIÓN POR CIERRE DE PLIEGO'],
            ['CODIGO' => '303', 'DESCRIPCION' => 'BONIFICACIÓN POR PRODUCCIÓN, ALTURA, TURNO, ETC.'],
            ['CODIGO' => '304', 'DESCRIPCION' => 'BONIFICACIÓN POR RIESGO DE CAJA'],
            ['CODIGO' => '305', 'DESCRIPCION' => 'BONIFICACIONES POR TIEMPO DE SERVICIOS'],
            ['CODIGO' => '306', 'DESCRIPCION' => 'BONIFICACIONES REGULARES'],
            ['CODIGO' => '307', 'DESCRIPCION' => 'BONIFICACIONES CAFAE'],
            ['CODIGO' => '308', 'DESCRIPCION' => 'COMPENSACIÓN POR TRABAJOS EN DÍAS DE DESCANSO Y EN FERIADOS'],
            ['CODIGO' => '309', 'DESCRIPCION' => 'BONIFICACIÓN POR TURNO NOCTURNO 20% JORNAL BASICO'],
            ['CODIGO' => '310', 'DESCRIPCION' => 'BONIFICACIÓN CONTACTO DIRECTO CON AGUA 20% JORNAL BÁSICO'],
            // Continuar con los demás datos...
        ];

        foreach ($conceptos as $concepto) {
            ConceptoSunat::create($concepto);
        }
    }
}
