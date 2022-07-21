@extends('layouts.app');

@section('titulo')
    Catálogo
@endsection

@section('contenido')
<div class="row">
  @foreach ($productos as $producto)
      <div class="col col-lg-3">
          <div class="card" style="width: 18rem;">
              <img src="{{ $producto->imgURL }}" class="card-img-top" alt="Torta meme">
              <div class="card-body">
              <h5 class="card-title">{{$producto->descripcion}}</h5>
              <p class="card-text"><b>Precio: </b>{{$producto->precio}}</p>
              <a href="#" class="btn btn-primary">Comprar</a>
              </div>
          </div> 
      </div>
  @endforeach
</div>
@endsection