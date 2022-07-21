<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use App\Models\Ingrediente;
use App\Models\NotaCompra;
use App\Models\Bitacora;
use Carbon\Carbon;

class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $id)
    {
        $ingredientesExistentes = DetalleCompra::where('nota_compras_id',$id)->pluck('ingredientes_id');
        
        $ingredientes = Ingrediente::WhereNotIn('id',$ingredientesExistentes)->get();
        
        return view('compra.createDetalle', compact('ingredientes','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingrediente = Ingrediente::findOrFail($request->ingredientes_id);
        $detalle = new DetalleCompra($request->all());
        $detalle->subtotal = $detalle->cantidad * $ingrediente->precio;
        $detalle->save();

        $ingrediente->stock = $ingrediente->stock + $detalle->cantidad;
        $ingrediente->update();

        $total = DetalleCompra::where('nota_compras_id',$detalle->nota_compras_id)->sum('subtotal');
        $pedido = NotaCompra::findOrFail($request->nota_compras_id);
        $pedido->total = $total;
        $pedido->update();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo los datos de la Compra';
        $bitacora->Tipo = 'update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('compraDetalle.create',$detalle->nota_compras_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $detalle = DetalleCompra::findOrFail($id);
        $ingrediente = Ingrediente::findOrFail($detalle->ingredientes_id);
        $detalle->delete();

        $ingrediente->stock = $ingrediente->stock - $detalle->cantidad;

        $ingrediente->update();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo los datos de la Compra';
        $bitacora->Tipo = 'update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return back();
    }
}
