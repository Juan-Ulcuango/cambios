<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaccion;
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
    public function index()
    {
        $transaccions = Transaccion::paginate(10);

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
        $transaccion = new Transaccion();
        return view('transaccion.create', compact('transaccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaccion $request)
    {
        // request()->validate(Transaccion::$rules);
        // $transaccion = Transaccion::create($request->all());

        $transaccion = new Transaccion();
        $transaccion->fecha_transaccion = $request->fecha_transaccion;
        $transaccion->total_transaccion  = $request->total_transaccion;
        $transaccion->metodo_pago = $request->metodo_pago;
        $transaccion->tipo_transaccion  = $request->tipo_transaccion;
        $transaccion->save();
        return redirect()->route('transaccions.index')
            ->with('success', 'Transaccion created successfully.');
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
        request()->validate(Transaccion::$rules);

        $transaccion->update($request->all());

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
