@extends('layouts.app')

@section('titulo')
    MiCake
@endsection

@section('contenido')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   
    <h3 class="text-center">
        Productos
    </h3>
    <br>
    <br>
    {{-- Carrusel de productos destacados --}}
    <div class="row">
        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 card p-2">
            <img src="{{ asset('img/login.jpg') }}" class="card-img-top" alt="Paste de oreo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endsection
