<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Bitacora;
use Carbon\Carbon;
use App\Models\Producto;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productos = Producto::all();
        return view('admin.index', compact('productos'));
    }



    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' => 'required|max:50',
                'email' => 'required|unique:users|email',
                'password' => 'required|confirmed|min:4'
            ]
        );

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        )->assignRole('admin');
        
        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Registro un nuevo admin';
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
        return view('admin.update');
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:50',
                'email' => ($request->email != auth()->user()->email) ? 'required|unique:users|email' : 'required|email'
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

        auth()->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        );

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo los datos del admin';
        $bitacora->Tipo = 'update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
    }
}
