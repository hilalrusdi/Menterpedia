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

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID_USER</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NOMOR HP</th>
                        <th scope="col">STATUS AKUN</th>
                        <th scope="col">TOOL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                        <a href="">
                            <tr>
                                <th scope="row">{{ $data['id_user'] }}</th>
                                <td>{{ $data['nama'] }}</td>
                                <td>{{ $data['nomer_hp'] }}</td>
                                <td>{{ $data['status_akun'] }}</td>
                                <td>
                                    <form action="/adm/verif/detail" method="post">
                                        @csrf
                                        <input type="hidden" name="tkn" value="{{ $tkn }}">
                                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                                        <input type="hidden" name="id_user" value="{{ $data['id_user'] }}">
                                        <button type="submit" class="astext">Verifikasi Profil</button>
                                    </form>
                                </td>
                            </tr>
                        </a>
                    @endforeach
                </tbody>
            </table>
        </div>

    </body>
@endsection