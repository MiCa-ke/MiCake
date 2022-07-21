<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('categoria.index');
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {
        

        $categoria = Categoria::create(
            [
                'categoria' => $request->categoria
            ]
        );

        
        return redirect()->route('categoria.index');
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('categoria.update');
    }

    public function update(Request $request)
    {

        DB::table('categorias')
            ->where('id', auth()->user()->id)
            ->update(
                [
                    'descripcion' => $request->categoria
                ]
            );
        return redirect()->route('categoria.index');
    }

    public function destroy($id)
    {
    }
}
