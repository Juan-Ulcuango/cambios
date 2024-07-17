<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AuditController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view.audits')->only('index');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $audits = Audit::where('id', 'like', "%{$search}%")
                ->orWhere('event', 'like', "%{$search}%")
                ->paginate(10);
        } else {
            $audits = Audit::paginate(10);
        }

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
