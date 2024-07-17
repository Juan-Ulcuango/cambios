<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompra;
use App\Models\Categoria;
use App\Models\Inventario;
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
        $categorias = Categoria::all();

        // Generar un número de factura único con el formato COM-2024-001
        $ultimoNumeroFactura = Compra::max('numero_factura');

        if ($ultimoNumeroFactura) {
            // Extraer el número secuencial de la última factura
            $ultimoSecuencial = (int)substr($ultimoNumeroFactura, -3);
            $nuevoSecuencial = $ultimoSecuencial + 1;
        } else {
            $nuevoSecuencial = 1;
        }

        // Formatear el número secuencial con ceros a la izquierda
        $nuevoNumeroFactura = 'COM-' . date('Y') . '-' . str_pad($nuevoSecuencial, 3, '0', STR_PAD_LEFT);

        return view('compra.create', compact('compra', 'proveedores', 'productos', 'categorias', 'nuevoNumeroFactura'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'fecha_compra' => 'required|date',
            'numero_factura' => 'required|unique:compras,numero_factura',
            'subtotal' => 'required|numeric',
            'impuesto' => 'required|numeric',
            'total_compra' => 'required|numeric',
            'metodo_pago' => 'required',
            'estado' => 'required',
            'proveedor_id' => 'required|exists:proveedores,proveedor_id',
            'producto_id.*' => 'required|exists:productos,producto_id',
            'cantidad.*' => 'required|numeric|min:1',
            'precio_compra.*' => 'required|numeric|min:0',
        ]);

        $compra = Compra::create($request->only([
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
                'precio_compra' => $request->precio_compra[$key],
            ];

            // Actualizar inventario
            $this->updateInventory($producto_id, $request->cantidad[$key]);
        }

        $compra->productos()->attach($productos);

        return redirect()->route('compras.index')->with('success', 'Compra y productos almacenados con éxito.');
    }
    public function show(Compra $compra)
    {
        $compra->load('proveedor', 'productos');
        return view('compra.show', compact('compra'));
    }

    public function edit($id)
    {
        $compra = Compra::with('productos')->findOrFail($id);
        $proveedores = Proveedore::all();
        $productos = Producto::all();
        $categorias = Categoria::all();

        return view('compra.edit', compact('compra', 'proveedores', 'productos', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'numero_factura' => 'required|string|max:255',
            'fecha_compra' => 'required|date',
            'subtotal' => 'required|numeric',
            'impuesto' => 'required|numeric',
            'total_compra' => 'required|numeric',
            'metodo_pago' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'proveedor_id' => 'required|integer',
            'producto_id.*' => 'required|integer',
            'cantidad.*' => 'required|integer',
            'precio_compra.*' => 'required|numeric',
        ]);

        $compra = Compra::findOrFail($id);
        $compra->update($validated);
        $compra->productos()->detach();

        foreach ($request->producto_id as $key => $producto_id) {
            $compra->productos()->attach($producto_id, [
                'cantidad' => $request->cantidad[$key],
                'precio_compra' => $request->precio_compra[$key],
            ]);

            // Actualizar inventario
            $this->updateInventory($producto_id, $request->cantidad[$key]);
        }

        return redirect()->route('compras.index')->with('success', 'Compra actualizada exitosamente.');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')
            ->with('success', 'Compra eliminada exitosamente.');
    }

    private function updateInventory($producto_id, $cantidad)
    {
        $inventario = Inventario::where('producto_id', $producto_id)->first();

        if ($inventario) {
            $inventario->stock += $cantidad;
            $inventario->fecha_movimiento = now();
            $inventario->save();
        } else {
            Inventario::create([
                'producto_id' => $producto_id,
                'stock' => $cantidad,
                'fecha_ingreso' => now(),
                'fecha_movimiento' => now(),
                // 'tipo_movimiento' => 'compra',
            ]);
        }
    }
}
