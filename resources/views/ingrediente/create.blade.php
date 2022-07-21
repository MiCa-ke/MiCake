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
            <form action="{{ route('ingrediente.create') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input id="name" name="name" type="text" placeholder="Nombre"
                        class="border p-3 w-full rounded-lg value="{{ old('name') }}" />
                </div>

                <div class="mb-5">
                    <label for="stock" class="mb-2 block uppercase text-gray-500 font-bold">
                        Stock
                    </label>
                    <input id="stock" name="stock" type="text" placeholder="Stock"
                        class="border p-3 w-full rounded-lg value="{{ old('stock') }}" />
                </div>

                <div class="mb-5">
                    <label for="medida" class="mb-2 block uppercase text-gray-500 font-bold">
                        Medidas
                    </label>
                    <select name="medida" id="medida" class="select">
                        @foreach ($medidas as $medida)
                            <option value={{$medida->id}}>{{$medida->name}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Crear"
                    class="bg-sky-600 hover:bg-sky-700 
                    transition-colors cursor-pointer uppercase 
                    font-bold w-full p-3 text-white rounded-lg" />
            </form>

        </div>
    </div>
@endsection
