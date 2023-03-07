@extends('layouts.main')

@section('container')
<div id="auth">
    <div class="row">
        <div class="col-lg-5 col-12 m-auto">
            <h1 class="auth-title">Masuk.</h1>
            <p class="auth-subtitle mb-5">
                Masuk pake data yang kamu inputkan saat <a href="/register" class="text-decoration-none text-body">daftar</a> ya.
            </p>
            
            <form action="/login" method="post">
                @csrf

                <div class="form-group position-relative has-icon-left mb-4">
                    <input name="login" type="text" class="form-control form-control-xl" placeholder="Username atau Email"/>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input name="password" type="password" class="form-control form-control-xl" placeholder="Password"/>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input name="remember_token" class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault"/>
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">Buat aku tetap masuk.</label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</div>

@endsection