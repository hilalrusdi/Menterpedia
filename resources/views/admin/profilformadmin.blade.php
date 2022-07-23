@extends('layouts.main')
@section('style')
  <link rel="stylesheet" href="{{ url('css/profil.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
@endsection
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
                        <h4>{{ $data['nama'] }}</h4>
                        <p class="text-muted font-size-sm">{{ $data1['email'] }}</p>
                        @if ($data['status_akun']==='Verified')
                          <i class="bi bi-check2-circle">{{ $data['status_akun'] }}</i>
                        @else
                          <i class="bi bi-x-circle-fill">{{ $data['status_akun'] }}</i>
                        @endif
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
                        <h4>{{ $data['nama'] }}</h4>
                        <p class="text-muted font-size-sm">{{ $data1['email'] }}</p>
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
                        {{ $data1['email'] }}
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
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Lihat Scan KTP</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Scan KTP</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <img src="{{ asset('storage/'.$data['scan_ktp']) }}" alt="" style="max-width: 45vh" >
                                <a href="{{ asset('storage/'.$data['scan_ktp']) }}"><button class="btn btn-info mt-3">Perbesar</button></a>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tolak</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Setujui</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Apakah anda yakin menyetujui verifikasi tersebut ?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                <form action="/adm/verif/aprove" method="post">
                                  @csrf
                                  <input type="hidden" name="tkn" value="{{ $tkn }}">
                                  <input type="hidden" name="id" value="{{ $data['id'] }}">
                                  <input type="hidden" name="id_user" value="{{ $data['id_user'] }}">
                                  <button type="submit" class="btn btn-info">Oke</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
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
  </body>
@endsection