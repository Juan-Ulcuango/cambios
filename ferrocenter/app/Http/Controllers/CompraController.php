<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompra;
use App\Models\Compra;
use App\Models\Proveedore;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view.purchases')->only('index', 'show');
        $this->middleware('can:create.purchases')->only('create', 'store');
        $this->middleware('can:edit.purchases')->only('edit', 'update');
        $this->middleware('can:delete.purchases')->only('destroy');
    }

    public function index()
    {
        $compras = Compra::with('proveedor')->paginate(10);
        return view('compra.index', compact('compras'))
            ->with('i', (request()->input('page', 1) - 1) * $compras->perPage());
    }

    public function create()
    {
        $compra = new Compra();
        $proveedores = Proveedore::all();
        return view('compra.create', compact('compra', 'proveedores'));
    }

    public function store(StoreCompra $request)
    {
        $validatedData = $request->validated();
        $validatedData['numero_factura'] = $request->input('numero_factura');

        Compra::create($validatedData);

        return redirect()->route('compras.index')
            ->with('success', 'Compra creada exitosamente.');
    }

    public function show(Compra $compra)
    {
        return view('compra.show', compact('compra'));
    }

    public function edit($id)
    {
        $compra = Compra::find($id);
        $proveedores = Proveedore::all();
        return view('compra.edit', compact('compra', 'proveedores'));
    }

    public function update(StoreCompra $request, Compra $compra)
    {
        $validatedData = $request->validated();
        $compra->update($validatedData);

        return redirect()->route('compras.index')
            ->with('success', 'Compra actualizada exitosamente.');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')
            ->with('success', 'Compra eliminada exitosamente.');
    }
}
