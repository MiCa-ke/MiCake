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
            <form action="{{ route('receta.update', $receta->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <input id="descripcion" name="descripcion" type="text" placeholder="Descripcion"
                        class="border p-3 w-full rounded-lg date" value="{{ $receta->descripcion }}" />
                </div>

                

                <input type="submit" value="Actualizar"
                    class="bg-sky-600 hover:bg-sky-700 
                    transition-colors cursor-pointer uppercase 
                    font-bold w-full p-3 text-white rounded-lg" />
            </form>

        </div>
    </div>
@endsection