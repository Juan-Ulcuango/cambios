<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaccion;
use App\Models\Producto;
use App\Models\Transaccion;
use Illuminate\Http\Request;

/**
 * Class TransaccionController
 * @package App\Http\Controllers
 */
class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:view.transactions')->only('index','show');
        $this->middleware('can:create.transactions')->only('create','store');
        $this->middleware('can:edit.transactions')->only('edit','update');
        $this->middleware('can:delete.transactions')->only('destroy');
    }
    public function index()
{
    $transaccions = Transaccion::with('productos')->paginate(10);

    return view('transaccion.index', compact('transaccions'))
        ->with('i', (request()->input('page', 1) - 1) * $transaccions->perPage());
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all(); 
        $transaccion = new Transaccion();
        
        return view('transaccion.create', compact('transaccion', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaccion $request)
{
    // Validar los datos de la solicitud
    $validatedData = $request->validated();

    // Crear una nueva transacción
    $transaccion = new Transaccion();
    $transaccion->fecha_transaccion = $request->fecha_transaccion;
    $transaccion->total_transaccion = $request->total_transaccion;
    $transaccion->metodo_pago = $request->metodo_pago;
    $transaccion->tipo_transaccion = $request->tipo_transaccion;
    $transaccion->save();

    // Obtener productos y cantidades de la solicitud
    $productos = $request->input('products', []);
    $cantidades = $request->input('quantities', []);
    
    // Guardar productos relacionados en la tabla pivote
    for ($i = 0; $i < count($productos); $i++) {
        if ($productos[$i] != '') {
            $transaccion->productos()->attach($productos[$i], ['cantidad' => $cantidades[$i]]);
        }
    }

    // Redirigir con un mensaje de éxito
    return redirect()->route('transaccions.index')->with('success', 'Transaccion created successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaccion = Transaccion::find($id);

        return view('transaccion.show', compact('transaccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaccion = Transaccion::find($id);

        return view('transaccion.edit', compact('transaccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Transaccion $transaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaccion $transaccion)
    {
        // request()->validate(Transaccion::$rules);
        // $transaccion->update($request->all());

        $transaccion->fecha_transaccion = $request->fecha_transaccion;
        $transaccion->total_transaccion  = $request->total_transaccion;
        $transaccion->metodo_pago = $request->metodo_pago;
        $transaccion->tipo_transaccion  = $request->tipo_transaccion;
        $transaccion->save();

        return redirect()->route('transaccions.index')
            ->with('success', 'Transaccion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transaccion = Transaccion::find($id)->delete();

        return redirect()->route('transaccions.index')
            ->with('success', 'Transaccion deleted successfully');
    }
}


