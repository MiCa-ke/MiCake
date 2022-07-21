@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')

    <h2 class = "text-center">Pedido Nº {{$pedido->id}}</h2>
    {{-- <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-danger">Volver</a> --}}
    <a href="{{route('pedido.index')}}" class="btn btn-danger">Volver</a>
    <br>
    <br>
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Detalle Pedido</h3>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Fecha Pedido</th>
                                <th>Fecha Entrega</th>
                                <th>Estado Pago</th>
                                <th>Estado</th>
                                <th>Total</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$pedido->fecha_pedido}}</td>
                                <td>{{$pedido->fecha_entrega}}</td>
                                <td>{{($pedido->estado_pago==0)?'IMPAGA':'CANCELADO'}}</td>
                                <td>{{($pedido->estado==0)?'EN PROCESO':'FINALIZADO'}}</td>
                                <td>{{$pedido->total}}</td>
                                <td>{{$pedido->usuario->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Productos</h3>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($DetallePedido)
                                @foreach ($DetallePedido as $detalle)
                                    <tr>
                                        <td>{{$detalle->producto->descripcion}}</td>
                                        <td>{{$detalle->cantidad}}</td>
                                        <td>{{$detalle->importe}}</td>
                                        <td>
                                            <form action="{{route('DetallePedido.delete', $detalle->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach 
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Añadir Productos</h3>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th class = "text-center">Añadir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{$producto->descripcion}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td>
                                        <form action="{{route('DetallePedido.store')}}" method="post">
                                            @csrf
                                            <input type="text" name="pedidos_id" value="{{$pedido->id}}" hidden>
                                            <input type="text" name="productos_id" value="{{$producto->id}}" hidden>
                                            <input type="text" name="precio" value="{{$producto->precio}}" hidden>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="cantidad" placeholder="Cantidad" class="form-control" >
                                                        <label for="">Cantidad</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-success">Añadir</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection