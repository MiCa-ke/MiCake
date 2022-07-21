@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-4/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 p-6 bg-white rounded-lg shadow-xl">
            <form action="{{ route('pedido.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Fecha Entrega
                    </label>
                    <input id="fecha_entrega" name="fecha_entrega" type="date" placeholder="Nombre"
                        class="border p-3 w-full rounded-lg date" value="{{ old('fecha_entrega') }}" />
                </div>

                

                <input type="submit" value="Crear"
                    class="bg-sky-600 hover:bg-sky-700 
                    transition-colors cursor-pointer uppercase 
                    font-bold w-full p-3 text-white rounded-lg" />
            </form>

        </div>
    </div>
@endsection