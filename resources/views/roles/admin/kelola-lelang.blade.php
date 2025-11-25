@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('admin.kelola-user') }}">Kelola User</a>
    <a class="collapse-item" href="{{ route('admin.verifikasi-barang') }}">Verifikasi Barang</a>
    <a class="collapse-item" href="{{ route('admin.kelola-lelang') }}">Kelola Lelang</a>
    <a class="collapse-item" href="{{ route('admin.laporan') }}">Laporan</a>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Lelang</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Lelang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Penjual</th>
                            <th>Harga Awal</th>
                            <th>Status</th>
                            <th>Peserta</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Vas Tiongkok</td>
                            <td>Slamet</td>
                            <td>Rp 100.000</td>
                            <td><span class="badge badge-success">Aktif</span></td>
                            <td>12</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Detail</a>
                                <button class="btn btn-sm btn-warning">Hentikan</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Keramik Antik</td>
                            <td>Lina</td>
                            <td>Rp 250.000</td>
                            <td><span class="badge badge-warning">Menunggu</span></td>
                            <td>0</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Detail</a>
                                <button class="btn btn-sm btn-success">Mulai</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
