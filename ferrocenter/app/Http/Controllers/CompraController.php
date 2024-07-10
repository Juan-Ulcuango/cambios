<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompra;
use App\Models\Compra;
use App\Models\Proveedore;
use App\Models\Producto;
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
        $productos = Producto::all();
        return view('compra.create', compact('compra', 'proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'compra_id' => 'required',
            'fecha_compra' => 'required|date',
            'numero_factura' => 'required',
            'subtotal' => 'required|numeric',
            'impuesto' => 'required|numeric',
            'total_compra' => 'required|numeric',
            'metodo_pago' => 'required',
            'estado' => 'required',
            'proveedor_id' => 'required|exists:proveedores,proveedor_id',
            'producto_id.*' => 'required|exists:productos,producto_id',
            'cantidad.*' => 'required|numeric|min:1',
            'precio_unitario.*' => 'required|numeric|min:0',
        ]);

        $compra = Compra::create($request->only([
            'compra_id',
            'fecha_compra',
            'numero_factura',
            'subtotal',
            'impuesto',
            'total_compra',
            'metodo_pago',
            'estado',
            'proveedor_id',
        ]));

        $productos = [];
        foreach ($request->producto_id as $key => $producto_id) {
            $productos[$producto_id] = [
                'cantidad' => $request->cantidad[$key],
                'precio_unitario' => $request->precio_unitario[$key],
            ];
        }

        $compra->productos()->attach($productos);

        return redirect()->route('compras.index')->with('success', 'Compra y productos almacenados con éxito.');
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
