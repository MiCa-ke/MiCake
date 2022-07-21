@extends('layouts.app')

@section('titulo')
Inicia sesion en MiCake
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <img src="{{ asset('img/Login.jpg') }}" alt="Imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 p-6 bg-with rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                @if (session('mensaje'))
                    <p class= "text-red-500 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                    id="email"
                    name="email"                
                    type="email"
                    placeholder="Tu Email"
                    class="border p-3 w-full rounded-lg @error('email')  border-red-500 @enderror"
                    value="{{old('email')}}"
                    />
                    @error('email')
                        <p class= "text-red-500 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                    id="password"
                    name="password"                
                    type="password"
                    placeholder="Password"
                    class="border p-3 w-full rounded-lg @error('password')  border-red-500 @enderror"
                    />
                    @error('password')
                        <p class= "text-red-500 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input 
                    type="submit"
                    value="Iniciar sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />

            </form>

        </div>
    </div>
@endsection
