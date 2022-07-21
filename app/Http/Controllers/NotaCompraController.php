<?php

namespace App\Http\Controllers;

use App\Models\NotaCompra;
use Illuminate\Http\Request;
use App\Models\DetalleCompra;
use App\Models\Ingrediente;
use Carbon\Carbon;
use App\Models\Bitacora;

class NotaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = NotaCompra::all();
        $compras->load('usuario');
        return view('compra.index', compact('compras'));
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
        $compra = new NotaCompra();
        $compra->fecha = Carbon::now()->format('Y-m-d');
        $compra->total = 0;
        $compra->user_id = auth()->user()->id;
        $compra->save();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Registro una nueva Compra';
        $bitacora->Tipo = 'Registro';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();


        return redirect()->route('compra.show',$compra->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $DetalleCompra = DetalleCompra::where('nota_compras_id', $id)->get();
        $DetalleCompra->load('ingredientes');
        $notaCompra = NotaCompra::findOrFail($id);
        $notaCompra->load('usuario');

        return view('compra.show', compact('notaCompra', 'DetalleCompra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaCompra $notaCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotaCompra $notaCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaCompra $notaCompra)
    {
        //
    }
}
