@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')
    <div class="container" style="margin-top:20%">
        <h1 class="text-center">No hay Suficiente Ingredientes</h1>
        
        <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-danger">Volver</a>
    </div>
@endsection
