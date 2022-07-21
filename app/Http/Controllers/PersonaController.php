<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ci' => 'required'
        ]);

        DB::table('personas')
            ->updateOrInsert(
                ['user_id' => auth()->user()->id],
                [
                    'ci' => $request->ci,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'user_id' => auth()->user()->id
                ]
            );

        return redirect()->route('login');
    }
}
