<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $admins = User::role('admin')->get();
        $clientes = User::role('cliente')->get();
        $empleados = User::role('empleado')->get();

        return view(
            'usuario.index',
            [
                'administradores' => $admins,
                'clientes' => $clientes,
                'empleados' => $empleados
            ]
        );
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //

    }

    public function edit($id)
    {
        //
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
