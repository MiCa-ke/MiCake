@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')
    <h2 class = "text-center">Lista de Pedidos</h2>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="d-grid gap-2 col-6 mx-auto m-2">
                <a href="{{route('pedido.create')}}" class="btn btn-success btn-lg">Crear Pedido</a>
            </div>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Estado</th>
                        <th>Estado Pago</th>
                        <th>Fecha Pedido</th>
                        <th>Fecha Entrega</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->id}}</td>
                            <td>{{($pedido->estado==0)?'EN PROCESO':'FINALIZADO'}}</td>
                            <td>{{($pedido->estado_pago==0)?'IMPAGA':'CANCELADO'}}</td>
                            <td>{{$pedido->fecha_pedido}}</td>
                            <td>{{$pedido->fecha_entrega}}</td>
                            <td>{{$pedido->total}}</td>
                            <td>
                                <a href="{{route('pedido.show',$pedido->id)}}" class="btn btn-primary">Ver</a>
                                <a href="{{route('pedido.edit',$pedido->id)}}" class="btn btn-success">Editar</a>
                                <form style="display: inline" action="{{route('pedido.destroy',$pedido->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection