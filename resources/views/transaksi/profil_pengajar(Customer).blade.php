@extends('layouts.main')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@200;300;500&display=swap');

        .text-color-prymary{color: #626464;}
        .text-color-link{color: #818181;}
        .main-color{color:#03045E}
        .p-color {color: #ee82ee}

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
        }

        body {
            background: url('BG.png') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        .star{
            
            font-size: 35px;
            cursor: pointer;
        }

        .rating label{
            transition: all 0.2s ease;
            color: #DFDFDF;
        }

        .rating input:checked ~label{
            color: #fd4;
        }

        .rating input#star5:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        .rating input:not(:checked) ~ label:hover,
        .rating input:not(:checked) ~ label:hover ~ label{
            color: #fd4;
        }

        .rating label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }
    </style>
@endsection
@section('content')
    <!-- Header -->
    <div class="container border-bottom border-1 border-dark" style="width: 960px;">
        <div class="row mx-auto mt-3">
            <div class="col-6 text-center">

                <!-- Gambar Profil -->
                <figure class="figure text-center">;
                    <img src="{{ asset('storage/'.$data_pengajar['foto']) }}" class="figure-img img-fluid rounded mt-3" alt="..." style="width: 177px;height:177px">
                    
                </figure>
            </div>
            <div class="col-6 mt-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 p-0 bg-transparent">
                        <h5 class="fw-bold">{{ $data_pengajar['nama'] }}</h5>
                    </li>
                    <li class="list-group-item border-0 p-0 bg-transparent">
                        <h5 class="fw-bold mb-3">Rating </h5>
                    </li>
                    <li class="list-group-item border-0 p-0 bg-transparent">
                        
                        <button class="btn btn-info"><ion-icon name="heart-outline" class="align-middle"></ion-icon>
                            <span class="align-middle">Wishlist</span> 
                        </button>
                    </li>
                    <li class="list-group-item border-0 p-0 bg-transparent mt-3">
                        <h6 class="float-start fw-bold">ada masalah dengan pengajar?</h6>
                        <h6 class="float-end" ><a href="" class="text-decoration-none fw-bold" style="color: red;" data-bs-toggle="modal" data-bs-target="#addReport">Laporkan</a> </h6>
                    </li>
                    
                </ul>            
            </div>
        </div>
        <div class="row mx-auto my-3">
            <div class="col mt-3 text-center">
                <video width="70%"controls>
                    <source src="{{ asset('storage/'.$data_pengajar['video']) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    <!-- Header -->


    <!-- Body -->
    <div class="container pb-5">
        <div class="row mx-auto " style="width: 50%;">
            <div class="col-6 ">
                <div id="sesiPembelajaran_link" class="text-center border-top border-4 border-dark"> <!-- Active -->
                    <p class="mt-0" onclick="sesiPembelajaran()" style="cursor: pointer;">Sesi Pembelajaran</p>
                </div>
                
            </div>
            <div class="col-6 ">
                <div id="rating_link" class="text-center">
                    <p class="mt-0" onclick="rating()" style="cursor: pointer;">Rating dan Komen</p>
                </div>
                
            </div>
        </div>

        <!-- Sesi Pembelajaran Menu -->
        <div class="mx-auto" id="menu_sesiPembelajaran" style="width: 960px;">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                    <!-- Silahkan di Foreach -->

                    @if (isset($exception))
                        <li class="list-group-item border-2">
                            Sesi belum ditambahkan
                        </li>
                    @else
                        @foreach ($data_tanggal as $data_tanggal)
                            <li class="list-group-item border-2">
                                <div class="row">
                                    <div class="col-10">
                                        <?php 
                                            $datetime = new DateTime($data_tanggal['datetime']);
                                            
                                            $date = $datetime->format('Y-m-d');
                                            $time = $datetime->format('H:i:s');    
                                        ?>
                                        <p class="mb-0 fw-bold">{{ $time }}</p>
                                        <p class="mb-0 text-muted">{{ $date }} | Rp.{{ number_format($data_jadwal['harga'],2,',','.')  }},-</p>
                                    </div>
                                    <div class="col-2 p-0 d-flex aligns-items-center justify-content-center">
                                        <p class="text-center my-auto">Tersedia</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                        
                    <!-- Tutup Foreach -->
                    </ul>
                </div>
            </div>
        </div>
        <!--END Sesi Pembelajaran Menu -->

        <!-- Rating dan Komen Menu -->
        <div class="mx-auto" id="menu_rating" style="width: 960px; display: none;">
            <div class="card">

                <!-- Header -->
                <div class="card-title border-bottom border-3">
                    <div class="row m-3 mb-0">
                        <div class="col-10 mb-0">
                            <h6 class="fw-bold ">Beri Rating Pengajar</h6>
                            <p>Sampaikan Pendapat Anda</p>
                        </div>
                        <div class="col-2 d-flex my-auto justify-content-center">
                            <div class="d-flex aligns-items-center ">
                                <button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal" data-bs-target="#addComment">Tulis Ulasan</button>
                            </div>
                            
                        </div>
                    </div>
                </div>

                
                <!-- Header -->

                <div class="card-body">
                    
                    <!-- Rating -->
                    <div class="row m-1">
                        <div class="col-6">
                            <div class="row ">
                                <div class="col-2 text-center p-0">
                                    <h1 class="fw-bolder">5,0</h1>
                                    <p style="font-size: 10px;">100 Ulasan</p>
                                </div>
                                <div class="col-8 mb-3">
                                    
                                    <div class="mb-1 p-0 overflow-hidden  m-0" >
                                        <div class="float-start my-auto p-0 me-2">5   </div>
                                        <div class="progress "   >
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mb-1 p-0 overflow-hidden  m-0" >
                                        <div class="float-start my-auto p-0 me-2">5   </div>
                                        <div class="progress   " >
                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mb-1 p-0 overflow-hidden  m-0" >
                                        <div class="float-start my-auto p-0 me-2">5   </div>
                                        <div class="progress   " >
                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mb-1 p-0 overflow-hidden  m-0" >
                                        <div class="float-start my-auto p-0 me-2">5   </div>
                                        <div class="progress   " >
                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-1 p-0 overflow-hidden  m-0" >
                                        <div class="float-start my-auto p-0 me-2">5   </div>
                                        <div class="progress   " >
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="row m-2">
                        <div class="col-6 mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <figure class="figure">
                                        <img src="logo.png" style="width: 50px;" class="figure-img img-fluid rounded" alt="...">
                                    </figure>
                                </div>
                                <div class="col-9">
                                    <div class="card border-0">
                                        <div class="card-title">
                                            <h5 class="float-start">Nama Customer </h5>
                                            <h6 class="text-muted float-end">7 jam yang lalu</h6>
                                        </div>
                                        <div class="card-body border border-2 bg-light">
                                            <p>Bagus sekali saya kasih bintang 5</p>
                                        </div>
                                    </div>
                                    
                                   
                                </div>

                            </div>
                        </div>
                        <a href="" data-bs-toggle="modal" data-bs-target="#readComment">Lihat Semua</a>

                    </div>


                </div>
            </div>
        </div>
        <!-- END Rating dan Komen Menu -->


        
    </div>
    <!-- Body -->

    <!-- Modal Add Comment-->
    <div class="modal fade " id="addComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="m-3 border-0 text-center">
                    <h5 class="text-center fw-bold " id="exampleModalLabel">Beri Rating Pengajar</h5>
                    
                </div>

                <div class="modal-body">

                <!-- Rate Star -->
                <div class="container d-flex align-items-center justify-content-center">
                    <div class="rating ">
                        <input type="radio" class="d-none" name="star" id="star1"><label for="star1" class="float-end">
                            <ion-icon name="star" class="star ms-2"></ion-icon>
                        </label>
                        <input type="radio" class="d-none" name="star" id="star2"><label for="star2" class="float-end">
                            <ion-icon name="star" class="star ms-2"></ion-icon>
                        </label>
                        <input type="radio" class="d-none" name="star" id="star3"><label for="star3" class="float-end">
                            <ion-icon name="star" class="star ms-2"></ion-icon>
                        </label>
                        <input type="radio" class="d-none" name="star" id="star4"><label for="star4" class="float-end">
                            <ion-icon name="star" class="star ms-2"></ion-icon>
                        </label>
                        <input type="radio" class="d-none" name="star" id="star5"><label for="star5" class="float-end">
                            <ion-icon name="star" class="star ms-2"></ion-icon>
                        </label>
                    </div>
                </div>

                <!-- Textarea -->
                <div class="container mt-1">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsikan Pengalaman Anda</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                      </div>
                </div>
                


                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Read Comment -->
    <div class="modal fade " id="readComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable mx-auto modal-lg" >
          <div class="modal-content">
            <div class="text-center m-3">
              <h5 class="modal-title fw-bold" id="exampleModalLabel">Rating dan Review</h5>
              
            </div>
            <div class="modal-body">
                <!-- Filter Rate Star -->
                <div class="container border-bottom border-2 pb-3">
                  <div class="">
                    <button type="button" class="btn btn-sm btn-info rounded rounded-pill me-1 ms-1" style="height: 30px;">
                        <p class="me-1 ms-1" style="color: white;">Semua</p> 
                    </button>
                    <button type="button" class="btn btn-sm border border-3 rounded rounded-pill me-1 ms-1" style="height: 30px;">
                        <ion-icon name="star" class=" fs-6 me-1 float-start" style="color: #fd4;"></ion-icon> <p class="float-end me-1"> 5</p> 
                    </button>
                    <button type="button" class="btn btn-sm border border-3 rounded rounded-pill me-1 ms-1" style="height: 30px;">
                        <ion-icon name="star" class=" fs-6 me-1 float-start" style="color: #fd4;" ></ion-icon> <p class="float-end me-1"> 4</p> 
                    </button>
                    <button type="button" class="btn btn-sm border border-3 rounded rounded-pill me-1 ms-1" style="height: 30px;">
                        <ion-icon name="star" class=" fs-6 me-1 float-start" style="color: #fd4;" ></ion-icon> <p class="float-end me-1"> 3</p> 
                    </button>
                    <button type="button" class="btn btn-sm border border-3 rounded rounded-pill me-1 ms-1" style="height: 30px;">
                        <ion-icon name="star" class=" fs-6 me-1 float-start" style="color: #fd4;" ></ion-icon> <p class="float-end me-1"> 2</p> 
                    </button>
                    <button type="button" class="btn btn-sm border border-3 rounded rounded-pill me-1 ms-1" style="height: 30px;">
                        <ion-icon name="star" class=" fs-6 me-1 float-start" style="color: #fd4;" ></ion-icon> <p class="float-end me-1"> 1</p> 
                    </button>
                  </div>
              </div>
              <!-- Filter Rate Star -->

              <div class="conrainer mt-3 mb-3">
                  <h6>Semua Ulasan</h6>
                  <ul class="list-group pb-0">

                    <!-- Silahkan di Foreach -->
                      <li class="list-group-item pb-0 border-0">
                        <div class="row">
                            <div class="col-8 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <figure class="figure">
                                            <img src="logo.png" style="width: 50px;" class="figure-img img-fluid rounded" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-10">
                                        <div class="card border-0">
                                            <div class="card-title mb-0">
                                                <h6 class="float-start fw-bold">Nama Customer </h6>
                                                <p class="text-muted float-end">7 jam yang lalu</p>
                                            </div>
                                            <div class="card-body m-0 border border-2 bg-light p-2">
                                                <p style="font-size: 12px;">Bagus sekali saya kasih bintang 5</p>
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
    
                                </div>
                            </div>
                      </li>

                      <li class="list-group-item pb-0 border-0">
                        <div class="row">
                            <div class="col-8 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <figure class="figure">
                                            <img src="logo.png" style="width: 50px;" class="figure-img img-fluid rounded" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-10">
                                        <div class="card border-0">
                                            <div class="card-title mb-0">
                                                <h6 class="float-start fw-bold">Nama Customer </h6>
                                                <p class="text-muted float-end">7 jam yang lalu</p>
                                            </div>
                                            <div class="card-body m-0 border border-2 bg-light p-2">
                                                <p style="font-size: 12px;">Bagus sekali saya kasih bintang 5</p>
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
    
                                </div>
                            </div>
                      </li>

                      <li class="list-group-item pb-0 border-0">
                        <div class="row">
                            <div class="col-8 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <figure class="figure">
                                            <img src="logo.png" style="width: 50px;" class="figure-img img-fluid rounded" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-10">
                                        <div class="card border-0">
                                            <div class="card-title mb-0">
                                                <h6 class="float-start fw-bold">Nama Customer </h6>
                                                <p class="text-muted float-end">7 jam yang lalu</p>
                                            </div>
                                            <div class="card-body m-0 border border-2 bg-light p-2">
                                                <p style="font-size: 12px;">Bagus sekali saya kasih bintang 5</p>
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
    
                                </div>
                            </div>
                      </li>

                      <li class="list-group-item pb-0 border-0">
                        <div class="row">
                            <div class="col-8 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <figure class="figure">
                                            <img src="logo.png" style="width: 50px;" class="figure-img img-fluid rounded" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-10">
                                        <div class="card border-0">
                                            <div class="card-title mb-0">
                                                <h6 class="float-start fw-bold">Nama Customer </h6>
                                                <p class="text-muted float-end">7 jam yang lalu</p>
                                            </div>
                                            <div class="card-body m-0 border border-2 bg-light p-2">
                                                <p style="font-size: 12px;">Bagus sekali saya kasih bintang 5</p>
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
    
                                </div>
                            </div>
                      </li>

                    <!-- Tutup Foreach -->
                      
                  </ul>
              </div>
            </div>
            
          </div>
        </div>
    </div>
    
    <!-- Modal Add Report -->
    <div class="modal fade" id="addReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="text-center m-3 mb-2">
              <h5 class="modal-title fw-bold" id="exampleModalLabel">Laporkan Pengajar</h5>
              
            </div>
            <div class="modal-body">
              <div class="container pb-3 border-bottom border-2">
                  <h6>Pilih kategori pelanggaran yang terjadi</h6>
                  <div class="radio">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Scammer/Penipuan" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          Scammer/Penipuan
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Penyampaian Tidak Bagus" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Penyampaian Tidak Bagus
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pelanggaran Asusila" id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">
                          Pelanggaran Asusila
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Attitude Kurang Sopan" id="defaultCheck4">
                        <label class="form-check-label" for="defaultCheck4">
                          Attitude Kurang Sopan
                        </label>
                      </div>
                      <div class="form-check mt-2">
                        <div class="input-group">
                            <span class="">
                                <label class="form-check-label me-1" for="defaultCheck6">
                                    Lainnya 
                                </label>
                                <input type="checkbox" id="defaultCheck6" class="form-check-input mt-0">
                                
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="container m-3">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                    <label class="form-check-label text-muted" style="font-size: 14px;" for="defaultCheck5">
                        Saya dengan ini menyatakan bahwa segala informasi yang dilaporkan memang benar
                    </label>
                </div>
                
            </div>
            <div class="row pb-5">
                <button class="btn border border-dark mx-auto col-3" data-bs-dismiss="modal">Batalkan</button>
                <button class="btn btn-danger col-3 mx-auto ">Laporkan</button>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Script untuk pindah page -->
    <script>
        function rating() {
            var sesi = document.getElementById("sesiPembelajaran_link");
            var rating = document.getElementById("rating_link");
            sesi.classList.remove('border-top', 'border-4', 'border-dark');
            rating.classList.add('border-top', 'border-4', 'border-dark');
            document.getElementById("menu_sesiPembelajaran").style.display = "none";
            document.getElementById("menu_rating").style.display = "block";
            
        }
        function sesiPembelajaran() {
            var sesi = document.getElementById("sesiPembelajaran_link");
            var rating = document.getElementById("rating_link");
            sesi.classList.add('border-top', 'border-4', 'border-dark');
            rating.classList.remove('border-top', 'border-4', 'border-dark');
            document.getElementById("menu_rating").style.display = "none";
            document.getElementById("menu_sesiPembelajaran").style.display = "block";
        }


    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/189561ab68.js" crossorigin="anonymous"></script>
@endsection
<body>

    

    

</body>
</html>