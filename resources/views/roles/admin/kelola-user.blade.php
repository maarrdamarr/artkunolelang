@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('admin.kelola-user') }}">Kelola User</a>
    <a class="collapse-item" href="{{ route('admin.verifikasi-barang') }}">Verifikasi Barang</a>
    <a class="collapse-item" href="{{ route('admin.kelola-lelang') }}">Kelola Lelang</a>
    <a class="collapse-item" href="{{ route('admin.laporan') }}">Laporan</a>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Asep</td>
                            <td>asep@example.com</td>
                            <td>User</td>
                            <td><span class="badge badge-success">Aktif</span></td>
                            <td>
                                <button class="btn btn-sm btn-warning">Suspend</button>
                                <button class="btn btn-sm btn-danger">Ban</button>
                                <a class="btn btn-sm btn-info" href="#">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti</td>
                            <td>siti@example.com</td>
                            <td>Penjual</td>
                            <td><span class="badge badge-success">Aktif</span></td>
                            <td>
                                <button class="btn btn-sm btn-warning">Suspend</button>
                                <button class="btn btn-sm btn-danger">Ban</button>
                                <a class="btn btn-sm btn-info" href="#">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
