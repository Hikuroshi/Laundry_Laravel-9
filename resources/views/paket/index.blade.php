@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-5">
    <div class="col-md-6">
        <form action="/pakets">
            <div class="input-group">
                <span class="input-group-text align-top pb-3" id="basic-addon2"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control" placeholder="Cari paket..." aria-label="Cari paket..." aria-describedby="button-addon2" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Filter</span>
                </button>
                <ul class="dropdown-menu">
                    @foreach ($all_jenis as $jenis)
                        <li><a class="dropdown-item" href="/pakets?search={{ $jenis }}">{{ $jenis }}</a></li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
</div>

@if ($pakets->count())
<div class="row row-cols-1 row-cols-lg-2 g-4">
    @foreach ($pakets as $paket)
    <div class="col">
        <div class="card border border-dark">
            <h3 class="card-header border-bottom border-secondary d-inline">{{ $paket->nama }}</h3>
            <div class="card-body pt-4">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <h5>Jenis</h5>
                        <p>{{ $paket->jenis }}</p>
                    </div>
                    <div class="col">
                        <h5>Harga</h5>
                        <p>Rp.{{ number_format($paket->harga, 2) }}</p>
                    </div>
                    <div class="col">
                        <h5>Outlet</h5>
                        <p>{{ $paket->outlet->nama }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<h4 class="d-flex justify-content-center align-items-center fw-bold" style="margin: 30vh 0 30vh 0;">Paket tidak ditemukan</h4>
@endif
<div class="d-flex justify-content-end">
    {{ $pakets->links() }}
</div>
@endsection