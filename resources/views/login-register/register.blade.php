@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah User baru</h3>
            <p class="text-subtitle text-muted">
                Pastiin data yang kamu masukin udah benar yaa
            </p>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/register" method="post">
                @csrf
                
                <div class="form-group mb-3">
                    <label for="nama">Nama User <span class="text-danger">*</span></label>
                    <input name="nama" type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukan nama user..." autofocus>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input name="username" type="text" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukan username user...">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukan email user...">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukan password user...">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation">Password konfirmasi <span class="text-danger">*</span></label>
                    <input name="password_confirmation" type="password" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Masukan password konfirmasi user...">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection