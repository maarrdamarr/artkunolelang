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
        <h1 class="h3 mb-0 text-gray-800">Dashboard Penjual</h1>
        <a href="{{ route('penjual.add-item') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
            <i class="fas fa-plus fa-sm"></i> Tambah Barang
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Lelang -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-primary font-weight-bold text-uppercase mb-1">
                        Total Lelang</div>
                    <div class="h3 mb-0 text-gray-800">42</div>
                </div>
            </div>
        </div>

        <!-- Lelang Aktif -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-success font-weight-bold text-uppercase mb-1">
                        Lelang Aktif</div>
                    <div class="h3 mb-0 text-gray-800">8</div>
                </div>
            </div>
        </div>

        <!-- Menunggu Verifikasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-warning font-weight-bold text-uppercase mb-1">
                        Menunggu Verifikasi</div>
                    <div class="h3 mb-0 text-gray-800">3</div>
                </div>
            </div>
        </div>

        <!-- Total Penjualan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-info font-weight-bold text-uppercase mb-1">
                        Total Penjualan</div>
                    <div class="h3 mb-0 text-gray-800">Rp 15.2 M</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart - Penjualan Bulanan -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan Bulanan</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Aksi:</div>
                            <a class="dropdown-item" href="#">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart - Kategori -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Barang</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Aksi:</div>
                            <a class="dropdown-item" href="#">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 pt-4 border-top">
                        <div class="small mb-1">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Keramik
                            </span>
                        </div>
                        <div class="small mb-1">
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Wayang
                            </span>
                        </div>
                        <div class="small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Lainnya
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Lelang Terbaru -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lelang Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="small mb-1">
                        <strong>Vas Keramik Antik</strong> - Status: <span class="badge badge-success">Aktif</span>
                        <div class="small text-muted mt-2">Rp 500K → Rp 750K | 12 bid | 2 jam</div>
                    </div>
                    <hr>
                    <div class="small mb-1">
                        <strong>Wayang Kulit Klasik</strong> - Status: <span class="badge badge-warning">Pending</span>
                        <div class="small text-muted mt-2">Menunggu verifikasi admin</div>
                    </div>
                </div>
            </div>

            <!-- Statistik Penjual -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Toko</h6>
                </div>
                <div class="card-body small">
                    <p><strong>Rating:</strong> <span class="text-warning"><i class="fas fa-star"></i> 4.8/5</span> (245 review)</p>
                    <p><strong>Lelang Selesai:</strong> 342</p>
                    <p><strong>Penjualan Berhasil:</strong> 98%</p>
                    <p><strong>Response Time:</strong> < 2 jam</p>
                </div>
            </div>
        </div>

        <!-- Informasi Toko -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Toko</h6>
                </div>
                <div class="card-body">
                    <p><strong>Nama Toko:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Role:</strong> <span class="badge badge-warning">Penjual</span></p>
                    <p><strong>Status:</strong> <span class="badge badge-success">Aktif</span></p>
                    <p><strong>Bergabung:</strong> 25 November 2025</p>
                    <hr>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-warning">Edit Profil</a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('penjual.add-item') }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-plus"></i> Tambah Barang Baru
                        </a>
                        <a href="{{ route('penjual.manage-items') }}" class="btn btn-sm btn-info">
                            <i class="fas fa-boxes"></i> Kelola Barang
                        </a>
                        <a href="{{ route('penjual.sales-report') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-chart-bar"></i> Laporan Penjualan
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-inbox"></i> Pesanan Masuk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        Chart.defaults.global.defaultFont = 'Nunito';
        Chart.defaults.global.defaultFontColor = '#858796';

        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Penjualan",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [0, 10000, 15000, 25000, 20000, 30000, 35000, 40000, 38000, 45000, 50000, 55000],
                }],
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                        }
                    }],
                }
            }
        });

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Keramik", "Wayang", "Lainnya"],
                datasets: [{
                    data: [50, 30, 20],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#224abe', '#17a2b8', '#2c9faf'],
                    borderColor: ["#ffffff"],
                }],
            },
            options: {
                maintainAspectRatio: false,
                cutoutPercentage: 80,
            },
        });
    </script>
@endpush

