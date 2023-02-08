@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Perbarui User {{ $user->nama }}</h3>
            <p class="text-subtitle text-muted">
                Pastiin data yang kamu masukin udah benar yaa
            </p>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/users/{{ $user->username }}/edit-password" method="post">
                @csrf
                @method('put')

                <div class="form-group mb-3">
                    <label for="password">Password baru <span class="text-danger">*</span></label>
                    <input name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukan password baru..." autofocus>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation">Password konfirmasi <span class="text-danger">*</span></label>
                    <input name="password_confirmation" type="password" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Masukan password konfirmasi...">
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
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection