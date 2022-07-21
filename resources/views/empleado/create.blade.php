@extends('layouts.app')

@section('titulo')
    Crear Empleado
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 p-6 bg-white rounded-lg shadow-xl">
            
            <form action="{{ route('empleado.create') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input id="name" name="name" type="text" placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{old('name')}}" />

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
                        value="{{old('email')}}" />
                    @error('email')
                        <p class="text-red-500 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="ci" class="mb-2 block uppercase text-gray-500 font-bold">
                        Carnet de Identidad
                    </label>
                    <input id="ci" name="ci" type="text" placeholder="Tu Carnet de Identidad"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('ci') }}" />
                    @error('ci')
                        <p class="text-red-500 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="telefono" class="mb-2 block uppercase text-gray-500 font-bold">
                        Telefono
                    </label>
                    <input id="telefono" name="telefono" type="text" placeholder="Tu telefono"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('telefono') }}" />

                    @error('telefono')
                        <p class="text-red-500 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="direccion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Direccion
                    </label>
                    <input id="direccion" name="direccion" type="text" placeholder="Tu direccion"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('direccion') }}" />

                    @error('direccion')
                        <p class="text-red-500 text-center">
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
                    placeholder="Password de registro"
                    class="border p-3 w-full rounded-lg @error('password')  border-red-500 @enderror"
                    />
                    @error('password')
                        <p class= "text-red-500 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <input 
                    id="password_confirmation"
                    name="password_confirmation"                
                    type="password"
                    placeholder="Repite tu password"
                    class="border p-3 w-full rounded-lg"
                    />
                </div>

                <input type="submit" value="Crear cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
            </form>

        </div>
    </div>
@endsection
