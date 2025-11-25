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
        <h1 class="h3 mb-0 text-gray-800">Browse Lelang Aktif</h1>
        <a href="{{ route('user.dashboard') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>

    <!-- Filter & Search -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Cari barang..." id="searchInput">
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="categoryFilter">
                        <option value="">Semua Kategori</option>
                        <option value="keramik">Keramik</option>
                        <option value="wayang">Wayang</option>
                        <option value="patung">Patung</option>
                        <option value="perhiasan">Perhiasan</option>
                        <option value="tekstil">Tekstil</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="sortFilter">
                        <option value="">Urutkan</option>
                        <option value="newest">Terbaru</option>
                        <option value="ending-soon">Segera Berakhir</option>
                        <option value="price-low">Harga Terendah</option>
                        <option value="price-high">Harga Tertinggi</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Lelang Items Grid -->
    <div class="row">
        @php
            $items = [
                [
                    'id' => 1,
                    'name' => 'Vas Keramik Antik Dinasti Ming',
                    'category' => 'Keramik',
                    'start_price' => 500000,
                    'current_bid' => 750000,
                    'bids_count' => 12,
                    'time_left' => '2 jam',
                    'image' => 'https://via.placeholder.com/300x200?text=Vas+Keramik',
                    'seller' => 'Toko Antik Jaya'
                ],
                [
                    'id' => 2,
                    'name' => 'Wayang Kulit Klasik Jawa',
                    'category' => 'Wayang',
                    'start_price' => 300000,
                    'current_bid' => 450000,
                    'bids_count' => 8,
                    'time_left' => '5 jam',
                    'image' => 'https://via.placeholder.com/300x200?text=Wayang+Kulit',
                    'seller' => 'Koleksi Wayang Indah'
                ],
                [
                    'id' => 3,
                    'name' => 'Patung Batu Nisan Bali',
                    'category' => 'Patung',
                    'start_price' => 1000000,
                    'current_bid' => 1250000,
                    'bids_count' => 5,
                    'time_left' => '1 hari',
                    'image' => 'https://via.placeholder.com/300x200?text=Patung+Batu',
                    'seller' => 'Galeri Bali Heritage'
                ],
                [
                    'id' => 4,
                    'name' => 'Perhiasan Emas Antik',
                    'category' => 'Perhiasan',
                    'start_price' => 2000000,
                    'current_bid' => 3500000,
                    'bids_count' => 15,
                    'time_left' => '12 jam',
                    'image' => 'https://via.placeholder.com/300x200?text=Perhiasan+Emas',
                    'seller' => 'Toko Emas Pusaka'
                ],
                [
                    'id' => 5,
                    'name' => 'Batik Tradisional Cirebon',
                    'category' => 'Tekstil',
                    'start_price' => 400000,
                    'current_bid' => 600000,
                    'bids_count' => 6,
                    'time_left' => '3 jam',
                    'image' => 'https://via.placeholder.com/300x200?text=Batik+Cirebon',
                    'seller' => 'Batik Heritage'
                ],
                [
                    'id' => 6,
                    'name' => 'Keramik Celadon Vietnam',
                    'category' => 'Keramik',
                    'start_price' => 800000,
                    'current_bid' => 1100000,
                    'bids_count' => 9,
                    'time_left' => '18 jam',
                    'image' => 'https://via.placeholder.com/300x200?text=Celadon',
                    'seller' => 'Vietnam Antique Collectors'
                ],
            ];
        @endphp

        @foreach($items as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100" style="cursor: pointer; transition: transform 0.2s;">
                    <div class="position-relative">
                        <img src="{{ $item['image'] }}" class="card-img-top" alt="{{ $item['name'] }}" style="height: 200px; object-fit: cover;">
                        <span class="badge badge-danger position-absolute" style="top: 10px; right: 10px;">
                            {{ $item['time_left'] }}
                        </span>
                        <span class="badge badge-info position-absolute" style="top: 10px; left: 10px;">
                            {{ $item['category'] }}
                        </span>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $item['name'] }}</h6>
                        <p class="card-text small text-muted">{{ $item['seller'] }}</p>

                        <div class="mb-2">
                            <small class="text-gray-600">Harga Awal</small>
                            <div class="text-warning font-weight-bold">Rp {{ number_format($item['start_price'], 0, ',', '.') }}</div>
                        </div>

                        <div class="mb-3">
                            <small class="text-gray-600">Bid Tertinggi</small>
                            <div class="text-success font-weight-bold">Rp {{ number_format($item['current_bid'], 0, ',', '.') }}</div>
                            <small class="text-muted">({{ $item['bids_count'] }} bid)</small>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('user.item-detail', $item['id']) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Lihat Detail & Bid
                            </a>
                            <button class="btn btn-outline-warning btn-sm" onclick="addToWatchlist({{ $item['id'] }})">
                                <i class="fas fa-heart"></i> Watchlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#">Sebelumnya</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Berikutnya</a>
            </li>
        </ul>
    </nav>

@endsection

@push('scripts')
    <script>
        function addToWatchlist(itemId) {
            alert('Item ' + itemId + ' ditambahkan ke watchlist!');
            // TODO: Implement actual watchlist functionality
        }
    </script>
@endpush
