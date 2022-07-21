<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use Carbon\Carbon;


class IngredienteController extends Controller
{
    public function index()
    {
        $ingredientes = Ingrediente::all();
        return view('ingrediente.index', ['ingredientes' => $ingredientes]);
    }

    public function create()
    {
        $medidas = Medida::all();
        return view('ingrediente.create', ['medidas' => $medidas]);
    }

    public function store(Request $request)
    {

        Ingrediente::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'medida_id' => $request->medida
        ]);

        $ingredientes = Ingrediente::all();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Registro un nuevo Ingrediente';
        $bitacora->Tipo = 'Registro';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();


        return view('ingrediente.index', ['ingredientes' => $ingredientes]);
    }

    public function show( $id)
    {
        //
    }

    public function edit($id)
    {
        $ingrediente = Ingrediente::find($id);
        $medidas = Medida::all();
        return view('ingrediente.update', ['ingrediente' => $ingrediente, 'medidas' => $medidas]);
    }

    public function update(Request $request, Ingrediente $medida)
    {
        //
    }

    public function destroy(Ingrediente $medida)
    {
        //
    }



    // INGREDIENTE RECETA


}
