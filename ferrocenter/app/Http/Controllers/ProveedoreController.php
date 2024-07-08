<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProveedore;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('can:view.suppliers')->only('index','show');
        $this->middleware('can:create.suppliers')->only('create','store');
        $this->middleware('can:edit.suppliers')->only('edit','update');
        $this->middleware('can:delete.suppliers')->only('destroy');
    }
    public function index()
    {
        $proveedores = Proveedore::paginate(10);

        return view('proveedore.index', compact('proveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedore = new Proveedore();
        return view('proveedore.create', compact('proveedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedore $request)
    {
        // request()->validate(Proveedore::$rules);
        // $proveedore = Proveedore::create($request->all());
        $proveedore = new Proveedore();
        $proveedore->nombre_proveedor = $request->nombre_proveedor;
        $proveedore->direccion_proveedor  = $request->direccion_proveedor;
        $proveedore->telefono_proveedor = $request->telefono_proveedor;
        $proveedore->email_proveedor  = $request->email_proveedor;
        $proveedore->save();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedore $proveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        // request()->validate(Proveedore::$rules);
        // $proveedore->update($request->all());

        $proveedore->nombre_proveedor = $request->nombre_proveedor;
        $proveedore->direccion_proveedor  = $request->direccion_proveedor;
        $proveedore->telefono_proveedor = $request->telefono_proveedor;
        $proveedore->email_proveedor  = $request->email_proveedor;
        $proveedore->save();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proveedore = Proveedore::find($id)->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore deleted successfully');
    }
    public function exportPdf()
    {
        $proveedores = Proveedore::all();
        $pdf = PDF::loadView('proveedore.pdf', compact('proveedores'));
        $currentDate = Carbon::now()->format('d-m-Y'); // Formato de fecha: dd-mm-yyyy
        $filename = 'Proveedores-' . $currentDate . '.pdf';
        return $pdf->download($filename);
    }

}
