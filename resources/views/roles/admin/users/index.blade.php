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
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah User
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
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role == 'admin')
                            <span class="badge badge-danger">Admin</span>
                            @elseif($user->role == 'penjual')
                            <span class="badge badge-warning">Penjual</span>
                            @else
                            <span class="badge badge-info">User</span>
                            @endif
                        </td>
                        <td>
                            @if($user->email_verified_at)
                            <span class="badge badge-success">Aktif</span>
                            @else
                            <span class="badge badge-secondary">Belum Verifikasi</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-info">Edit</a>
                            @if(Auth::id() != $user->id)
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pengguna</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection