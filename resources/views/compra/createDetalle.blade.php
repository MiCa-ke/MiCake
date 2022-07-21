@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')

    <h2 class = "text-center">Detalle de la Compra Nº {{$id}}</h2>
    {{-- <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-danger">Volver</a> --}}
    <a href="{{route('compra.show',$id)}}" class="btn btn-danger">Volver</a>
    <br>
    <br>
    <div class="row">
        <div class="col col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class = "text-center text-weight">Ingredientes</h3>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Medida</th>
                                <th>Precio</th>
                                <th class = "text-center">Añadir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingredientes as $ingrediente)
                                <tr>
                                    <td>{{$ingrediente->name}}</td>
                                    <td>{{$ingrediente->stock}}</td>
                                    <td>{{$ingrediente->medida->name}}</td>
                                    <td>{{$ingrediente->precio}}</td>
                                    <td>
                                        <form action="{{route('compraDetalle.store')}}" method="post">
                                            @csrf
                                            <input type="text" name="nota_compras_id" value="{{$id}}" hidden>
                                            <input type="text" name="ingredientes_id" value="{{$ingrediente->id}}" hidden>
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-floating">
                                                        <input type="text" name="cantidad" placeholder="Cantidad" class="form-control" >
                                                        <label for="">Cantidad</label>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-floating">
                                                        <textarea name="descripcion" id="" rows="3" class="form-control" placeholder="Descripcion"></textarea>
                                                        <label for="">Descripcion</label>
                                                    </div>
                                                </div>
                                                <div class="col-2">
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