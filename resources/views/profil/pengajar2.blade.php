@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ url('css/pengajar.css') }}">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endsection
@section('content')
<body class="body">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right" >
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img id="frame" class="rounded-circle mt-5 img-preview" style="width: 150px; height:150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                    <span class="text-black-50">{{ Auth::user()->email }}</span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    {{-- /setuppengajar --}}
                    <form action="/setuppengajar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama ( Sesuai KTP )" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="labels">Nomor Handphone</label>
                                <input type="number" name="nomer_hp" class="form-control @error('nomer_hp') is-invalid @enderror" placeholder="Exp. 0821xxxxxxxx" value="{{ old('nomer_hp') }}">
                                @error('nomor_hp')
                                    <div class="invalid-feedback">
                                        {{ "Masukkan nomor telpon dengan benar. cth: 0821xxxxxxxx" }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="labels">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="labels">Biodata</label>
                                <textarea type="text" class="form-control @error('biodata') is-invalid @enderror" name="biodata" placeholder="Isikan biodata singkat" value="">{{ old('biodata') }}</textarea>
                                @error('biodata')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="labels" for="customFile">Upload Foto Profil</label>
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="formFile" onchange="preview()">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="labels" for="ktp">Upload Foto KTP</label>
                                <input type="file" name="scan_ktp" class="form-control @error('scan_ktp') is-invalid @enderror" id="ktp" onchange='previewImage()'>
                                @error('scan_ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">
                                <label class="labels" for="video">Upload Video</label>
                                <input type="file" name="video" class="form-control @error('video') is-invalid @enderror" id="video" onchange='previewImage()'>
                                @error('video')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <input type="hidden" name="status_akun" value="AIUEO">
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        </div>
                        
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Registrasi</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    </div>
</body>
@endsection

@section('script')
    
<script type="text/javascript" src="{{ URL::asset('js/review_image.js') }}"></script>

@endsection
