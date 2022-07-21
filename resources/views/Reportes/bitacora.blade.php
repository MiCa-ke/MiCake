@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')
    <h2 class = "text-center">Bitacora</h2>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bitacoras as $bitacora)
                        <tr>
                            <td>{{$bitacora->id}}</td>
                            <td>{{$bitacora->Descripcion}}</td>
                            <td>{{$bitacora->Tipo}}</td>
                            <td>{{$bitacora->fecha}}</td>
                            <td>{{$bitacora->usuario->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection