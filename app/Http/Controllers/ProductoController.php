<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use Carbon\Carbon;
use App\Models\Receta;
use App\Models\IngredienteReceta;
use App\Models\Ingrediente;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index',['productos'=>$productos]);
    }

    public function create()
    {   

        $recetas = Receta::all();
        return view('producto.create', compact('recetas'));
    }

    public function store(Request $request)
    {
        $producto = new Producto($request->all());

        $producto->save();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Registro un nuevo Producto';
        $bitacora->Tipo = 'Registro';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('producto.index');
    }

    public function show($id)
    {
        return $id;
    }

    public function edit( $id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.update', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->imgURL = $request->imgURL;
        $producto->receta_id = $request->receta_id;
        $producto->update();

        return redirect()->route('producto.index');

    }

    public function destroy( $id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
