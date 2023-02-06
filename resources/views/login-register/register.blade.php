@extends('layouts.main')

@section('container')
<div class="row h-100">
    <div class="col-lg-5 col-12 m-auto">
        <h1 class="auth-title">Daftar.</h1>
        <p class="auth-subtitle mb-5">
            Isi data dulu ya biar kita saling kenal.
        </p>
        
        <form action="index.html">
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Email">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Username">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Confirm Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                Daftar
            </button>
        </form>
        <div class="text-center mt-3 text-lg fs-6">
            <p class="text-gray-600">
                Udah punya akun?
                <a href="auth-login.html" class="font-bold">Masuk sini</a>.
            </p>
        </div>
    </div>
</div>

@endsection