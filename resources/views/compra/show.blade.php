@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')

    <h2 class = "text-center">Compra Nº {{$notaCompra->id}}</h2>
    {{-- <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-danger">Volver</a> --}}
    <a href="{{route('compra.index')}}" class="btn btn-danger">Volver</a>
    <br>
    <br>
    <div class="row">
        <div class="col col-lg-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Detalle Baja</h3>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$notaCompra->fecha}}</td>
                                <td>{{$notaCompra->total}}</td>
                                <td>{{$notaCompra->usuario->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Ingredientes</h3>
                </div>
                <div class="card-body">
                    <a href="{{route('compraDetalle.create',$notaCompra->id)}}"class="btn btn-success">Añadir Ingredientes</a>
                    
                    <hr>
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($DetalleCompra)
                                @foreach ($DetalleCompra as $ingrediente)
                                    <tr>
                                        <td>{{$ingrediente->ingredientes->name}}</td>
                                        <td>{{$ingrediente->descripcion}}</td>
                                        <td>{{$ingrediente->cantidad}}</td>
                                        <td>{{$ingrediente->ingredientes->precio}}</td>
                                        <td>{{$ingrediente->subtotal}}</td>
                                        <td>
                                            <form action="{{route('compraDetalle.destroy', $ingrediente->id)}}" method="post">
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
    </div>
@endsection