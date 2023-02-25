@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Dashboard Paket</h3>
            <p class="text-subtitle text-muted">
                Disini kamu bisa menambah, mengubah, dan menghapus data Paket.
            </p>
        </div>
        <div class="col-12 col-md-4 text-end order-md-2 order-first">
            <a href="/dashboard/transaksis/create" class="btn btn-primary">Buat Transaksi</a>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table" id="table1">
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
                            <button type="button" class="btn btn-danger btn-sm icon rounded-circle" data-bs-toggle="modal" data-bs-target="#hapus-{{ $transaksi->kode_invoice }}"><i class="bi bi-trash3"></i></button>
                            @include('dashboard.transaksi.delete')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection