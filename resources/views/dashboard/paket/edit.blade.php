@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Perbarui Outlet {{ $paket->nama }}</h3>
            <p class="text-subtitle text-muted">
                Pastiin data yang kamu masukin udah benar yaa
            </p>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/pakets/{{ $paket->slug }}" method="post">
                @csrf
                @method('put')
                
                <div class="form-group mb-3">
                    <label for="nama">Nama Outlet <span class="text-danger">*</span></label>
                    <input name="nama" type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $paket->nama) }}" placeholder="Masukan nama paket..." autofocus>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label for="outlet" class="form-label">Outlet <span class="text-danger">*</span></label>
                    <select name="outlet_id" id="outlet" class="form-control @error('outlet_id') is-invalid @enderror">
                        <option value="">Pilih Outlet</option>
                        @foreach ($outlets as $outlet)
                        <option value="{{ $outlet->id }}" @selected(old('outlet_id', $paket->outlet_id) == $outlet->id)>
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
                    <label for="jenis" class="form-label">Jenis <span class="text-danger">*</span></label>
                    <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
                        <option value="">Pilih Jenis</option>
                        @foreach ($jenis_paket as $jenis)
                        <option value="{{ $jenis }}" @selected(old('jenis', $paket->jenis) == $jenis)>
                            {{ $jenis }}
                        </option>
                        @endforeach
                    </select>
                    @error('jenis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="harga">Nomor Telepon <span class="text-danger">*</span></label>
                    <input name="harga" type="number" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $paket->harga) }}" placeholder="Masukan nomor harga...">
                    @error('harga')
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