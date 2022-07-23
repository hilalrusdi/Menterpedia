@extends('layouts.main')
@section('style')
    <style>
        .astext {
            background:none;
            border:none;
            margin:0;
            padding:0;
            cursor: pointer;
        }
    </style>
@endsection
@include('admin.partials.navadmin')
@section('content')
    <body>
        <div class="container border border-2 shadow rounded mt-3" style="width: 50%">
            <div class="row">
                    <div id="carouselExampleControlsNoTouching" class="carousel slide py-4 mt-4 mb-4" data-bs-touch="false" data-bs-interval="false">              
                        
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/id/327/400/200" class="d-block mx-auto" alt="...">
                            </div>
                            @if (isset($data))
                                @foreach ($data as $data1)
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/'.$data1['gambar']) }}" class="d-block mx-auto" style="max-width: 400px;min-width:100px" alt="...">
                                    </div>
                                @endforeach
                            @endif
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
            </div>
            <div class="row">
                <form action="/adm/ad/newad" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Input Gambar Ad</label>
                        <div class="container p-0">
                            <input class="float-start form-control" name="gambar" style="width: 70%" type="file" id="formFile">
                            <input class="float-start form-control" type="date" style="width: 15%" name="exp_date" id="">
                            <input type="hidden" name="tkn" value="{{ $tkn }}">
                            <button type="submit" class="float-end btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Exp Date</th>
                            <th scope="col">Tool</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($data))
                                @foreach ($data as $data2)
                                    <tr>
                                        <th scope="row">{{ $data2['id'] }}</th>
                                        <td><img src="{{ asset('storage/'.$data2['gambar']) }}" style="max-width: 200px;min-width: 100px" alt=""></td>
                                        <td>{{ $data2['exp_date'] }}</td>
                                        <td>
                                            <form action="/adm/ad/dlt" method="post">
                                            @csrf
                                            <input type="hidden" name="tkn" value={{ $tkn }}>
                                            <input type="hidden" name="id" value={{ $data2['id'] }}>
                                            <input type="hidden" name="oldImage" value={{ $data2['gambar'] }}>
                                            <button type="submit" class="nav-link astext"><a class="nav-link">Hapus</a></button>
                                        </form></td>
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <th scope="row"></th>
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
    </body>
@endsection