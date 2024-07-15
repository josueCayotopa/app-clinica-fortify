<?php

namespace App\Exports;

use App\Models\Empresa;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmpresaExport implements FromCollection, WithHeadings
{
  

    use Exportable;


    public function collection()
    {
        return Empresa::all();
    }

    public function headings(): array
    {
        return [
            'Código Empresa',
            'Razón Social',
            'Nombre Comercial',
            'RUC Empresa',
            'Nombre Representante Legal',
        ];
    }
}
