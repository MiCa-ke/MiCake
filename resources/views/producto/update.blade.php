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
            <form action="{{ route('producto.actualizar', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="nameDescripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <input id="descripcion" name="descripcion" type="text" placeholder="Descripcion"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ $producto->descripcion }}" />
                </div>
                
                <div class="mb-5">
                    <label for="namePrecio" class="mb-2 block uppercase text-gray-500 font-bold">
                        Precio
                    </label>
                    <input id="precio" name="precio" type="text" placeholder="Precio"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ $producto->precio }}" />
                </div>

                <div class="mb-5">
                    <label for="receta" class="mb-2 block uppercase text-gray-500 font-bold">
                        Receta
                    </label>
                    <select name="receta_id" id="" class="border p-3 w-full rounded-lg">
                        <option value="">----Seleccione una Opcion----</option>
                        @foreach ($recetas as $receta)
                            <option value="{{$receta->id}}" {{($receta->id == $producto->receta_id) ? 'selected' : ''}}>{{$receta->descripcion}}</option>
                        @endforeach
                    </select>
                    {{-- <input id="receta" name="receta_id" type="text" placeholder="Precio"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('precio') }}" /> --}}
                </div>

                <div class="mb-5">
                    <label for="namePrecio" class="mb-2 block uppercase text-gray-500 font-bold">
                        URL Imagen
                    </label>
                    <input id="precio" name="imgURL" type="text" placeholder="imgURL"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ $producto->imgURL }}" />
                </div>

                <input type="submit" value="Crear Producto"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
            </form>

        </div>
    </div>
@endsection
