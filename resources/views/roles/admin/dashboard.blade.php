@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Admin') }}</div>

                <div class="card-body">
                    <h5>Selamat datang, {{ Auth::user()->name }}!</h5>
                    <p>Anda login sebagai <strong>Admin</strong></p>
                    
                    <div class="alert alert-danger" role="alert">
                        Ini adalah halaman dashboard admin. 
                        Di sini Anda dapat mengelola semua pengguna, penjual, konten, dan sistem.
                    </div>

                    <div class="mt-4">
                        <h6>Menu Admin</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">👥 Kelola User</h5>
                                        <p class="card-text">Manage semua user</p>
                                        <a href="#" class="btn btn-sm btn-danger">Lihat User</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">🏪 Kelola Penjual</h5>
                                        <p class="card-text">Manage semua penjual</p>
                                        <a href="#" class="btn btn-sm btn-danger">Lihat Penjual</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">📋 Konten</h5>
                                        <p class="card-text">Kelola konten sistem</p>
                                        <a href="#" class="btn btn-sm btn-danger">Lihat Konten</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">⚙️ Pengaturan</h5>
                                        <p class="card-text">Pengaturan sistem</p>
                                        <a href="#" class="btn btn-sm btn-danger">Pengaturan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h6>Informasi Akun</h6>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                            <li class="list-group-item"><strong>Role:</strong> <span class="badge bg-danger">{{ Auth::user()->role }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
