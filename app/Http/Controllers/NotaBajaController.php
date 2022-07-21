<?php

namespace App\Http\Controllers;

use App\Models\NotaBaja;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DetalleBaja;
use App\Models\Ingrediente;
use App\Models\Bitacora;

class NotaBajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notabajas = NotaBaja::all();
        $notabajas->load('usuario');

        return view('notabaja.index', compact('notabajas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notabaja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notaBaja = new NotaBaja();
        $notaBaja->fecha = Carbon::now()->format('Y-m-d');
        $notaBaja->total = 0;
        $notaBaja->user_id = auth()->user()->id;
        $notaBaja->save();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Registro una nueva Baja';
        $bitacora->Tipo = 'Registro';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('notabaja.show',$notaBaja->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaBaja  $notaBaja
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $DetalleBaja = DetalleBaja::where('nota_bajas_id', $id)->get();
        $DetalleBaja->load('ingredientes');

        $notaBaja = NotaBaja::findOrFail($id);
        $notaBaja->load('usuario');

        $ingredientesExistentes = DetalleBaja::where('nota_bajas_id',$id)->pluck('ingredientes_id');
        
        $ingredientes = Ingrediente::WhereNotIn('id',$ingredientesExistentes)->get();
        $ingredientes->load('medida');
        
        return view('notabaja.show', compact('notaBaja','ingredientes','DetalleBaja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaBaja  $notaBaja
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaBaja $notaBaja)
    {
        $notaBaja = DetalleBaja::where('nota_bajas_id', $id)->get();
        $notaBaja->load('ingredientes','notabaja');

        return view('notabaja.edit', compact('notaBaja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotaBaja  $notaBaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $notaBaja = NotaBaja::findOrFail($id);
        // $notaBaja->fecha = Carbon::now()->format('Y-m-d');


        // return view('notabaja.show', compact('notaBaja'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaBaja  $notaBaja
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaBaja $notaBaja)
    {
        //
    }
}
