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
        <h1 class="h3 mb-0 text-gray-800">Riwayat Bid</h1>
        <a href="{{ route('user.dashboard') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>

    <!-- Filter -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="active">Aktif</option>
                        <option value="won">Menang</option>
                        <option value="lost">Kalah</option>
                        <option value="completed">Selesai</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Cari barang..." id="searchInput">
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" id="dateFilter">
                </div>
            </div>
        </div>
    </div>

    <!-- Bid History Table -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Barang</th>
                            <th>Bid Saya</th>
                            <th>Bid Tertinggi</th>
                            <th>Waktu Bid</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Vas Keramik Antik Dinasti Ming</strong>
                                <br><small class="text-muted">Keramik</small>
                            </td>
                            <td>Rp 750,000</td>
                            <td>Rp 750,000</td>
                            <td>25 Nov 2025, 10:30</td>
                            <td>
                                <span class="badge badge-warning">Aktif</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-primary">Lihat</a>
                                <button class="btn btn-xs btn-danger" onclick="increaseBid()">Bid Lagi</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Wayang Kulit Klasik Jawa</strong>
                                <br><small class="text-muted">Wayang</small>
                            </td>
                            <td>Rp 400,000</td>
                            <td>Rp 450,000</td>
                            <td>24 Nov 2025, 15:45</td>
                            <td>
                                <span class="badge badge-danger">Kalah</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-primary">Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Patung Batu Nisan Bali</strong>
                                <br><small class="text-muted">Patung</small>
                            </td>
                            <td>Rp 1,250,000</td>
                            <td>Rp 1,250,000</td>
                            <td>22 Nov 2025, 09:15</td>
                            <td>
                                <span class="badge badge-success">Menang</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-primary">Lihat</a>
                                <a href="#" class="btn btn-xs btn-warning">Bayar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Perhiasan Emas Antik</strong>
                                <br><small class="text-muted">Perhiasan</small>
                            </td>
                            <td>Rp 3,000,000</td>
                            <td>Rp 3,500,000</td>
                            <td>20 Nov 2025, 14:20</td>
                            <td>
                                <span class="badge badge-danger">Kalah</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-primary">Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Batik Tradisional Cirebon</strong>
                                <br><small class="text-muted">Tekstil</small>
                            </td>
                            <td>Rp 600,000</td>
                            <td>Rp 600,000</td>
                            <td>18 Nov 2025, 11:00</td>
                            <td>
                                <span class="badge badge-info">Selesai</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-primary">Lihat</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row mt-4">
        <div class="col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-primary font-weight-bold text-uppercase mb-1">
                        Total Bid</div>
                    <div class="h3 mb-0 text-gray-800">15</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-success font-weight-bold text-uppercase mb-1">
                        Bid Menang</div>
                    <div class="h3 mb-0 text-gray-800">3</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-danger font-weight-bold text-uppercase mb-1">
                        Bid Kalah</div>
                    <div class="h3 mb-0 text-gray-800">12</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-info font-weight-bold text-uppercase mb-1">
                        Tingkat Menang</div>
                    <div class="h3 mb-0 text-gray-800">20%</div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function increaseBid() {
            alert('Fitur increase bid akan diimplementasikan');
            // TODO: Implement actual bid increase functionality
        }
    </script>
@endpush
