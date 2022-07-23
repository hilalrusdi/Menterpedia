@extends('layouts.main')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-j95vR8Hf1jP5Ce65"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection

@section('content')
        <div class="mx-auto " style="width: 1080px;">
            <div class="container">
                <div class="row">

                    <!-- Elemet kiri -->
                    <div class="col-9 mt-3">
                        <nav class="navbar ">
                            <div class="col-6 border-bottom border-5 border-info pb-2 ">
                                Checkout
                            </div>
                            <div class="col-6 text-end border-3 border-bottom pb-2">
                                <i class="bi bi-person-circle"></i> UP70
                            </div>
                            
                            
                        </nav>

                        <main>
                            <h6 class="my-3">
                                TRANSAKSI
                            </h6>
                            <div class="card p-0 py-2 rounded" style="height: 500px;">

                                <!-- Navbar card -->
                                <div class="card-title border-bottom border-2">
                                    <div class="row">
                                        <div class="col-2">

                                            <!-- Foto Profil -->
                                            <figure class="figure rounded-circle ms-4 mt-3">
                                                <img src="{{ asset('storage/'.$data_pengajar['foto']) }}" alt="" class="figure-img img-fluid rounded rounded-circle" style="max-width: 60px;">
                                            </figure>
                                        </div>

                                        <!-- isi Navbar Card -->
                                        <div class="col-3 p-0">
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item border-0 p-1">
                                                    @foreach ($data_kategori as $kategori)
                                                        <span class="badge bg-info text-dark">{{ $kategori }}</span>
                                                    @endforeach
                                                </li>
                                                <li class="list-group-item border-0 p-1 text-muted">
                                                    {{ $data_pengajar['nama'] }}
                                                </li>
                                                <li class="list-group-item border-0 p-1 fw-bold">
                                                    Rp.{{ number_format($data_jadwal['harga'],2,',','.')  }},-
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <!-- Main Card -->
                                <div class="card-body ">
                                    <ul class="list-group ms-3">
                                        <li class="list-group-item border-0 p-0">
                                            <p class="col-9 float-start fw-bold">
                                                Rincian
                                            </p>
                                            
                                        </li>
                                        <li class="list-group-item border-0 p-0">
                                            <p class="col-9 float-start">
                                                Jadwal
                                            </p>
                                            <p class="col-3 float-end text-center ">
                                                {{ $data_tanggal['datetime'] }}
                                            </p>
                                        </li>
                                        <li class="list-group-item border-0 p-0">
                                            <p class="col-9 float-start">
                                                Media
                                            </p>
                                            <p class="col-3 float-end text-center">
                                                {{ $data_media['nama_media'] }}
                                            </p>
                                        </li>
                                        <li class="list-group-item border-3 p-0 border-top-0 border-end-0 border-start-0">
                                            <p class="col-9 float-start">
                                                Total Harga
                                            </p>
                                            <p class="col-3 float-end text-center">
                                                Rp.{{ number_format($data_jadwal['harga'],2,',','.')  }},-
                                            </p>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mt-3">
                                            <p class="col-9 float-start fw-bold">
                                                Total Harga
                                            </p>
                                            <p class="col-3 float-end text-center text-danger">
                                                Rp.{{ number_format($data_jadwal['harga'],2,',','.')  }},-
                                            </p>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </main>

                    </div>

                    <!-- Elemen kanan -->
                    <div class="col-3">
                        <div class="card" style="height: 619px;">
                            <div class="card-title m-3 border-bottom border-2 p-0">
                                <h6>
                                    Ringkasan Transaksi
                                </h6>
                                <!-- Foto Profil -->
                                <div class="text-center">
                                    <figure class="figure mt-3">
                                        <img src="logo.png" alt="" class="figure-img text-center" style="max-width: 142px;">
                                        <figcaption class="figure-caption">{{ $data_customer['nama'] }}</figcaption>
                                    </figure>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item border-3 p-0 border-top-0 border-start-0 border-end-0">
                                        <p class="col-7 float-start" style="font-size: 12px;">Total Harga</p>
                                        <p class="col-5 text-center float-end" style="font-size: 12px;">Rp.{{ number_format($data_jadwal['harga'],2,',','.')  }},-</p>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mt-3">
                                        <p class="col-7 float-start fw-bold" style="font-size: 12px;">Total Tagihan</p>
                                        <p class="col-5 text-center float-end fw-bold" style="font-size: 12px;">Rp.{{ number_format($data_jadwal['harga'],2,',','.')  }},-</p>
                                    </li>
                                </ul>
                                <button id="pay-button" class="btn btn-success col-12">Bayar</button>
                            </div>
                            
                            <form action="/detail_transaksi/post" id="submit_form" method="post">
                                @csrf
                                <input type="hidden" name="json" id="json_callback">
                                <input type="hidden" name="id_sesiBelajar" value="{{ $data_tanggal['id'] }}">
                                <input type="hidden" name="id_profil_pengajar"  value="{{ $data_pengajar['id'] }}">
                                <input type="hidden" name="id_profil_customer" value="{{ $data_customer['id'] }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snaptoken }}', {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                    send_respond_to_form(result);
                    },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!"); console.log(result);
                    send_respond_to_form(result);
                    },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                    send_respond_to_form(result);
                    },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                    send_respond_to_form(result);
                    }
            })
        })

        function send_respond_to_form(result){
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit_form').submit();
        }

    </script>
@endsection
