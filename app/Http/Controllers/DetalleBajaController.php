<?php

namespace App\Http\Controllers;

use App\Models\DetalleBaja;
use Illuminate\Http\Request;
use App\Models\Ingrediente;
use App\Models\Bitacora;
use Carbon\Carbon;

class DetalleBajaController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle = new DetalleBaja($request->all());
        $detalle->save();

        $ingrediente = Ingrediente::findOrFail($detalle->ingredientes_id);

        $ingrediente->stock = $ingrediente->stock - $detalle->cantidad;

        $ingrediente->update();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo los datos de la Nota Baja';
        $bitacora->Tipo = 'update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('notabaja.show',$detalle->nota_bajas_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleBaja  $detalleBaja
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleBaja $detalleBaja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleBaja  $detalleBaja
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleBaja $detalleBaja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleBaja  $detalleBaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleBaja $detalleBaja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleBaja  $detalleBaja
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $detalle = DetalleBaja::findOrFail($id);
        $ingrediente = Ingrediente::findOrFail($detalle->ingredientes_id);
        $detalle->delete();

        $ingrediente->stock = $ingrediente->stock + $detalle->cantidad;

        $ingrediente->update();
        
        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo los datos de la Nota Baja';
        $bitacora->Tipo = 'update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();


        return redirect()->route('notabaja.show',$detalle->nota_bajas_id);
    }
}
