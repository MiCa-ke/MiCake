<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DetallePedido;
use App\Models\Producto;
use App\Models\Bitacora;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();

        return view('pedido.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->estado = 0;
        $pedido->estado_pago = 0;
        $pedido->fecha_pedido = Carbon::now()->format('Y-m-d');
        $pedido->fecha_entrega = $request->fecha_entrega;
        $pedido->total = 0;
        $pedido->user_id = auth()->user()->id;
        $pedido->save();
        
        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Registro un nuevo Pedido';
        $bitacora->Tipo = 'Registro';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('pedido.show',$pedido->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $DetallePedido = DetallePedido::where('pedidos_id', $id)->get();
        $DetallePedido->load('producto');
        // dd($DetallePedido);
        $pedido = Pedido::findOrFail($id);
        $pedido->load('usuario');
        $productos = Producto::all();
        return view('pedido.show', compact('pedido','productos','DetallePedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->fecha_entrega = $request->fecha_entrega;
        $pedido->estado = $request->estado;
        $pedido->estado_pago = $request->estado_pago;
        $pedido->update();
        
        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo la fecha de entrega del pedido';
        $bitacora->Tipo = 'Update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return redirect()->route('pedido.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->load('detallepedido');
        // dd($pedido);
        foreach ($pedido->detallepedido as $detalle) {
            $detalle->delete();
        }
        $pedido->delete();
        return back();
    }
}
