<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaccion;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view.transactions')->only('index','show');
        $this->middleware('can:create.transactions')->only('create','store');
        $this->middleware('can:edit.transactions')->only('edit','update');
        $this->middleware('can:delete.transactions')->only('destroy');
    }

    public function index()
    {
        $transaccions = Transaccion::with('productos', 'cliente')->paginate(10);

        return view('transaccion.index', compact('transaccions'))
            ->with('i', (request()->input('page', 1) - 1) * $transaccions->perPage());
    }

    public function create()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        $transaccion = new Transaccion();

        return view('transaccion.create', compact('transaccion', 'productos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaccion_id' => 'required',
            'fecha_transaccion' => 'required|date',
            'total_transaccion' => 'required|numeric',
            'metodo_pago' => 'required',
            'tipo_transaccion' => 'required',
            'cliente_id' => 'required|exists:clientes,cliente_id',
            'producto_id.*' => 'required|exists:productos,producto_id',
            'cantidad.*' => 'required|numeric|min:1',
            'precio_unitario.*' => 'required|numeric|min:0',
        ]);

        $transaccion = Transaccion::create($request->only([
            'transaccion_id',
            'fecha_transaccion',
            'total_transaccion',
            'metodo_pago',
            'tipo_transaccion',
            'cliente_id',
        ]));

        $productos = [];
        foreach ($request->producto_id as $key => $producto_id) {
            $productos[$producto_id] = [
                'cantidad' => $request->cantidad[$key],
                'precio_unitario' => $request->precio_unitario[$key],
            ];
        }

        $transaccion->productos()->attach($productos);

        return redirect()->route('transaccions.index')->with('success', 'Transacción y productos almacenados con éxito.');
    }

    public function show($id)
    {
        $transaccion = Transaccion::with('productos', 'cliente')->findOrFail($id);

        return view('transaccion.show', compact('transaccion'));
    }

    public function edit($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        $productos = Producto::all();
        $clientes = Cliente::all();

        return view('transaccion.edit', compact('transaccion', 'productos', 'clientes'));
    }

    public function update(Request $request, Transaccion $transaccion)
    {
        $request->validate([
            'fecha_transaccion' => 'required|date',
            'total_transaccion' => 'required|numeric',
            'metodo_pago' => 'required',
            'tipo_transaccion' => 'required',
            'cliente_id' => 'required|exists:clientes,cliente_id',
            'producto_id.*' => 'required|exists:productos,producto_id',
            'cantidad.*' => 'required|numeric|min:1',
            'precio_unitario.*' => 'required|numeric|min:0',
        ]);

        $transaccion->update($request->only([
            'fecha_transaccion',
            'total_transaccion',
            'metodo_pago',
            'tipo_transaccion',
            'cliente_id',
        ]));

        $productos = [];
        foreach ($request->producto_id as $key => $producto_id) {
            $productos[$producto_id] = [
                'cantidad' => $request->cantidad[$key],
                'precio_unitario' => $request->precio_unitario[$key],
            ];
        }

        $transaccion->productos()->sync($productos);

        return redirect()->route('transaccions.index')->with('success', 'Transacción actualizada con éxito.');
    }

    public function destroy($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        $transaccion->productos()->detach();
        $transaccion->delete();

        return redirect()->route('transaccions.index')->with('success', 'Transacción eliminada exitosamente.');
    }
}
