@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Dashboard Pelanggan</h3>
            <p class="text-subtitle text-muted">
                Disini kamu bisa menambah, mengubah, dan menghapus data Pelanggan.
            </p>
        </div>
        <div class="col-12 col-md-6 text-end order-md-2 order-first">
            <a href="/dashboard/members/create" class="btn btn-primary">Tambah Pelanggan</a>
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
</section>

@endsection