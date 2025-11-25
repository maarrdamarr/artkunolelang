@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('user.browse') }}">Browse Lelang</a>
    <a class="collapse-item" href="{{ route('user.bid-history') }}">Riwayat Bid</a>
    <a class="collapse-item" href="{{ route('user.watchlist') }}">Watchlist</a>
    <a class="collapse-item" href="#">Transaksi Saya</a>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Pembeli</h1>
        <a href="{{ route('user.browse') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Jelajahi Lelang
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Card - Lelang Aktif -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-primary font-weight-bold text-uppercase mb-1">
                        Lelang Aktif</div>
                    <div class="h3 mb-0 text-gray-800">24</div>
                </div>
            </div>
        </div>

        <!-- Card - Bid Saya -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-success font-weight-bold text-uppercase mb-1">
                        Bid Saya</div>
                    <div class="h3 mb-0 text-gray-800">8</div>
                </div>
            </div>
        </div>

        <!-- Card - Menang -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-info font-weight-bold text-uppercase mb-1">
                        Barang Menang</div>
                    <div class="h3 mb-0 text-gray-800">3</div>
                </div>
            </div>
        </div>

        <!-- Card - Watchlist -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-warning font-weight-bold text-uppercase mb-1">
                        Watchlist</div>
                    <div class="h3 mb-0 text-gray-800">12</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Lelang Terbaru -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lelang Terbaru</h6>
                    <a href="{{ route('user.browse') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Harga Awal</th>
                                    <th>Bid Tertinggi</th>
                                    <th>Berakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>Vas Keramik Antik</strong>
                                        <br><small class="text-muted">Dinasti Ming</small>
                                    </td>
                                    <td>Rp 500,000</td>
                                    <td>Rp 750,000</td>
                                    <td><small>2 Jam</small></td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-primary">Lihat</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Wayang Kulit Klasik</strong>
                                        <br><small class="text-muted">Jawa</small>
                                    </td>
                                    <td>Rp 300,000</td>
                                    <td>Rp 450,000</td>
                                    <td><small>5 Jam</small></td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-primary">Lihat</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Patung Batu Nisan</strong>
                                        <br><small class="text-muted">Bali</small>
                                    </td>
                                    <td>Rp 1,000,000</td>
                                    <td>Rp 1,250,000</td>
                                    <td><small>1 Hari</small></td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-primary">Lihat</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card - Informasi Profil -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Profil</h6>
                </div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Role:</strong> <span class="badge badge-primary">Pembeli</span></p>
                    <p><strong>Status:</strong> <span class="badge badge-success">Terverifikasi</span></p>
                    <p><strong>Bergabung:</strong> 25 November 2025</p>
                    <hr>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary btn-block">Edit Profil</a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('user.browse') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-search"></i> Cari Barang
                        </a>
                        <a href="{{ route('user.watchlist') }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-heart"></i> Watchlist Saya
                        </a>
                        <a href="{{ route('user.bid-history') }}" class="btn btn-sm btn-info">
                            <i class="fas fa-history"></i> Riwayat Bid
                        </a>
                        <a href="#" class="btn btn-sm btn-success">
                            <i class="fas fa-receipt"></i> Transaksi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Statistik Bidding -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Bidding</h6>
                </div>
                <div class="card-body">
                    <div class="small mb-2">
                        <strong>Total Bid Terpasang:</strong> 15
                    </div>
                    <div class="small mb-2">
                        <strong>Bid Menang:</strong> 3
                    </div>
                    <div class="small mb-2">
                        <strong>Bid Kalah:</strong> 12
                    </div>
                    <div class="small">
                        <strong>Tingkat Kemenangan:</strong> 20%
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips & Info -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tips & Informasi</h6>
                </div>
                <div class="card-body small">
                    <div class="mb-2">
                        <strong>💡 Tip:</strong> Pantau watchlist Anda untuk tidak ketinggalan lelang favorit!
                    </div>
                    <div class="mb-2">
                        <strong>💡 Tip:</strong> Verifikasi identitas untuk meningkatkan kepercayaan penjual.
                    </div>
                    <div>
                        <strong>ℹ️ Info:</strong> Pembayaran harus dilakukan dalam 24 jam setelah menang lelang.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

