@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/dummylogin.css">    
@endsection

@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin">
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            <form>
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
            <small class="d-block text-center">Belum punya akun ? <a href="/register">Daftar Sekarang!</a></small>
        </main>
    </div>
</div>
@endsection