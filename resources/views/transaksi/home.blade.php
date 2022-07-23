<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <title>Document</title>
</head>
<body>
    <!-- Navbar -->
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
            <div class="container">
                <a class="navbar-brand" href="http://127.0.0.1:8000">
                    Mentorpedia
                </a>

                <input type="text" id="inputPassword5" class="form-control w-75 me-2" aria-describedby="passwordHelpBlock"><ion-icon name="search" size="small"></ion-icon>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                                                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    uwu
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        My Profile
                                    </a>
                                    
                                    <a class="dropdown-item" href="http://127.0.0.1:8000/logout"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" class="d-none">
                                        <input type="hidden" name="_token" value="H8Qv4iL8xca3Q3amZEFTJeYTMNHuEHJIgKEPDPLw">                                    </form>
                                </div>
                            </li>
                                            </ul>
                </div>
            </div>
        </nav>



        <main class="py-0 top-0 start-0">

            <!-- SlideShow Ads -->
            <div id="carouselExampleControlsNoTouching" class="carousel slide py-4 bg-blue mt-4 mb-4" data-bs-touch="false" data-bs-interval="false">
                
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://picsum.photos/id/327/400/200" class="d-block w-50" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://picsum.photos/id/27/400/200" class="d-block w-50" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://picsum.photos/id/37/400/200" class="d-block w-50" alt="...">
                  </div>
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


            <!-- Channel Terlaris -->
            <h1 class="ms-xl-5 mb-3">
                Channel Terlaris
                <hr style="width:30%", size="3", color=black>  
            </h1>

            <div class="container p-2">
                <div class="row m-2 p-2">

                    <div class="card bg-blue-dark" style="width: 18rem;">
                        <img src="https://picsum.photos/id/27/280/300" class="card-img mt-2" alt="...">
                        <div class="card-body">
                          <div class="float-start mb-2">Dr.Sony</div>
                          <div class="float-end mb-2">
                            <p class="float-end" >4,6  
                            <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star-half"></ion-icon>
                             (1,200)
                          </div>
                          <hr style="width:30%;", size="5", color=black class="mb-2">
                          CEO</p>
                          
                        </div>
                    </div>

                </div>
            </div>
            



        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>