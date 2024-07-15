<?php

namespace App\Http\Controllers;

use App\Exports\EmpresaExport;

use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new EmpresaExport, 'empresas.xlsx');
    }
}
