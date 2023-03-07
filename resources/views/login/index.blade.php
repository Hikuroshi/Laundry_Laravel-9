@extends('layouts.main')

@section('container')
<div id="auth">
    <div class="row align-items-center" style="height: 60vh;">
        <div class="col-lg-5 col-12 m-auto">
            <h1 class="auth-title">Masuk.</h1>
            <p class="auth-subtitle mb-4">
                Masuk pake data yang kamu inputkan saat <a href="/register" class="text-decoration-none text-body">daftar</a> ya.
            </p>
            
            @if(session()->has('loginError'))
            <div id="notify" class="alert alert-danger">{{ session('loginError') }}</div>
            @endif
            
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
                    <input name="remember" class="form-check-input me-2" type="checkbox" id="remember"/>
                    <label class="form-check-label text-gray-600" for="remember">Buat aku tetap masuk.</label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</div>
@endsection