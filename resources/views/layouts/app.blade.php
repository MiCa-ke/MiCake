<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>MiCake - @yield('titulo')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> --}}

</head>

<body class="bg-PinkLavander">
    @auth
    <nav class="navbar navbar-expand-lg bg-light shadow p-4">
        <div class="container-fluid">
          @switch(auth()->user()->rol)
              @case('admin')
                  
                  @break
              
              @default
                  
          @endswitch
          <a class="navbar-brand" href="{{route('admin.index')}}"><h1 class="text-3xl font-black"> MiCake </h1></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav mx-auto">
              @switch(auth()->user()->rol)
                  @case('cliente')
                      <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Producto
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('producto.index')}}">Ver productos</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm py-2">
                                Cerrar Sesion
                            </button>
                        </form>
                      </li>
                      @break
                  @case('empleado')
                      <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Producto
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('producto.index')}}">Gestionar productos</a></li>
                            <li><a class="dropdown-item" href="{{route('receta.index')}}">Gestionar Recetas</a></li>
                            <li><a class="dropdown-item" href="{{route('ingrediente.index')}}">Gestionar Ingredientes</a></li>
                            <li><a class="dropdown-item" href="{{route('medida.index')}}">Gestionar Medida</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Ventas
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('pedido.index')}}">Gestionar Pedido</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Compras
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('compra.index')}}">Gestionar Compras</a></li>
                          <li><a class="dropdown-item" href="{{route('notabaja.index')}}">Gestionar Baja</a></li>
                        </ul>
                      </li>
                      
                      <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm py-2">
                                Cerrar Sesion
                            </button>
                        </form>
                      </li>
                      @break
                  @default
                  <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Usuario
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('usuario.index')}}">Gestionar Usuario</a></li>
                      <li><a class="dropdown-item" href="{{route('cliente.create')}}">Registrar Cliente</a></li>
                      <li><a class="dropdown-item" href="{{route('empleado.create')}}">Registrar Personal</a></li>
                      <li><a class="dropdown-item" href="{{route('Bitacora')}}">Bitacora</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Producto
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('producto.index')}}">Gestionar productos</a></li>
                        <li><a class="dropdown-item" href="{{route('receta.index')}}">Gestionar Recetas</a></li>
                        <li><a class="dropdown-item" href="{{route('ingrediente.index')}}">Gestionar Ingredientes</a></li>
                        <li><a class="dropdown-item" href="{{route('medida.index')}}">Gestionar Medida</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Ventas
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('pedido.index')}}">Gestionar Pedido</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Compras
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('compra.index')}}">Gestionar Compras</a></li>
                      <li><a class="dropdown-item" href="{{route('notabaja.index')}}">Gestionar Baja</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Reporte
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('reporteCompras')}}">Reporte Compras</a></li>
                      <li><a class="dropdown-item" href="{{route('reportePedido')}}">Reporte Pedido</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm py-2">
                            Cerrar Sesion
                        </button>
                    </form>
                  </li>
              @endswitch
              
            </ul>
          </div>
        </div>
      </nav>
      @endauth
      
      @guest
      <header class="p-5 border-b bg-AureolinYellow shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black"> MiCake </h1>

            {{-- @auth
                <nav class="flex gap-8 items-baseline">

                    @can('usuario.index')
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('usuario.index') }}">
                            Gestionar Usuarios
                        </a>
                    @endcan

                    @can('producto.index')
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('producto.index') }}">
                            Gestionar Productos
                        </a>
                    @endcan

                    @can('receta.index')
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('receta.index') }}">
                            Gestionar Recetas
                        </a>
                    @endcan

                    @can('ingrediente.index')
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('ingrediente.index') }}">
                            Gestionar Ingredientes
                        </a>
                    @endcan

                    @can('pedido.create')
                        <a class="font-bold uppercase text-gray-600 text-sm" href="">
                            Comprar Productos
                        </a>
                    @endcan

                    @can('medida.index')
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('medida.index') }}">
                        Gestionar Medidas
                    </a>
                @endcan

                    @can('pedido.index')
                        <a class="font-bold uppercase text-gray-600 text-sm" href="">
                            Gestionar Pedidos
                        </a>
                    @endcan

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                            Cerrar Sesion
                        </button>
                    </form>
                </nav>
            @endauth --}}

                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">
                        Iniciar Sesion
                    </a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('cliente.create') }}">
                        Crear Cuenta
                    </a>
                    
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('producto.index') }}">
                        Productos
                    </a>
                    
                    
                </nav>
            @endguest

        </div>
    </header> 


    <main class="container mx-auto mt-10">

        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>

        @yield('contenido')

    </main>



    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        MiCake - Todos los derechos reservados {{ now()->year }}
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
        crossorigin="anonymous">
    </script>

</body>

</html>
