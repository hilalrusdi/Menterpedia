@extends('layouts.app')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/home.css') }}">
@endsection

@section('content')
    <div id="app">
        <main class="py-0 top-0 start-0">

            <!-- SlideShow Ads -->
            <div id="carouselExampleControlsNoTouching" class="carousel slide py-4 bg-blue mt-4 mb-4" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="https://picsum.photos/id/327/400/200" class="d-block w-50" alt="...">
                    </div>
                    @foreach ($ad as $ad)
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="{{ asset('storage/'.$ad['gambar']) }}" class="d-block w-50" alt="...">
                        </div>
                    @endforeach
                </div>

                <!-- SlideShow Button -->
                <button class="carousel-control-prev slideshow-ads-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next slideshow-ads-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            

            <!-- Kategori Card -->
            <div class="container-sm p-3 border-1 rounded-1 shadow p-3 mb-5 bg-body" style="width: 75%;">
                <div class="row ms-4 mb-3">
                    <h2 class="mb-4">
                        Kategori
                    </h2>


                    <div id="carouselExample" class="carousel slide row" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">

                                <!-- Kategori Card Active/Halaman 1 -->
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>



                            <!-- Kategori Card Active/Halaman 2 -->
                            <div class="carousel-item">
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card d-inline-block col-2 m-2" style="max-width: 8rem;">
                                    <div class="mt-3 ms-2 me-2">
                                        <ion-icon name="accessibility-outline" class="card-img top" size="large""></ion-icon>
                                        <div class="card-body text-center">
                                            <h5>Sains</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>

                        <!-- Kategori Slide Button -->
                        <button class="carousel-control-prev kategori-slide-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <ion-icon name="arrow-back-circle"></ion-icon>
                            <!-- <span class="visually-hidden">Previous</span> -->
                        </button>
                        <button class="carousel-control-next kategori-slide-next ms-3" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <ion-icon name="arrow-forward-circle" ></ion-icon>
                            <!-- <span class="visually-hidden">Next</span> -->
                        </button>
                        
                        
                    </div>
                    
                
                    
                </div>
                
            </div>

            <div class="container">

                        <!-- Channel Terlaris -->
                        <h1 class=" mb-3">
                            Channel Terlaris
                            <hr style="width:30%", size="3", color=black>  
                        </h1>

                                <div class="m-3">
                                    <div class="ms-5 row">
                                        
                                        @if (isset($mentor))
                                            @foreach ($mentor as $mtr)
                                                <div class="card  shadow" style="max-width: 30vh;">
                                                    <a href="/{{ $mtr['nomer_hp'] }}" style="text-decoration: none;color: black;">
                                                        <img src="{{ asset('storage/'.$mtr['foto']) }}" class="card-img mt-2 overflow-hidden" style="height: 300px; width:265px;" alt="...">
                                                        <div class="card-body">
                                                            <div class=""><h4>{{ $mtr['nama'] }}</h4></div>
                                                            <hr>
                                                            <div class="mb-2">
                                                                <p class="mb-1" >4,6
                                                                <span class="align-text-top"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star-half"></ion-icon></span>
                                                                (1,200)
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            
                                        @endif
                                        
                                            
                                    </div>
                                </div>

                    
            </div>

            
            



        </main>
    </div>
    
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
