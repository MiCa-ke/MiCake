@extends('layouts.app')

@section('titulo')
    Actualiza tus datos
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-4/12 p-5">
        <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
    </div>

    <div class="md:w-4/12 p-6 bg-white rounded-lg shadow-xl">

        <form action="{{ route('admin.update') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>
                <input id="name" name="name" type="text" placeholder="Tu nombre"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ auth()->user()->name }}" />

                @error('name')
                    <p class="text-red-500 text-center">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input id="email" name="email" type="email" placeholder="Tu Email de registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ auth()->user()->email }}" />
                @error('email')
                    <p class="text-red-500 text-center">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <input type="submit" value="Actualizar Datos"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
        </form>

    </div>
</div>
@endsection
