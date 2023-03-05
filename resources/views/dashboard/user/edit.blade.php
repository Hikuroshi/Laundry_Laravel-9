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
            <form action="/dashboard/users/{{ $user->username }}" method="post">
                @csrf
                @method('put')
                
                <div class="form-group mb-3">
                    <label for="nama">Nama User <span class="text-danger">*</span></label>
                    <input name="nama" type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $user->nama) }}" placeholder="Masukan nama user..." autofocus>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input name="username" type="text" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" placeholder="Masukan username user...">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="Masukan email user...">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="outlet" class="form-label">Outlet <span class="text-danger">*</span></label>
                    <select name="outlet_id" id="outlet" class="form-select @error('outlet_id') is-invalid @enderror">
                        <option value="">Pilih Outlet</option>
                        @foreach ($outlets as $outlet)
                        <option value="{{ $outlet->id }}" @selected(old('outlet_id', $user->outlet_id) == $outlet->id)>
                            {{ $outlet->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('outlet_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label for="roles" class="form-label">Role <span class="text-danger">*</span></label>
                    <select name="roles" id="roles" class="form-select @error('roles') is-invalid @enderror">
                        <option value="">Pilih Role</option>
                        @foreach ($all_roles as $roles)
                        <option value="{{ $roles }}" @selected(old('roles', $user->roles) == $roles)>
                            {{ $roles }}
                        </option>
                        @endforeach
                    </select>
                    @error('roles')
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