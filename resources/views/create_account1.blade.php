<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style1.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

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
                <div class="m-5 text-start text-color-prymary">
                    <h1 class="fs-2 mt-3">Registrasi Pengajar</h1>
                    <div class="d-flex flex-column ">
                        <p class=" mb-4 text-color-link">Ingin bergabung sebagi siswa? <a href="">klik disini</a></p>
                        
                        <form action="/register-customer" method="POST">
                          @csrf
                            <div class="mb-3">
                              <input type="email" name="name" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
                              @error('email')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control @error('confirmation-email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Konfirmasi Email" value="{{ old('email') }}">
                                @error('confirmation-email')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                                @error('password')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirmation-password" class="form-control @error('confirmation-password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Konfirmasi Password">
                                @error('confirmation-password')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>

                            <div class="form-group text-start">
                                <div class="form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label" for="gridCheck">
                                    Saya Menyetujui <span class="p-color me-1">Syarat</span>dan <span class="p-color me-1">Ketentuan Layanan</span>
                                  </label>
                                </div>
                            </div>

                            <input type="hidden" name="user_role" value='customer'>



                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>

                    </div>

                    
                </div>
                <div class="mt-auto text-color-link">
                    <p class="footer mb-0 mt-md-0 mt-4 text-center">Sudah Memiliki Akun? <a href="/login">Daftar</a> </p>
                </div>

                
            </div>
        </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>