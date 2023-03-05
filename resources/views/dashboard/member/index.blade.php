@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center mb-3 mb-sm-0">
        <div class="col-12 col-md-8">
            <h3>Dashboard Pelanggan</h3>
            <p class="text-subtitle text-muted">
                Disini kamu bisa menambah, mengubah, dan menghapus data Pelanggan.
            </p>
        </div>
        <div class="col-12 col-md-4 text-end">
            <div class="d-sm-block d-grid gap-2">
                <a href="/dashboard/members/create" class="btn btn-primary btn-sm">Tambah Pelanggan</a>
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
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->nama }}</td>
                            <td>{{ $member->alamat }}</td>
                            <td>{{ $member->jenis_kelamin }}</td>
                            <td>{{ $member->telepon }}</td>
                            <td>
                                <a href="/dashboard/members/{{ $member->slug }}/edit" class="btn btn-primary btn-sm icon rounded-circle"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-danger btn-sm icon rounded-circle" data-bs-toggle="modal" data-bs-target="#hapus-{{ $member->slug }}"><i class="bi bi-trash3"></i></button>
                                @include('dashboard.member.delete')
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