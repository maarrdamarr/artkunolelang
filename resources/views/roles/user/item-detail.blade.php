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
        <h1 class="h3 mb-0 text-gray-800">Detail Barang</h1>
        <a href="{{ route('user.browse') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>

    <div class="row">
        <!-- Gambar & Info Utama -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <img src="https://via.placeholder.com/500x400?text=Vas+Keramik+Antik" class="card-img-top" alt="Barang" style="height: 400px; object-fit: cover;">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-warning btn-lg" onclick="addToWatchlist()">
                            <i class="fas fa-heart"></i> Tambah ke Watchlist
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Barang & Bidding -->
        <div class="col-lg-6 mb-4">
            <!-- Info Barang -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3>Vas Keramik Antik Dinasti Ming</h3>
                    <p class="text-muted">Keramik | Dinasti Ming (1368-1644)</p>

                    <hr>

                    <!-- Waktu Lelang -->
                    <div class="mb-3">
                        <h6 class="text-muted">Waktu Lelang Berakhir</h6>
                        <div class="h4 text-danger font-weight-bold">
                            <i class="fas fa-clock"></i> 2 jam 45 menit
                        </div>
                    </div>

                    <!-- Info Harga -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Harga Awal</small>
                            <div class="h5 text-warning font-weight-bold">Rp 500,000</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Bid Tertinggi</small>
                            <div class="h5 text-success font-weight-bold">Rp 750,000</div>
                        </div>
                    </div>

                    <p class="small text-muted">Jumlah bid: <strong>12</strong></p>

                    <hr>

                    <!-- Status Bidding -->
                    <div class="alert alert-info">
                        <strong>Status:</strong> Anda saat ini memiliki bid tertinggi!
                    </div>
                </div>
            </div>

            <!-- Form Bidding -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Pasang Bid Baru</h6>
                </div>
                <div class="card-body">
                    <form id="bidForm">
                        <div class="form-group">
                            <label for="bidAmount">Jumlah Bid (Minimal: Rp 760,000)</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" id="bidAmount" placeholder="760000" min="760000" step="10000" required>
                            </div>
                            <small class="form-text text-muted">Jumlah bid harus lebih tinggi dari bid tertinggi saat ini</small>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            <i class="fas fa-gavel"></i> Pasang Bid
                        </button>
                    </form>

                    <div class="mt-3">
                        <small class="text-muted">
                            💡 Tip: Anda dapat mengatur proxy bid untuk otomatis menawar sampai jumlah maksimal yang Anda tentukan.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Deskripsi Barang -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Deskripsi Barang</h6>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Vas Keramik Antik dari Dinasti Ming</strong> adalah karya seni keramik berkualitas tinggi yang berasal dari periode 1368-1644. 
                    </p>
                    <p>
                        Vas ini menampilkan:
                    </p>
                    <ul>
                        <li>Desain klasik dengan motif tradisional</li>
                        <li>Bahan keramik premium berkualitas tinggi</li>
                        <li>Tinggi: 35 cm</li>
                        <li>Diameter: 20 cm</li>
                        <li>Kondisi: Sangat baik, ada sedikit retak kecil</li>
                        <li>Sertifikat keaslian dari ahli</li>
                    </ul>
                    <p>
                        Barang ini cocok untuk koleksi pribadi atau investasi jangka panjang.
                    </p>
                </div>
            </div>
        </div>

        <!-- Info Penjual -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Penjual</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="https://via.placeholder.com/100x100?text=Logo" alt="Toko" class="rounded-circle" style="width: 80px; height: 80px;">
                        <h5 class="mt-2">Toko Antik Jaya</h5>
                        <p class="text-muted">Tersedia sejak 2015</p>
                    </div>

                    <div class="mb-3">
                        <p>
                            <strong>Rating:</strong> 
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            4.8/5 (245 review)
                        </p>
                    </div>

                    <div class="mb-3">
                        <p>
                            <strong>Statistik:</strong>
                            <br>Lelang Selesai: 342
                            <br>Penjualan Berhasil: 98%
                            <br>Response Time: < 2 jam
                        </p>
                    </div>

                    <button class="btn btn-primary btn-block" onclick="contactSeller()">
                        <i class="fas fa-envelope"></i> Hubungi Penjual
                    </button>
                </div>
            </div>

            <!-- Riwayat Bid -->
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Bid Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Pembeli</th>
                                    <th>Bid</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Anda</td>
                                    <td><strong>Rp 750,000</strong></td>
                                    <td><small>10 menit lalu</small></td>
                                </tr>
                                <tr>
                                    <td>Pembeli Lain</td>
                                    <td>Rp 730,000</td>
                                    <td><small>15 menit lalu</small></td>
                                </tr>
                                <tr>
                                    <td>Pembeli Lain</td>
                                    <td>Rp 700,000</td>
                                    <td><small>45 menit lalu</small></td>
                                </tr>
                                <tr>
                                    <td>Pembeli Lain</td>
                                    <td>Rp 600,000</td>
                                    <td><small>2 jam lalu</small></td>
                                </tr>
                                <tr>
                                    <td>Pembeli Lain</td>
                                    <td>Rp 550,000</td>
                                    <td><small>3 jam lalu</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.getElementById('bidForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const amount = document.getElementById('bidAmount').value;
            alert('Bid sebesar Rp ' + new Intl.NumberFormat('id-ID').format(amount) + ' telah ditempatkan!');
            // TODO: Implement actual bid placement
        });

        function addToWatchlist() {
            alert('Barang telah ditambahkan ke watchlist!');
            // TODO: Implement actual watchlist functionality
        }

        function contactSeller() {
            alert('Fitur kontak penjual akan diimplementasikan');
            // TODO: Implement actual contact functionality
        }
    </script>
@endpush
