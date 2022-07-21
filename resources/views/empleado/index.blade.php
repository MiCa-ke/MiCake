@extends('layouts.app');

@section('titulo')
    Tu cuenta
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-700 text-2xl">
                    Empleado: {{ auth()->user()->name }}
                </p>
                <p class="text-gray-700 text-2xl">
                    Correo Electronico: {{ auth()->user()->email }}
                </p>
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <form action="{{ route('empleado.update') }}" method="get">
                    <input type="submit" value="Modificar Datos"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors 
                    cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
                </form>
            </div>
        </div>
    </div>
@endsection
