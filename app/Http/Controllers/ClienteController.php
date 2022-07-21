<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Bitacora;
use Carbon\Carbon;
use App\Models\Producto;

class ClienteController extends Controller
{   
    public function index()
    {
        $productos = Producto::all();
        return view('cliente.index', compact('productos'));
    }

    public function create()
    {
        return view('cliente.create');
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
        )->assignRole('cliente');

        $persona = Persona::create(
            [
                'ci' => $request->ci,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'user_id' => $user->id
            ]
        );


        auth()->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        );
        
        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Registro un nuevo cliente';
        $bitacora->Tipo = 'Registro';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('cliente.index');
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('cliente.update');
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:50',
                'email' => ($request->email != auth()->user()->email) ? 'required|unique:users|email' : 'required|email',
                'ci' => ($request->ci != auth()->user()->persona->ci) ? 'required|unique:personas' : 'required'
            ]
        );

        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(
                [
                    'name' => $request->name,
                    'email' => $request->email
                ]
            );

        DB::table('personas')
            ->where('user_id', auth()->user()->id)
            ->update(
                [
                    'ci' => $request->ci,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono
                ]
            );
            
        auth()->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        );

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo los datos del Cliente';
        $bitacora->Tipo = 'update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('cliente.index');
    }

    public function destroy($id)
    {
        //
    }
}
