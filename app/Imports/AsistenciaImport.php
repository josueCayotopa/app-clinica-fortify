<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Asistencia;
use Carbon\Carbon;


class AsistenciaImport implements ToModel
{
    public function collection(Collection $rows)
    {
        /* foreach ($rows as $row) {
            if ($row[0] && $row[1] && $row[2] && $row[3]) {
                $fecha = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])->format('dd/MM/YYYY');
                $fechaCarbon = Carbon::instance($fecha);
                Asistencia::create([
                    'empleado_id' => $row[0],
                    'fecha' => $fechaCarbon,
                    'hora_entrada' => $row[2],
                    'hora_salida' => $row[3],
                ]);
            }
        } */

        /* foreach ($rows as $row) {
            if ($row[0] && $row[1] && $row[2] && $row[3]) {
                // Convertir la fecha de Excel a un objeto DateTime
                $fecha = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]);

                // Convertir a instancia de Carbon
                $fechaCarbon = Carbon::instance($fecha);

                Asistencia::create([
                    'empleado_id' => $row[0],
                    'fecha' => $fechaCarbon,
                    'hora_entrada' => $row[2],
                    'hora_salida' => $row[3],
                ]);
            }
        } */

        
    }

    public function model(array $row)
    {
        return new Asistencia([
            'empleado_id' => $row[0],
            'fecha' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]),
            'hora_entrada' => $row[2],
            'hora_salida' => $row[3],
        ]);
    }
}