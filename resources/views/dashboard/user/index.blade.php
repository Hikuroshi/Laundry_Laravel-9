@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center mb-3 mb-sm-0">
        <div class="col-12 col-md-6">
            <h3>Dashboard User</h3>
            <p class="text-subtitle text-muted">
                Disini kamu bisa menambah, mengubah, dan menghapus data User.
            </p>
        </div>
        <div class="col-12 col-md-6 text-end">
            <div class="d-sm-block d-grid gap-2">
                <a href="/dashboard/users/create" class="btn btn-primary btn-sm">Tambah User</a>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1" style="white-space: nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Outlet</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->outlet->nama }}</td>
                            <td>{{ $user->roles }}</td>
                            <td>
                                <a href="/dashboard/users/{{ $user->username }}/edit-password" class="btn btn-primary btn-sm icon rounded-circle"><i class="bi bi-key"></i></a>
                                <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-primary btn-sm icon rounded-circle"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-danger btn-sm icon rounded-circle" data-bs-toggle="modal" data-bs-target="#hapus-{{ $user->username }}"><i class="bi bi-trash3"></i></button>
                                @include('dashboard.user.delete')
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