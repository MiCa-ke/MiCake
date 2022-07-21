<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetalleCompra;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Bitacora;

class ReporteController extends Controller
{

    public function reporteCompras(){
        $detalles = DetalleCompra::all();
        $detalles->load('notacompra','ingredientes');
        // dd($detalles);
        $auth = auth()->user()->name;
        $pdf = Pdf::loadView('Reportes.Compras',compact('detalles','auth'));
        return $pdf->download('invoice.pdf');
    }

    public function reportePedido(){
        $pedidos = Pedido::all();
        $detalles = DetallePedido::all();
        $detalles->load('pedido','producto');
        // dd($detalles);
        $auth = auth()->user()->name;
        $pdf = Pdf::loadView('Reportes.Pedido',compact('detalles','auth','pedidos'));
        return $pdf->stream('invoice.pdf');
    }

    public function bitacora() {
        $bitacoras = Bitacora::all();
        $bitacoras->load('usuario');
        return view('Reportes.bitacora',compact('bitacoras'));
    }
}
