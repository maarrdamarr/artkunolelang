@extends('layouts.sb-admin')

@section('menu-items')
<a class="collapse-item" href="{{ route('admin.kelola-user') }}">Kelola User</a>
<a class="collapse-item" href="{{ route('admin.verifikasi-barang') }}">Verifikasi Barang</a>
<a class="collapse-item" href="{{ route('admin.kelola-lelang') }}">Kelola Lelang</a>
<a class="collapse-item" href="{{ route('admin.laporan') }}">Laporan</a>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Lelang</h1>
    <a href="{{ route('admin.kelola-lelang') }}" class="btn btn-secondary btn-sm">
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
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Lelang</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.auctions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Penjual</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Pilih Penjual</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="category">Kategori</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description"
                    rows="4">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="start_price">Harga Awal (Rp)</label>
                <input type="number" class="form-control" id="start_price" name="start_price"
                    value="{{ old('start_price') }}" min="0" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection