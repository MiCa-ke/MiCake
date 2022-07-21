<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('mensaje', 'Datos incorrectos');
        }

        $user = User::find(auth()->user()->id);

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.index');
        } else if ($user->hasRole('cliente')) {
            return redirect()->route('cliente.index');
        } else {
            return redirect()->route('empleado.index');
        }
    }
}
