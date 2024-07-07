<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index()
    {
        // Recuperar todas las auditorías
        $audits = Audit::paginate(10);

        // Pasar las auditorías a la vista
        return view('audits.index', compact('audits'));
    }
}
