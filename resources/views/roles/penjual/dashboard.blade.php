@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Penjual') }}</div>

                <div class="card-body">
                    <h5>Selamat datang, {{ Auth::user()->name }}!</h5>
                    <p>Anda login sebagai <strong>Penjual</strong></p>
                    
                    <div class="alert alert-warning" role="alert">
                        Ini adalah halaman dashboard untuk penjual. 
                        Di sini Anda dapat mengelola produk, melihat penjualan, dan statistik penjualan.
                    </div>

                    <div class="mt-4">
                        <h6>Menu Penjual</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">📦 Produk</h5>
                                        <p class="card-text">Kelola produk Anda</p>
                                        <a href="#" class="btn btn-sm btn-primary">Lihat Produk</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">📊 Penjualan</h5>
                                        <p class="card-text">Lihat laporan penjualan</p>
                                        <a href="#" class="btn btn-sm btn-primary">Lihat Laporan</a>
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
                            <li class="list-group-item"><strong>Role:</strong> <span class="badge bg-warning">{{ Auth::user()->role }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
