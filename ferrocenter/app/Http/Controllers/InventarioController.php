<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

/**
 * Class InventarioController
 * @package App\Http\Controllers
 */
class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:inventory')->only('index','show');
        $this->middleware('can:manage.inventory')->only('create','store');
        $this->middleware('can:manage.inventory')->only('edit','update');
        $this->middleware('can:manage.inventory')->only('destroy');
    }
    public function index()
    {
        $inventarios = Inventario::with('producto')->paginate(10);

        return view('inventario.index', compact('inventarios'))
            ->with('i', (request()->input('page', 1) - 1) * $inventarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventario = new Inventario();
        $productos = Producto::all();
        return view('inventario.create', compact('inventario', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'stock' => 'required|integer',
            'fecha_movimiento' => 'required|date',
            'tipo_movimiento' => 'required|string|max:30',
            'producto_id' => 'required|exists:productos,producto_id',
        ]);

        Inventario::create($request->all());

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventario = Inventario::with('producto')->find($id);

        return view('inventario.show', compact('inventario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario = Inventario::find($id);
        $productos = Producto::all();

        return view('inventario.edit', compact('inventario', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inventario $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'stock' => 'required|integer',
            'fecha_movimiento' => 'required|date',
            'tipo_movimiento' => 'required|string|max:30',
            'producto_id' => 'required|exists:productos,producto_id',
        ]);

        $inventario->update($request->all());

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inventario::find($id)->delete();

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario eliminado exitosamente.');
    }
}
