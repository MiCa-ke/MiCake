<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Bitacora;
use Carbon\Carbon;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('empleado.index');
    }

    public function create()
    {
        return view('empleado.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:50',
                'email' => 'required|unique:users|email',
                'password' => 'required|confirmed|min:4',
                'ci' => 'required|unique:personas'
            ]
        );

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        )->assignRole('empleado');

        $persona = Persona::create(
            [
                'ci' => $request->ci,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'user_id' => $user->id
            ]
        );

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Registro un nuevo empleado';
        $bitacora->Tipo = 'Registro';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('empleado.update');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
