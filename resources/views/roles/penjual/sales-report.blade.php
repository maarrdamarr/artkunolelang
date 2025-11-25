@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('penjual.add-item') }}">Tambah Barang</a>
    <a class="collapse-item" href="{{ route('penjual.manage-items') }}">Kelola Barang</a>
    <a class="collapse-item" href="{{ route('penjual.sales-report') }}">Laporan Penjualan</a>
    <a class="collapse-item" href="#">Pesanan Masuk</a>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Penjualan</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="exportReport()">
            <i class="fas fa-download fa-sm"></i> Export
        </button>
    </div>

    <!-- Filter -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label>Dari Tanggal</label>
                    <input type="date" class="form-control" id="dateFrom" value="2025-11-01">
                </div>
                <div class="col-md-3">
                    <label>Sampai Tanggal</label>
                    <input type="date" class="form-control" id="dateTo" value="2025-11-25">
                </div>
                <div class="col-md-3">
                    <label>Status Lelang</label>
                    <select class="form-control">
                        <option>Semua</option>
                        <option>Selesai</option>
                        <option>Aktif</option>
                        <option>Belum Dimulai</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>&nbsp;</label>
                    <button class="btn btn-primary btn-block">Filter</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Utama -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-primary font-weight-bold text-uppercase mb-1">
                        Total Penjualan</div>
                    <div class="h3 mb-0 text-gray-800">Rp 15.2 M</div>
                    <p class="text-muted small mt-1">42 lelang selesai</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-success font-weight-bold text-uppercase mb-1">
                        Rata-rata Penjualan</div>
                    <div class="h3 mb-0 text-gray-800">Rp 361.9 K</div>
                    <p class="text-muted small mt-1">Per lelang</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-info font-weight-bold text-uppercase mb-1">
                        Penjualan Tertinggi</div>
                    <div class="h3 mb-0 text-gray-800">Rp 3.5 M</div>
                    <p class="text-muted small mt-1">Perhiasan Emas</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-warning font-weight-bold text-uppercase mb-1">
                        Tingkat Sukses</div>
                    <div class="h3 mb-0 text-gray-800">98%</div>
                    <p class="text-muted small mt-1">41 dari 42</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Penjualan -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan Bulanan</h6>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Penjualan per Kategori</h6>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Penjualan Terperinci -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Penjualan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Barang</th>
                            <th>Kategori</th>
                            <th>Harga Awal</th>
                            <th>Harga Final</th>
                            <th>Keuntungan</th>
                            <th>Pembeli</th>
                            <th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Vas Keramik Antik Ming</td>
                            <td><span class="badge badge-primary">Keramik</span></td>
                            <td>Rp 500,000</td>
                            <td>Rp 750,000</td>
                            <td><span class="text-success">+Rp 250,000</span></td>
                            <td>Pembeli #1245</td>
                            <td>25 Nov 2025</td>
                        </tr>
                        <tr>
                            <td>Wayang Kulit Klasik</td>
                            <td><span class="badge badge-info">Wayang</span></td>
                            <td>Rp 300,000</td>
                            <td>Rp 450,000</td>
                            <td><span class="text-success">+Rp 150,000</span></td>
                            <td>Pembeli #1246</td>
                            <td>24 Nov 2025</td>
                        </tr>
                        <tr>
                            <td>Patung Batu Nisan Bali</td>
                            <td><span class="badge badge-warning">Patung</span></td>
                            <td>Rp 1,000,000</td>
                            <td>Rp 1,250,000</td>
                            <td><span class="text-success">+Rp 250,000</span></td>
                            <td>Pembeli #1247</td>
                            <td>22 Nov 2025</td>
                        </tr>
                        <tr>
                            <td>Batik Tradisional Cirebon</td>
                            <td><span class="badge badge-success">Tekstil</span></td>
                            <td>Rp 400,000</td>
                            <td>Rp 600,000</td>
                            <td><span class="text-success">+Rp 200,000</span></td>
                            <td>Pembeli #1248</td>
                            <td>20 Nov 2025</td>
                        </tr>
                        <tr>
                            <td>Keramik Celadon Vietnam</td>
                            <td><span class="badge badge-primary">Keramik</span></td>
                            <td>Rp 800,000</td>
                            <td>Rp 1,100,000</td>
                            <td><span class="text-success">+Rp 300,000</span></td>
                            <td>Pembeli #1249</td>
                            <td>18 Nov 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        // Sales Chart
        const ctx1 = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
                datasets: [{
                    label: 'Penjualan (Rp)',
                    data: [500000, 750000, 600000, 1200000, 1500000, 1800000, 2000000, 1900000, 2200000, 2400000, 2800000],
                    borderColor: '#4e73df',
                    backgroundColor: 'rgba(78, 115, 223, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#4e73df',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Category Chart
        const ctx2 = document.getElementById('categoryChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Keramik', 'Wayang', 'Patung', 'Tekstil', 'Lainnya'],
                datasets: [{
                    data: [4500000, 1500000, 3000000, 3000000, 3200000],
                    backgroundColor: [
                        '#4e73df',
                        '#1cc88a',
                        '#36b9cc',
                        '#f6c23e',
                        '#e74a3b'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        function exportReport() {
            alert('Laporan akan diexport dalam format Excel');
            // TODO: Implement actual export functionality
        }
    </script>
@endpush
