@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')

    <h2 class = "text-center">Baja Nº {{$notaBaja->id}}</h2>
    {{-- <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-danger">Volver</a> --}}
    <a href="{{route('notabaja.index')}}" class="btn btn-danger">Volver</a>
    <br>
    <br>
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Detalle Baja</h3>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$notaBaja->fecha}}</td>
                                <td>{{$notaBaja->usuario->name}}</td>
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
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($DetalleBaja)
                                @foreach ($DetalleBaja as $ingrediente)
                                    <tr>
                                        <td>{{$ingrediente->ingredientes->name}}</td>
                                        <td>{{$ingrediente->cantidad}}</td>
                                        <td>
                                            <form action="{{route('DetalleBaja.delete', $ingrediente->id)}}" method="post">
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
                                        <form action="{{route('DetalleBaja.store')}}" method="post">
                                            @csrf
                                            <input type="text" name="nota_bajas_id" value="{{$notaBaja->id}}" hidden>
                                            <input type="text" name="ingredientes_id" value="{{$ingrediente->id}}" hidden>
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