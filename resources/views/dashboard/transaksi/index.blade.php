@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center mb-3 mb-sm-0">
        <div class="col-12 col-md-8">
            <h3>Dashboard Paket</h3>
            <p class="text-subtitle text-muted">
                Disini kamu bisa menambah, mengubah, dan menghapus data Paket.
            </p>
        </div>
        <div class="col-12 col-md-4 text-end">
            <div class="d-sm-block d-grid gap-2">
                <a href="/dashboard/transaksis/create" class="btn btn-primary btn-sm mb-0 mb-md-2">Buat Transaksi</a>
                <a href="/dashboard/transaksis/export" class="btn btn-primary btn-sm mb-0 mb-md-2">Unduh Laporan</a>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="col-md-6 m-auto">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible show fade text-center" id="notify-msg">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1" style="white-space: nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Kode Invoice</th>
                            <th>Outlet</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->member->nama }}</td>
                            <td>{{ $transaksi->kode_invoice }}</td>
                            <td>{{ $transaksi->outlet->nama }}</td>
                            <td>{{ $transaksi->tgl }}</td>
                            <td>{{ $transaksi->status }}</td>
                            <td>{{ $transaksi->dibayar }}</td>
                            <td>
                                <a href="/dashboard/transaksis/{{ $transaksi->kode_invoice }}" class="btn btn-primary btn-sm icon rounded-circle"><i class="bi bi-eye"></i></a>
                                @can('Admin')
                                <button type="button" class="btn btn-danger btn-sm icon rounded-circle" data-bs-toggle="modal" data-bs-target="#hapus-{{ $transaksi->kode_invoice }}"><i class="bi bi-trash3"></i></button>
                                @include('dashboard.transaksi.delete')
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection