@extends('layouts.main')

@section('container')
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12 m-auto">
            <h1 class="auth-title">Masuk.</h1>
            <p class="auth-subtitle mb-5">
                Masuk pake data yang kamu inputkan saat <a href="/register" class="text-decoration-none text-body">daftar</a> ya.
            </p>
            
            <form action="index.html">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Username atau Email"/>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password"/>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault"/>
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">Buat aku tetap masuk.</label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                    Masuk
                </button>
            </form>
            <div class="text-center mt-3 text-lg fs-6">
                <p class="text-gray-600">
                    Belum punya akun?
                    <a href="auth-register.html" class="font-bold">Daftar disini</a>.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection