@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')
    <h2 class = "text-center">Lista de Recetas</h2>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="d-grid gap-2 col-6 mx-auto m-2">
                <a href="{{route('receta.create')}}" class="btn btn-success btn-lg">Crear Receta</a>
            </div>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recetas as $receta)
                        <tr>
                            <td>{{$receta->id}}</td>
                            <td>{{$receta->descripcion}}</td>
                            <td>
                                <a href="{{route('receta.show',$receta->id)}}" class="btn btn-primary">Ver</a>
                                <a href="{{route('receta.edit',$receta->id)}}" class="btn btn-success">Editar</a>
                                <form style="display: inline" action="{{route('receta.destroy',$receta->id)}}" method="post">
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