@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')
    <h2 class = "text-center">Lista de Compras</h2>
    <br>
    <div class="card">
        <div class="card-body">
            
                <form action="{{route('compra.store')}}" method="post">
                    @csrf
                    <div class="d-grid gap-2 col-6 mx-auto m-2">
                        <button type="submit" class="btn btn-success btn-lg">Añadir Compra</button>
                    </div>
                </form>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $nota)
                        <tr>
                            <td>{{$nota->id}}</td>
                            <td>{{$nota->fecha}}</td>
                            <td>{{$nota->total}}</td>
                            <td>{{$nota->usuario->name}}</td>
                            <td>
                                <a href="{{route('compra.show',$nota->id)}}" class="btn btn-primary">Ver</a>
                                <form style="display: inline" action="{{route('compra.show',$nota->id)}}" method="post">
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