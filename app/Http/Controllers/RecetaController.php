<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\IngredienteReceta;
use App\Models\Ingrediente;

class RecetaController extends Controller
{
    public function index()
    {
        $recetas = Receta::all();
        return view('receta.index', ['recetas' => $recetas]);
    }

    public function create()
    {
        return view('receta.create');
    }

    public function store(Request $request)
    {
        $receta = new Receta($request->all());
        $receta->save();
        // return redirect()->route('receta.show',$receta->id);
        return redirect()->route('receta.index');
    }

    public function show($id)
    {
        $IngrediteReceta = IngredienteReceta::where('receta_id', $id)->get();
        $IngrediteReceta->load('ingredientes');
        $receta = Receta::findOrFail($id);

        $ingredientesExistentes = IngredienteReceta::where('receta_id',$id)->pluck('ingrediente_id');
        
        $ingredientes = Ingrediente::WhereNotIn('id',$ingredientesExistentes)->get();
        $ingredientes->load('medida');
        
        return view('receta.show', compact('receta','ingredientes','IngrediteReceta'));
    }

    public function edit( $id)
    {
        $receta = Receta::findOrFail($id);
        return view('receta.edit', compact('receta'));
    }

    public function update(Request $request, $id)
    {
        $receta = Receta::findOrFail($id);
        $receta->descripcion = $request->descripcion;
        $receta->update();
        return redirect()->route('receta.index');
    }

    public function destroy(Receta $medida)
    {
        //
    }




    //INGREDIENTE RECETA
    public function storeIngredienteReceta(Request $request)
    {
        $detalle = new IngredienteReceta($request->all());
        $detalle->save();

        // $ingrediente = Ingrediente::findOrFail($detalle->ingrediente_id);

        // $ingrediente->stock = $ingrediente->stock - $detalle->cantidad;

        // $ingrediente->update();

        // $bitacora = new Bitacora();
        // $bitacora->Descripcion = 'Se Actualizo los datos de la Nota Baja';
        // $bitacora->Tipo = 'update';
        // $bitacora->fecha = Carbon::now()->format('Y-m-d');
        // $bitacora->user_id = auth()->user()->id;
        // $bitacora->save();

        return redirect()->route('receta.show',$detalle->receta_id);
    }


    public function destroyIngredienteReceta( $id)
    {
        $detalle = IngredienteReceta::findOrFail($id);
        // $ingrediente = Ingrediente::findOrFail($detalle->ingrediente_id);
        $detalle->delete();

        // $ingrediente->stock = $ingrediente->stock + $detalle->cantidad;

        // $ingrediente->update();
        
        // $bitacora = new Bitacora();
        // $bitacora->Descripcion = 'Se Actualizo los datos de la Nota Baja';
        // $bitacora->Tipo = 'update';
        // $bitacora->fecha = Carbon::now()->format('Y-m-d');
        // $bitacora->user_id = auth()->user()->id;
        // $bitacora->save();


        return redirect()->route('receta.show',$detalle->receta_id);
    }
}
