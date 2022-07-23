@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ url('css/create_transaksi.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-align-center mt-3">
            <div class="body-profil d-md-flex">
                <div class="card" style="width: 100%;"> 
                    <div class="card-body container w-100 h-100 bg-cream">
                        @if (isset($no_sesi))
                            <div class="row pt-5">
                                <h4>Pengajar belum membuat sesi</h4>
                            </div>
                        @else
                            <div class="row pt-5">
                                <div class="col text-start text-color-prymary">
                                    @if (isset($data_pengajar['video']))
                                        <video width="500" height="250" controls>
                                            <source src="{{ asset('storage/'.$data_pengajar['video']) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <img src="https://picsum.photos/id/327/250/300" class="d-block w-100 rounded-2" alt="">
                                    @endif
                                </div> 
                                <div class="col">
                                    <h4 class="mb-3">{{ $data_pengajar['nama'] }}</h4>
                                    <h4 class="mb-3" id="price">Rp.{{ number_format($data_jadwal['harga'],2,',','.')  }},-</h4>
                                    <div>
                                        @foreach ($data_kategori as $kategori)
                                            <h4><span class="badge bg-secondary float-start me-1">{{ $kategori }}</span></h4>
                                        @endforeach                            
                                    </div><br><br>
                                    <p>Deskripsi :</p>
                                    <p id="desc">{{ $data_jadwal['deskripsi'] }}</p>
                                </div>
                                <div class="col text-center">
                                    <div class="card align-middle shadow" style="width: 18rem;">
                                        @if ($counter==='customer')
                                            @if (isset($exception))
                                                <div class="card-body">
                                                    <p class="card-text">Atur Jadwal dan Media Belajar</p>
                                                    <h4 class="text-muted">Jadwal belum tersedia</h4>
                                                </div>
                                            @else
                                                <div class="card-body">
                                                    <p class="card-text">Atur Jadwal dan Media Belajar</p>
                                                    <form action="/detail_transaksi" method="post">
                                                        @csrf
                                                        <div class="btn-group d-grid gap-2 col-6 mx-auto w-75 mb-3" role="group">
                                                            <div class="form-floating">
                                                                <select class="form-select" name="tanggal_dipilih" id="floatingSelect" aria-label="Floating label select example">
                                                                    @foreach ($data_tanggal as $dj)
                                                                        <option value="{{ $dj['id'] }}">
                                                                            <?php 
                                                                                $tanggalwaktu = new datetime($dj['datetime']);
                                                                                $date = $tanggalwaktu->format('Y-m-d');
                                                                                $time = $tanggalwaktu->format('H:i:s');
                                                                            ?>
                                                                            <div class="container">
                                                                                Tanggal : {{ $date }}
                                                                                Jam     : {{ $time }}
                                                                            </div>
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="floatingSelect">Pilih Jadwal <i>T-B-H, J</i></label>
                                                            </div>
                                                        </div>
                                                        <div class="btn-group d-grid gap-2 col-6 mx-auto w-75 mb-3" role="group">
                                                                <div class="form-floating">
                                                                    <select class="form-select" name="media_dipilih" id="floatingSelect2" onchange="DateChange()" aria-label="Floating label select example">
                                                                        @foreach ($data_media as $media)
                                                                            <option value="{{ $media[1] }}">
                                                                                <div class="container">
                                                                                    {{ $media[1] }}
                                                                                </div>
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label for="floatingSelect2">Media Belajar</i></label>
                                                                </div>
                                                        </div>
                                                        <input type="hidden" name="id_jadwal" value="{{ $data_jadwal['id'] }}">
                                                        <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto w-75 mb-3" >Reservation</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                        @endif
                    </div>
                        

                </div>

                    

            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection





