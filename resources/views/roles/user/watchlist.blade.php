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
        <h1 class="h3 mb-0 text-gray-800">Watchlist Saya</h1>
        <a href="{{ route('user.browse') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-shopping-search fa-sm"></i> Cari Barang
        </a>
    </div>

    <!-- Info Card -->
    <div class="alert alert-info" role="alert">
        <i class="fas fa-info-circle"></i> Watchlist Anda berisi 5 barang. Pantau terus untuk tidak ketinggalan lelang favorit!
    </div>

    <!-- Watchlist Items -->
    <div class="row">
        <!-- Item 1 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="position-relative">
                    <img src="https://via.placeholder.com/300x200?text=Vas+Keramik" class="card-img-top" alt="Vas Keramik" style="height: 200px; object-fit: cover;">
                    <span class="badge badge-danger position-absolute" style="top: 10px; right: 10px;">
                        2 jam
                    </span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Vas Keramik Antik Dinasti Ming</h6>
                    <p class="card-text small text-muted">Toko Antik Jaya</p>

                    <div class="mb-2">
                        <small class="text-gray-600">Harga Awal</small>
                        <div class="text-warning font-weight-bold">Rp 500,000</div>
                    </div>

                    <div class="mb-3">
                        <small class="text-gray-600">Bid Tertinggi</small>
                        <div class="text-success font-weight-bold">Rp 750,000</div>
                        <small class="text-muted">(12 bid)</small>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('user.item-detail', 1) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <button class="btn btn-outline-danger btn-sm" onclick="removeFromWatchlist(1)">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="position-relative">
                    <img src="https://via.placeholder.com/300x200?text=Wayang+Kulit" class="card-img-top" alt="Wayang" style="height: 200px; object-fit: cover;">
                    <span class="badge badge-danger position-absolute" style="top: 10px; right: 10px;">
                        5 jam
                    </span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wayang Kulit Klasik Jawa</h6>
                    <p class="card-text small text-muted">Koleksi Wayang Indah</p>

                    <div class="mb-2">
                        <small class="text-gray-600">Harga Awal</small>
                        <div class="text-warning font-weight-bold">Rp 300,000</div>
                    </div>

                    <div class="mb-3">
                        <small class="text-gray-600">Bid Tertinggi</small>
                        <div class="text-success font-weight-bold">Rp 450,000</div>
                        <small class="text-muted">(8 bid)</small>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('user.item-detail', 2) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <button class="btn btn-outline-danger btn-sm" onclick="removeFromWatchlist(2)">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="position-relative">
                    <img src="https://via.placeholder.com/300x200?text=Patung+Batu" class="card-img-top" alt="Patung" style="height: 200px; object-fit: cover;">
                    <span class="badge badge-danger position-absolute" style="top: 10px; right: 10px;">
                        1 hari
                    </span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Patung Batu Nisan Bali</h6>
                    <p class="card-text small text-muted">Galeri Bali Heritage</p>

                    <div class="mb-2">
                        <small class="text-gray-600">Harga Awal</small>
                        <div class="text-warning font-weight-bold">Rp 1,000,000</div>
                    </div>

                    <div class="mb-3">
                        <small class="text-gray-600">Bid Tertinggi</small>
                        <div class="text-success font-weight-bold">Rp 1,250,000</div>
                        <small class="text-muted">(5 bid)</small>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('user.item-detail', 3) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <button class="btn btn-outline-danger btn-sm" onclick="removeFromWatchlist(3)">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="position-relative">
                    <img src="https://via.placeholder.com/300x200?text=Perhiasan+Emas" class="card-img-top" alt="Perhiasan" style="height: 200px; object-fit: cover;">
                    <span class="badge badge-danger position-absolute" style="top: 10px; right: 10px;">
                        12 jam
                    </span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Perhiasan Emas Antik</h6>
                    <p class="card-text small text-muted">Toko Emas Pusaka</p>

                    <div class="mb-2">
                        <small class="text-gray-600">Harga Awal</small>
                        <div class="text-warning font-weight-bold">Rp 2,000,000</div>
                    </div>

                    <div class="mb-3">
                        <small class="text-gray-600">Bid Tertinggi</small>
                        <div class="text-success font-weight-bold">Rp 3,500,000</div>
                        <small class="text-muted">(15 bid)</small>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('user.item-detail', 4) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <button class="btn btn-outline-danger btn-sm" onclick="removeFromWatchlist(4)">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 5 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="position-relative">
                    <img src="https://via.placeholder.com/300x200?text=Batik+Cirebon" class="card-img-top" alt="Batik" style="height: 200px; object-fit: cover;">
                    <span class="badge badge-danger position-absolute" style="top: 10px; right: 10px;">
                        3 jam
                    </span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Batik Tradisional Cirebon</h6>
                    <p class="card-text small text-muted">Batik Heritage</p>

                    <div class="mb-2">
                        <small class="text-gray-600">Harga Awal</small>
                        <div class="text-warning font-weight-bold">Rp 400,000</div>
                    </div>

                    <div class="mb-3">
                        <small class="text-gray-600">Bid Tertinggi</small>
                        <div class="text-success font-weight-bold">Rp 600,000</div>
                        <small class="text-muted">(6 bid)</small>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('user.item-detail', 5) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <button class="btn btn-outline-danger btn-sm" onclick="removeFromWatchlist(5)">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Watchlist -->
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-primary font-weight-bold text-uppercase mb-1">
                        Total Watchlist</div>
                    <div class="h3 mb-0 text-gray-800">5</div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-warning font-weight-bold text-uppercase mb-1">
                        Total Harga Awal</div>
                    <div class="h3 mb-0 text-gray-800">Rp 4.2 M</div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-info font-weight-bold text-uppercase mb-1">
                        Total Bid Tertinggi</div>
                    <div class="h3 mb-0 text-gray-800">Rp 6.3 M</div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function removeFromWatchlist(itemId) {
            if(confirm('Hapus item ini dari watchlist?')) {
                alert('Item ' + itemId + ' dihapus dari watchlist');
                // TODO: Implement actual removal from watchlist
            }
        }
    </script>
@endpush
