@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')

    <h2 class = "text-center">Receta Nº {{$receta->id}}</h2>
    {{-- <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-danger">Volver</a> --}}
    <a href="{{route('receta.index')}}" class="btn btn-danger">Volver</a>
    <br>
    <br>
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Descripcion Receta</h3>
                </div>
                <div class="card-body">
                    <p>{{$receta->descripcion}}</p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Ingredientes</h3>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($IngrediteReceta)
                                @foreach ($IngrediteReceta as $ingrediente)
                                    @isset($ingrediente->ingredientes)
                                        <tr>
                                            <td>{{$ingrediente->ingredientes->name}}</td>
                                            <td>{{$ingrediente->cantidad}}</td>
                                            <td>
                                                <form action="{{route('receta.destroyIngredienteReceta', $ingrediente->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endisset
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
                    <h3 class = "text-center text-weight">Añadir Ingredientes a Baja</h3>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Medida</th>
                                <th class = "text-center">Añadir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingredientes as $ingrediente)
                                <tr>
                                    <td>{{$ingrediente->name}}</td>
                                    <td>{{$ingrediente->stock}}</td>
                                    <td>{{$ingrediente->medida->name}}</td>
                                    <td>
                                        <form action="{{route('receta.storeIngredienteReceta')}}" method="post">
                                            @csrf
                                            <input type="text" name="receta_id" value="{{$receta->id}}" hidden>
                                            <input type="text" name="ingrediente_id" value="{{$ingrediente->id}}" hidden>
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