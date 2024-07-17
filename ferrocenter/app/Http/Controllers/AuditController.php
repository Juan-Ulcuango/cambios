<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AuditController extends Controller
{
    public function index()
    {
        // Recuperar todas las auditorías
        $audits = Audit::paginate(10);

        // Pasar las auditorías a la vista
        return view('audits.index', compact('audits'));
    }
    public function exportPdf()
    {
        $audits = Audit::all();
        $pdf = PDF::loadView('audits.pdf', compact('audits'));
        $currentDate = Carbon::now()->format('d-m-Y'); // Formato de fecha: dd-mm-yyyy
        $filename = 'Auditorías-' . $currentDate . '.pdf';
        return $pdf->download($filename);
    }

}
