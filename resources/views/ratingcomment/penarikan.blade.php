@extends('layouts.main')
@include('partials.navbarpengajar')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/penarikan.css') }}">
    <style>
        .astext {
            background:none;
            border:none;
            margin:0;
            padding:0;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-2 border-end" style="height: 100vh">
            <div class="row  my-2">
                <div class="col-2 text-center">
                    
                </div>
                <div class="col text-center">
                    <img src="" class="img-thumbnail rounded-circle profil-pict" alt="">
                    <h5 class="h5 mt-3">Nama</h5>
                </div>
            </div>
            <a href="/jadwal" class="link">
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
            <a href="" class="link">
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
        <!-- Sidebar -->
        

        <main class="col">
            <div class="container row mx-2 mt-3">

                <!-- Penarikan Card -->
                <div class="card">
                    <div class="card-title mt-3 border-bottom border-2 pb-3">
                        <ul class="list-group text-center p-0">
                            <li class="list-group-item border-0 p-0 mt-3">
                                <h5 class="p-0 mb-2">Jumlah Saldo</h5>
                            </li>
                            <li class="list-group-item border-0 p-0 m-0">
                                <h3 class="fw-bold m-2">Rp1.000.000</h3>
                            </li>
                            <li class="list-group-item border-0 p-0 mt-3">
                                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addPenarikan">Tarik Saldo</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="fw-bold">Riwayat Permintaan Penarikan</p class="fw-bold">
                        </div>
                        <table class="table table-striped ">
                            <thead>
                                <th class="text-center w-50" style="background-color: #B983FF;" colspan="2">
                                    Berlangsung
                                </th>
                                <th class="text-center w-50" colspan="2">
                                    Selesai
                                </th>                             
                            </thead>
                            <tbody>
                                <th class="w-25 text-center">
                                    Waktu dan Tanggal
                                </th>
                                <th class="w-25 text-center">
                                    Nominal
                                </th>
                                <th class="w-25 text-center">
                                    Bank
                                </th>
                                <th class="w-25 text-center">
                                    Status
                                </th>

                                <!-- Silahkan di Foreach -->
                                <tr>
                                    <td>
                                        1 Juli 2022 - 10.00
                                    </td>
                                    <td>
                                        -200.000
                                    </td>
                                    <td>
                                        Bank Mandiri
                                    </td>
                                    <td class="text-danger">
                                        Pending
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1 Juli 2022 - 10.00
                                    </td>
                                    <td>
                                        -200.000
                                    </td>
                                    <td>
                                        Bank Mandiri
                                    </td>
                                    <td class="">
                                        Lunas
                                    </td>
                                </tr>
                                <!-- End Foreach -->

                            </tbody>
                            
                        </table>
                          
                          
                    </div>
                </div>
                <!-- Penarikan Card -->

            </div>
        </main>


        <!-- Modal addPenarikan -->
        <div class="modal fade " id="addPenarikan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded rounded-5">
                <div class="modal-content">
                    <div class="p-3 text-center" style="background-color: #B983FF;">
                        <h5 class="text-center fw-bold " id="exampleModalLabel" >Penarikan</h5>
                    </div>
    
                    <div class="modal-body shadow border-bottom border-4 mb-2">
                        <div class="container pb-2 ">
                            <ul class="list-group">
                                <li class="list-group-item border-0 p-0 mb-1">
                                    <h6 class="float-start fw-bold">Saldo</h6>
                                    <h6 class="float-end fw-bold">Rp. 1.000.000</h6>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <h6 class="float-start fw-bold">Nominal Penarikan</h6>
                                    <a class="float-end">Semua</a>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <input type="text" class="form-control" name="" id="">
                                </li>
                                
                                
                            </ul>
                            
                            
                        </div>
                    
                    
                    </div>
                    <div class="modal-body shadow border-bottom border-4">
                        <div class="container pb-2 ">
                            <ul class="list-group">
                                <li class="list-group-item border-0 p-0">
                                    <h6 class="float-start fw-bold">No. Rekening</h6>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <input type="text" class="form-control" name="" id="">
                                </li>
                                <li class="list-group-item border-0 p-0 mt-2">
                                    <h6 class="float-start fw-bold">Bank</h6>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Bank Mandiri
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          BNI
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          BRI
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          BCA
                                        </label>
                                      </div>
                                </li>
                                
                            </ul>
                            
                            
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <div class="mx-auto">
                            <button type="button" class="btn btn-primary">Tarik Saldo</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection