<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Bitacora;
use Carbon\Carbon;
use App\Models\IngredienteReceta;
use App\Models\Ingrediente;
use App\Models\Producto;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle = new DetallePedido($request->all());
        $detalle->importe = $request->cantidad * $request->precio;

        $producto = Producto::where('id',$detalle->productos_id)->first();
        // dd($producto);
        $ingredientes = IngredienteReceta::where('receta_id',$producto->receta_id)->get();
        // dd($ingredientes);
        foreach ($ingredientes as $ingrediente) {
            $ingredienteUpdate = Ingrediente::where('id',$ingrediente->ingrediente_id)->first();
            // dd($ingrediente);
            $cant = $ingrediente->cantidad * $detalle->cantidad;
            // dd($cant);
            if ($ingredienteUpdate->stock < $cant) {
                return view('producto.NoIngrediente');
            }
            $ingredienteUpdate->stock = $ingredienteUpdate->stock - $ingrediente->cantidad;
            $ingredienteUpdate->update();
        }

        $detalle->save();

        $total = DetallePedido::where('pedidos_id',$request->pedidos_id)->sum('importe');

        $pedido = Pedido::findOrFail($request->pedidos_id);
        $pedido->total = $total;
        $pedido->update();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo los datos del pedido';
        $bitacora->Tipo = 'update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function show(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function edit(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $detalle = DetallePedido::findOrFail($id);
        $detalle->delete();
        $total = DetallePedido::where('pedidos_id',$detalle->pedidos_id)->sum('importe');

        $pedido = Pedido::findOrFail($detalle->pedidos_id);
        $pedido->total = $total;
        $pedido->update();

        $bitacora = new Bitacora();
        $bitacora->Descripcion = 'Se Actualizo los datos del pedido';
        $bitacora->Tipo = 'update';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();

        return back();
    }
}
