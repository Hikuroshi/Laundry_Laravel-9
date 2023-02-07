@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Dashboard Paket</h3>
            <p class="text-subtitle text-muted">
                Disini kamu bisa menambah, mengubah, dan menghapus data Paket.
            </p>
        </div>
        <div class="col-12 col-md-6 text-end order-md-2 order-first">
            <a href="/dashboard/pakets/create" class="btn btn-primary">Tambah Paket</a>
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
                        <th>Nama</th>
                        <th>Outlet</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pakets as $paket)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $paket->nama }}</td>
                        <td>{{ $paket->outlet->nama }}</td>
                        <td>{{ $paket->jenis }}</td>
                        <td>{{ $paket->harga }}</td>
                        <td>
                            <a href="/dashboard/pakets/{{ $paket->slug }}/edit" class="btn btn-primary btn-sm icon rounded-circle"><i class="bi bi-pencil"></i></a>
                            <button type="button" class="btn btn-danger btn-sm icon rounded-circle" data-bs-toggle="modal" data-bs-target="#hapus-{{ $paket->slug }}"><i class="bi bi-trash3"></i></button>
                            @include('dashboard.paket.delete')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection