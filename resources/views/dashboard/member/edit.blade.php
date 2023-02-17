@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Perbarui Outlet {{ $outlet->nama }}</h3>
            <p class="text-subtitle text-muted">
                Pastiin data yang kamu masukin udah benar yaa
            </p>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/members/{{ $outlet->slug }}" method="post">
                @csrf
                @method('put')
                
                <div class="form-group mb-3">
                    <label for="nama">Nama Outlet <span class="text-danger">*</span></label>
                    <input name="nama" type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $outlet->nama) }}" placeholder="Masukan nama outlet..." autofocus>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" placeholder="Masukan alamat outlet...">{{ old('alamat', $outlet->alamat) }}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="jenis_kelamin" class="form-label">Jenis kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih Jenis kelamin</option>
                        @foreach ($all_jenis_kelamin as $jenis_kelamin)
                        <option value="{{ $jenis_kelamin }}" @selected(old('jenis_kelamin', $paket->jenis_kelamin) == $jenis_kelamin)>
                            {{ $jenis_kelamin }}
                        </option>
                        @endforeach
                    </select>
                    @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="telepon">Nomor Telepon <span class="text-danger">*</span></label>
                    <input name="telepon" type="number" id="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $outlet->telepon) }}" placeholder="Masukan nomor telepon...">
                    @error('telepon')
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