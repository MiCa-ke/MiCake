@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')
    <div class="container w-full md:w-4/5 xl:w-full  mx-auto px-2">
        <h2 class="font-black text-center text-3xl mb-10">
            Gestionar Productos
        </h2>
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <form action="{{ route('producto.create') }}" method="get">
                <input type="submit" value="Crear Nuevo Producto"
                    class="bg-orange-500 hover:bg-orange-700 transition-colors 
                cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
            </form>
        </div>
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <table id="example" class="stripe hover text-center"
                style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>
                
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        @auth
                            <td>
                                <form action="{{ route('producto.update', $producto->id) }}" method="get">
                                    <button type="submit" class="bg-green-600 font-bold w-2/3 p-3 text-white rounded-lg">Modificar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('producto.delete', $producto->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button  class="bg-red-600 font-bold w-2/3 p-3 text-white rounded-lg">
                                        Eliminar
                                    </button>
                                </form>
                                
                            </td>
                        @endauth
                        @guest
                            <td></td>
                            <td></td>
                        @endguest
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
