@extends('layouts.main')
@section('style')
    <style>
        .link {
            text-decoration: none;
            color: black;
        }

        .profil-pict {
            height: 150px;
            width: 150px;
            overflow: hidden;
        }

        .astext {
            background:none;
            border:none;
            margin:0;
            padding:0;
            cursor: pointer;
        }

        .customrow {
            max-height: 20px;
            overflow: hidden;
        }

        .a-tag {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection
@include('partials.navbarpengajar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2 border-end" style="height: 100vh">
                <div class="row  my-2">
                    <div class="col-2 text-center">
                        
                    </div>
                    <div class="col text-center">
                        <img src="{{ asset('storage/'.$pengajar['foto']) }}" class="img-thumbnail rounded-circle profil-pict" alt="">
                        <h5 class="h5 mt-3">{{ $pengajar['nama'] }}</h5>
                    </div>
                </div>
                <a href="" class="link">
                    <div class="row  my-3">
                        <div class="col-2">
                            <h5 class="h5"><i class="bi bi-book"></i></h5>
                        </div>
                        <div class="col">
                            <h5 class="h5">Jadwal</h5>
                        </div>
                    </div>
                </a>
                <a href="" class="link">
                    <div class="row my-3">
                        <div class="col-2">
                            <h5 class="h5"><i class="bi bi-star"></i></h5>
                        </div>
                        <div class="col">
                            <h5 class="h5">Rating</h5>
                        </div>
                    </div>
                </a>
                <a href="/penarikan" class="link">
                    <div class="row  my-3">
                        <div class="col-2">
                            <h5 class="h5"><i class="bi bi-cash-coin"></i></h5>
                        </div>
                        <div class="col">
                            <h5 class="h5">Monetisasi</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                    <div class="row my-3">
                        <div class="col">
                            @if (isset($pengajar['video']))
                                
                                <video width="500" height="250" controls>
                                    <source src="{{ asset('storage/'.$pengajar['video']) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <div width="500" height='250' class="container">
                                    Video tidak Tersedia
                                </div>
                            @endif
                        </div>
                        <div class="col">
                                @if (isset($jadwal['id']))
                                    
                                    <div class="row">
                                        <div class="col-3"><h4>Harga </h4></div>
                                        <div class="col"><h4>: Rp.{{ number_format($jadwal['harga'],2,',','.')  }},-</h4></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><h4>Kategori</h4></div>
                                        <div class="col"><h4>: @foreach ($kategoriJadwal as $item) <span class="badge mb-1 rounded-pill bg-info text-dark">{{ $item}}</span>@endforeach</h4></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <h4>
                                                Deskripsi
                                            </h4>
                                        </div>
                                        <div class="col">
                                            <h4>
                                                : {{ substr($jadwal['deskripsi'], 0, 500) }}...
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target='#editSesiPembelajaran'>Ubah</button>
                                    </div>
                                    
                                    
                                    
                                    {{-- Modal Edit Jadwal --}}
                                        <div class="modal fade" id="editSesiPembelajaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Pembelajaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/jadwal/editSesi" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-6 card-body">
                                                                    <div class="input-group mb-3 search-form">
                                                                        <input type="text" class="form-control form-input" name="harga" placeholder="Harga" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $jadwal['harga'] }}">
                                                                    </div>
                                                                    <div class="d-flex container-flex">
                                                                        {{-- Kategori dropdown --}}
                                                                        <div class="input-group search-form">
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                                                                                    Pilih Kategori
                                                                                </button>
                                                                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1">
                                                                                    <?php $no = 0 ?>
                                                                                    @foreach ($kategori as $item)
                                                                                            <li class="ps-1">
                                                                                                <div class="form-check">
                                                                                                    <input class="form-check-input" name="kt[{{ $no }}]" type="checkbox" value="{{ $item->id }}" id="flexCheckChecked" @if (in_array($item->nama_kategori,$kategoriJadwal)) checked @endif>
                                                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                                                        {{ $item->nama_kategori }}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </li>
                                                                                            <?php $no = $no+1 ?>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                    
                                                                        {{-- Media Belajar dropdown --}}
                                                                        <div class="input-group search-form">
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    Pilih Media Belajar
                                                                                </button>
                                                                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1">
                                                                                    <li class="ps-1">
                                                                                        <div class="form-check">
                                                                                            @if (count($mediabelajar)>=1)
                                                                                                @if (in_array('MEET',$mediabelajar[0]))
                                                                                                    <input class="form-check-input" name="mb[0]" type="checkbox" value="MEET" id="flexCheckChecked " checked>
                                                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                                                        Google Meet
                                                                                                    </label>
                                                                                                    <input type="text" placeholder="Link Media Belajar" name="link[0]" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $mediabelajar[0][2] }}">
                                                                                                @else
                                                                                                    <input class="form-check-input" name="mb[0]" type="checkbox" value="MEET" id="flexCheckChecked ">
                                                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                                                        Google Meet
                                                                                                    </label>
                                                                                                    <input type="text" placeholder="Link Media Belajar" name="link[0]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                                @endif
                                                                                            @else
                                                                                                <input class="form-check-input" name="mb[0]" type="checkbox" value="MEET" id="flexCheckChecked ">
                                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                                    Google Meet
                                                                                                </label>
                                                                                                <input type="text" placeholder="Link Media Belajar" name="link[0]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                            @endif
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="ps-1">
                                                                                        <div class="form-check">
                                                                                            @if (count($mediabelajar)>=1)
                                                                                                @if (in_array('ZOOM',$mediabelajar[0]))
                                                                                                    <input class="form-check-input" name="mb[1]" type="checkbox" value="ZOOM" id="flexCheckChecked " checked>
                                                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                                                        ZOOM Meet
                                                                                                    </label>
                                                                                                    <input type="text" placeholder="Link Media Belajar" name="link[1]" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $mediabelajar[0][2] }}">
                                                                                                @else
                                                                                                    @if (count($mediabelajar)>1)
                                                                                                        @if (in_array('ZOOM',$mediabelajar[1]))
                                                                                                            <input class="form-check-input" name="mb[1]" type="checkbox" value="ZOOM" id="flexCheckChecked " checked>
                                                                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                                                                ZOOM Meet
                                                                                                            </label>
                                                                                                            <input type="text" placeholder="Link Media Belajar" name="link[1]" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $mediabelajar[1][2] }}">
                                                                                                        @else
                                                                                                            <input class="form-check-input" name="mb[1]" type="checkbox" value="ZOOM" id="flexCheckChecked ">
                                                                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                                                                ZOOM Meet
                                                                                                            </label>
                                                                                                            <input type="text" placeholder="Link Media Belajar" name="link[1]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                                        @endif
                                                                                                    @else
                                                                                                        <input class="form-check-input" name="mb[1]" type="checkbox" value="ZOOM" id="flexCheckChecked ">
                                                                                                        <label class="form-check-label" for="flexCheckChecked">
                                                                                                            ZOOM Meet
                                                                                                        </label>
                                                                                                        <input type="text" placeholder="Link Media Belajar" name="link[1]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                                    @endif
                                                                                                @endif
                                                                                            @else
                                                                                                <input class="form-check-input" name="mb[1]" type="checkbox" value="ZOOM" id="flexCheckChecked ">
                                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                                    ZOOM Meet
                                                                                                </label>
                                                                                                <input type="text" placeholder="Link Media Belajar" name="link[1]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                            @endif
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-floating">
                                                                <textarea class="w-100 mb-3 border form-control" name="deskripsi" placeholder="Deskripsi" id="deskripsi" cols="10" rows="7" style="height: 15vh;">{{ $jadwal['deskripsi'] }}</textarea>
                                                                <label for="deskripsi">Deskripsi</label>
                                                            </div>

                                                            <input type="hidden" name="id_jadwal" value="{{ $jadwal['id'] }}">
                                                        
                                                
                                                            <button type="submit" class="btn btn-primary w-50 rounded mx-auto d-block">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- Close Modal Edit Jadwal --}}


                                @else
                                    <div class="row">
                                        <h4>Harga :  Belum Ditambahkan</h4>
                                    </div>
                                    <div class="row">
                                        <h4>Kategori :  Belum Ditambahkan</h4>
                                    </div>
                                    <div class="row">
                                        <h4>Deskripsi : Belum Ditambahkan</h4>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target='#setSesiPembelajaran'>Tambahkan</button>
                                    </div>
                                    


                                    {{-- Modal Jadwal --}}
                                        <div class="modal fade" id="setSesiPembelajaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Sesi Pembelajaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/jadwal/tambahSesi" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-6 card-body">
                                                                    <div class="input-group mb-3 search-form">
                                                                        <input type="text" class="form-control form-input" name="harga" placeholder="Harga" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                    </div>
                                                                    <div class="d-flex container-flex">
                                                                        {{-- Kategori dropdown --}}
                                                                        <div class="input-group search-form">
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    Pilih Kategori
                                                                                </button>
                                                                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1">
                                                                                    <?php $no = 0 ?>
                                                                                    @foreach ($kategori as $item)
                                                                                            <li class="ps-1">
                                                                                                <div class="form-check">
                                                                                                    <input class="form-check-input" name="kt[{{ $no }}]" type="checkbox" value="{{ $item->id }}" id="flexCheckChecked">
                                                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                                                        {{ $item->nama_kategori }}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </li>
                                                                                            <?php $no = $no+1 ?>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                    
                                                                        {{-- Media Belajar dropdown --}}
                                                                        <div class="input-group search-form">
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    Pilih Media Belajar
                                                                                </button>
                                                                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1">
                                                                                    <li class="ps-1">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" name="mb[0]" type="checkbox" value="MEET" id="flexCheckChecked">
                                                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                                                Google Meet
                                                                                            </label>
                                                                                            <input type="text" placeholder="Link Media Belajar" name="link[0]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="ps-1">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" name="mb[1]" type="checkbox" value="ZOOM" id="flexCheckChecked">
                                                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                                                Zoom Meeting
                                                                                            </label>
                                                                                            <input type="text" placeholder="Link Media Belajar" name="link[1]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-floating">
                                                                <textarea class="w-100 mb-3 border form-control" name="deskripsi" placeholder="Deskripsi" id="deskripsi" cols="10" rows="7" style="height: 15vh;"></textarea>
                                                                <label for="deskripsi">Deskripsi</label>
                                                            </div>
                                                        
                                                            <input type="hidden" name="id_penagajar" value="{{ $pengajar['id'] }}">
                                                            <button type="submit" class="btn btn-primary w-50 rounded mx-auto d-block">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- Close Modal Jadwal --}}



                                @endif
                        </div>
                    </div>
                    <div class="row mx-2 py-1 shadow rounded">
                            <div class="col">
                                <button class="btn btn-light fs-5"><strong>List Jadwal</strong></button>
                            </div>
                            <div class="col-2 mt-1">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambahkan Jadwal</button>
                            </div>
                    </div>
                    <div class="row mx-2 mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @if (isset($datetime))
                                        <?php $count= 1;?>
                                        @foreach ($datetime as $dt)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $dt['datetime'] }}</td>
                                                <td>{{ $dt['status_jadwal'] }}</td>
                                                <td><button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit{{ $count }}"><i class="bi bi-pencil"></i> Edit</button> | <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $count }}"><i class="bi bi-trash"></i> Delete</button></td>
                                            </tr>
                                            {{-- Modal Edit Jadwal --}}
                                                <div class="modal fade" id="edit{{ $count }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Sesi Pembelajaran</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/jadwal/editTanggal" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-6 card-body">
                                                                            <div class="input-group mb-3 search-form">
                                                                                <?php 
                                                                                    $tanggalwaktu = new datetime($dt['datetime']);
                                                                                    $date = $tanggalwaktu->format('Y-m-d');
                                                                                    $time = $tanggalwaktu->format('H:i:s');
                                                                                ?>
                                                                                <input type="date" class="form-control form-input bg-input" name="tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $date }}">
                                                                                <input type="time" class="form-control form-input bg-input" name="jam" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $time }}">
                                                                            </div>
                                                                            <div class="d-flex container-flex">
                                                                                {{-- Kategori dropdown --}}

                                                                                {{-- Media Belajar dropdown --}}
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <select class="form-select" name="status_jadwal" id="floatingSelect" aria-label="Floating label select example">
                                                                            <option value="aktif" @if ($dt['status_jadwal']==='aktif')
                                                                                selected
                                                                            @endif>aktif</option>
                                                                            <option value="nonaktif" @if ($dt['status_jadwal']==='nonaktif' or $dt['status_jadwal']==='ordered')
                                                                            selected
                                                                            @endif>nonaktif</option>
                                                                            </select>
                                                                        <label for="floatingSelect">Status Jadwal</label>
                                                                    </div>
                                                                    <input type="hidden" name="id_tanggal" value="{{ $dt['id'] }}">
                                                                    <button type="submit" class="btn btn-primary w-50 rounded mx-auto d-block">Simpan</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- Close Modal Edit Jadwal --}}

                                            {{-- Modal Hapus Jadwal --}}
                                                <div class="modal fade" id="delete{{ $count }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Tanggal</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin untuk menghapus tanggal ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="/jadwal/deleteTanggal" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id_jadwal" value="{{ $dt['id'] }}">
                                                                    <button type="Submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- Close Modal Hapus Jadwal --}}
                                            <?php $count +=1 ;?>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>

    @if (isset($jadwal['id']))
        {{-- Modal Tambah Jadwal --}}
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Sesi Pembelajaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/jadwal/tambahTanggal" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6 card-body">
                                        <div class="input-group mb-3 search-form">
                                            <input type="date" class="form-control form-input bg-input" name="tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <input type="time" class="form-control form-input bg-input" name="jam" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <input type="hidden" name="status_jadwal" value="aktif">
                                        </div>
                                        <div class="d-flex container-flex">
                                            {{-- Kategori dropdown --}}

                                            {{-- Media Belajar dropdown --}}
                                            
                                        </div>
                                    </div>
                                </div>
                            
                                <input type="hidden" name="id_sesiPembelajaran" value="{{ $jadwal['id'] }}">
                                <button type="submit" class="btn btn-primary w-50 rounded mx-auto d-block">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- Close Modal Tambah Jadwal --}}
    @endif
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection