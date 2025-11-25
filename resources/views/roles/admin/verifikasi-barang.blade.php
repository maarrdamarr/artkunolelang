@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('admin.kelola-user') }}">Kelola User</a>
    <a class="collapse-item" href="{{ route('admin.kelola-lelang') }}">Kelola Lelang</a>
    <a class="collapse-item" href="{{ route('admin.laporan') }}">Laporan</a>
    <a class="collapse-item" href="{{ route('admin.verifikasi-barang') }}">Verifikasi Barang</a>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Verifikasi Barang</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang Menunggu Verifikasi</h6>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Penjual</th>
                            <th>Kategori</th>
                            <th>Tanggal Upload</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->user->name ?? '—' }}</td>
                                <td>{{ $item->category ?? '—' }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td><span class="badge badge-warning">{{ ucfirst($item->status) }}</span></td>
                                <td>
                                    <form action="{{ route('admin.item.approve', $item->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        <button class="btn btn-sm btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.item.reject', $item->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </form>
                                    <a href="#" class="btn btn-sm btn-info">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada barang menunggu verifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $items->links() }}
            </div>
        </div>
    </div>

@endsection
