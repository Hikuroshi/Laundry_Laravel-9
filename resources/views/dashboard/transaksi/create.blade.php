@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Buat Transaksi baru</h3>
            <p class="text-subtitle text-muted">
                Pastiin data yang kamu masukin udah benar yaa
            </p>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/transaksis" method="post">
                @csrf
                
                <div class="form-group mb-4">
                    <label for="member" class="form-label">Member <span class="text-danger">*</span></label>
                    <select name="member_id" id="member" class="form-control @error('member_id') is-invalid @enderror">
                        <option value="">Pilih Member</option>
                        @foreach ($members as $member)
                        <option value="{{ $member->id }}" @selected(old('member_id') == $member->id)>
                            {{ $member->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('member_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label for="paket" class="form-label">Paket <span class="text-danger">*</span></label>
                    <select name="paket_id" id="paket" class="form-control @error('paket_id') is-invalid @enderror">
                        <option value="">Pilih Paket</option>
                        @foreach ($pakets as $paket)
                        <option value="{{ $paket->id }}" @selected(old('paket_id') == $paket->id)>
                            {{ $paket->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('paket_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="qty">QTY <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input name="qty" type="number" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}" placeholder="Masukan qty...">
                        <span class="input-group-text">Kg</span>
                        @error('qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group mb-3">
                    <label for="biaya_tambahan">Biaya tambahan <span class="text-danger">*</span></label>
                    <input name="biaya_tambahan" type="number" id="biaya_tambahan" class="form-control @error('biaya_tambahan') is-invalid @enderror" value="{{ old('biaya_tambahan') }}" placeholder="Masukan biaya tambahan...">
                    @error('biaya_tambahan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="diskon">Diskon <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input name="diskon" type="number" id="diskon" class="form-control @error('diskon') is-invalid @enderror" value="{{ old('diskon') }}" placeholder="Masukan diskon...">
                        <span class="input-group-text">%</span>
                        @error('diskon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group mb-4">
                    <label for="dibayar" class="form-label">Status pembayaran <span class="text-danger">*</span></label>
                    <select name="dibayar" id="dibayar" class="form-control @error('dibayar') is-invalid @enderror">
                        <option value="">Sudah / Belum</option>
                        @foreach ($all_dibayar as $dibayar)
                        <option value="{{ $dibayar }}" @selected(old('dibayar') == $dibayar)>
                            {{ $dibayar }}
                        </option>
                        @endforeach
                    </select>
                    @error('dibayar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3" placeholder="Masukan keterangan transaksi...">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
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