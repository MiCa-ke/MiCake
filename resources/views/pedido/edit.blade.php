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
            <h3 class="text-center">Editar Pedido</h3>
            <br>
            <form action="{{ route('pedido.update',$pedido->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Fecha Entrega
                    </label>
                    <input id="fecha_entrega" name="fecha_entrega" type="date" placeholder="Nombre"
                        class="border p-3 w-full rounded-lg date" value="{{ $pedido->fecha_entrega }}" />
                </div>
                <div class="mb-5">
                    <label for="estado" class="mb-2 block uppercase text-gray-500 font-bold">
                        Estado Del Pedido
                    </label>
                    <select class="form-select form-select-lg mb-3" name="estado" id="estado" aria-label=".form-select-lg example">
                        <option value="0" {{ ($pedido->estado == 0) ? 'selected' : '' }}>EN PROCESO</option>
                        <option value="1" {{ ($pedido->estado == 1) ? 'selected' : '' }}>FINALIZADO</option>
                      </select>
                </div>
                <div class="mb-5">
                    <label for="estado_pago" class="mb-2 block uppercase text-gray-500 font-bold">
                        Estado de Pago
                    </label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="estado_pago">
                        <option value="0" {{ ($pedido->estado_pago == 0) ? 'selected' : '' }}>IMPAGA</option>
                        <option value="1" {{ ($pedido->estado_pago == 1) ? 'selected' : '' }}>CANCELADO</option>
                      </select>
                </div>

                

                <input type="submit" value="Actualizar"
                    class="bg-sky-600 hover:bg-sky-700 
                    transition-colors cursor-pointer uppercase 
                    font-bold w-full p-3 text-white rounded-lg" />
            </form>

        </div>
    </div>
@endsection