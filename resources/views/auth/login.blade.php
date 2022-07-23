@extends('layouts.main')
@section('style')
    <link rel="stylesheet" href="{{url('css/style1.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
        <div class="body d-md-flex">
            <div class="box-1 mt-md-0 mt-5"> 
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class=" d-block h-100 img-fluid align-items-center" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images.jpg" class="d-block h-100 img-fluid align-items-center" alt="...">
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class=" box-2 d-flex flex-column h-100">
                <div class="m-5 text-center text-color-prymary">
                    <img class="rounded mx-auto d-block img-fluid" style="width:65px" src="logo.png" alt="" srcset="">
                    <h1 class="fs-2 mt-3">Hello There!</h1>
                    <div class="d-flex flex-column ">
                        <p class=" mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in.</p>
                        
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control @error("email")is-invalid @enderror" id="email" placeholder="name@example.com" required autocomplete="email" autofocus>
                                <label for="email">{{ __('Email Address') }}</label>
                                @error('email')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">{{ __('Password') }}</label>
                            </div>

                            <div class="form-group text-start">
                                <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Remember me
                                </label>
                                </div>
                                <div class="form-check-inline float-end">
                                    <a href="{{ route('password.request') }}">lupa password</a>
                                    
                                </div>
                                
                            </div>

                            <div class="d-grid gap-2 mt-lg-5">
                                <button class="btn btn-primary" type="submit">{{ __('Login') }}</button>
                            </div>
                        </form>

                    </div>

                    
                </div>
                <div class="mt-auto text-color-link">
                    <p class="footer mb-0 mt-md-0 mt-4 text-center">Belum Memiliki Akun? <a href="{{ route('register') }}">Daftar</a> </p>
                </div>

                
            </div>
        </div>
        </div>
    </div>
@endsection