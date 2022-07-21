@extends('layouts.app')

@section('titulo')
    Gestionar Usuarios
@endsection

@section('contenido')
    <body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
        <!--Container-->
        <div class="container w-full md:w-4/5 xl:w-full  mx-auto px-2">
            <!--Card-->
            <h2 class="font-black text-center text-3xl mb-10">
                Administradores
            </h2>
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($administradores as $administrador)
                        <tr>
                            <td>{{ $administrador->name }}</td>
                            <td>{{ $administrador->email }}</td>
                            <td>
                                <button class="bg-red-600 font-bold w-2/3 p-3 text-white rounded-lg" type="submit">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <h2 class="font-black text-center text-3xl mb-10">
                Clientes
            </h2>
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Ci</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->persona->ci }}</td>
                            <td>{{ $cliente->name }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->persona->telefono }}</td>
                            <td>{{ $cliente->persona->direccion }}</td>
                            <td>
                                <button class="bg-red-600 font-bold w-2/3 p-3 text-white rounded-lg" type="submit">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <h2 class="font-black text-center text-3xl mb-10">
                Empleados
            </h2>
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Ci</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th></th>
                        </tr>
                    </thead>

                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->persona->ci }}</td>
                            <td>{{ $empleado->name }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->persona->telefono }}</td>
                            <td>{{ $empleado->persona->direccion }}</td>
                            <td>
                                <button class="bg-red-600 font-bold w-2/3 p-3 text-white rounded-lg" type="submit">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!--/Card-->
        </div>
        <!--/container-->
    </body>
@endsection
