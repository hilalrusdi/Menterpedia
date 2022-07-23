@extends('layouts.main')
@section('style')
  <link rel="stylesheet" href="{{ url('css/profil.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection
@include('partials.navbarpengajar')
@section('content')
  <body>
      <div class="container">
        <div class="main-body">
          <!-- Card 1 -->
          <div class="row gutters-sm">  
            @if (isset($data['foto']))
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="{{ asset('storage/'.$data['foto']) }}" alt="Profile Picture" class="rounded-circle" width="150px" height="150px">
                      <div class="mt-3">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-muted font-size-sm">{{ Auth::user()->email }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @else
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-muted font-size-sm">{{ Auth::user()->email }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif

            @if (isset($data))
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nama</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $data['nama'] }}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->email }}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nomor Handphone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $data['nomer_hp'] }}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $data['alamat'] }}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Tanggal Lahir</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $data['tanggal_lahir'] }}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Biodata</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $data['biodata'] }}
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-sm-12">
                        <a class="btn btn-info " target="__blank" href="/editpengajar">Edit</a>
                      </div>
                    </div>
                  </div>
                </div>     
              </div>
            @else
              <div class="col-md-8 h-25">
                <div class="d-flex card mb-3" style="min-height: 280px">
                  <div class="card-body text-center">
                    <table class="table" style="min-height: 280px">
                        <tr>
                          <td class="align-middle">
                            <h3 class="mb-3">Profil Belum Tersedia</h3>
                            <a href="/setuppengajar" class="btn btn-primary shadow rounded">Tambahkan Profil</a>
                          </td>
                        </tr>
                    </table>
                  </div>
                </div>     
              </div>
            @endif

          </div>     
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
@endsection