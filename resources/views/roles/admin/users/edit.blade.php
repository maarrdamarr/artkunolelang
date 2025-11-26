@extends('layouts.sb-admin')

@section('menu-items')
<a class="collapse-item" href="{{ route('admin.kelola-user') }}">Kelola User</a>
<a class="collapse-item" href="{{ route('admin.verifikasi-barang') }}">Verifikasi Barang</a>
<a class="collapse-item" href="{{ route('admin.kelola-lelang') }}">Kelola Lelang</a>
<a class="collapse-item" href="{{ route('admin.laporan') }}">Laporan</a>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
    <a href="{{ route('admin.kelola-user') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Password (Kosongkan jika tidak ingin mengganti)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="admin" {{ (old('role', $user->role) == 'admin') ? 'selected' : '' }}>Admin</option>
                    <option value="penjual" {{ (old('role', $user->role) == 'penjual') ? 'selected' : '' }}>Penjual</option>
                    <option value="user" {{ (old('role', $user->role) == 'user') ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

@endsection