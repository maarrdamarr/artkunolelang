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
    <a href="{{ route('admin.auctions.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Lelang
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

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
                    @forelse($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>Rp {{ number_format($item->start_price, 0, ',', '.') }}</td>
                        <td>
                            @if($item->status == 'pending')
                            <span class="badge badge-warning">Menunggu</span>
                            @elseif($item->status == 'active')
                            <span class="badge badge-success">Aktif</span>
                            @elseif($item->status == 'rejected')
                            <span class="badge badge-danger">Ditolak</span>
                            @elseif($item->status == 'completed')
                            <span class="badge badge-info">Selesai</span>
                            @endif
                        </td>
                        <td>{{ $item->bids->count() }}</td>
                        <td>
                            <a href="{{ route('admin.auctions.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.auctions.destroy', $item->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus lelang ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data lelang</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $items->links() }}
        </div>
    </div>
</div>

@endsection