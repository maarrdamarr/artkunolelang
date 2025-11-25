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
        <h1 class="h3 mb-0 text-gray-800">Detail Barang Lelang</h1>
        <a href="{{ route('penjual.manage-items') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>

    <!-- Status Badge -->
    <div class="alert alert-success">
        <strong>Status: Aktif</strong> - Lelang sedang berjalan. Berakhir dalam <strong>2 jam</strong>
    </div>

    <div class="row">
        <!-- Gambar & Info Barang -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <img src="https://via.placeholder.com/500x400?text=Vas+Keramik" class="card-img-top" alt="Barang" style="height: 400px; object-fit: cover;">
                <div class="card-body">
                    <h5>Vas Keramik Antik Dinasti Ming</h5>
                    <p class="text-muted">Keramik | Dinasti Ming (1368-1644)</p>
                </div>
            </div>

            <!-- Informasi Barang -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Barang</h6>
                </div>
                <div class="card-body small">
                    <p><strong>Kategori:</strong> Keramik</p>
                    <p><strong>Asal:</strong> Dinasti Ming (1368-1644)</p>
                    <p><strong>Kondisi:</strong> <span class="badge badge-success">Sangat Baik</span></p>
                    <p><strong>Dimensi:</strong> Tinggi 35cm, Diameter 20cm</p>
                    <p><strong>Berat:</strong> 2.5 kg</p>
                    <p><strong>Sertifikat:</strong> <i class="fas fa-check text-success"></i> Ada</p>
                </div>
            </div>
        </div>

        <!-- Info Lelang & Statistik -->
        <div class="col-lg-6 mb-4">
            <!-- Info Lelang -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Lelang</h6>
                </div>
                <div class="card-body">
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

                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Jumlah Bid</small>
                            <div class="h5 font-weight-bold">12</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Kenaikan Bid Min</small>
                            <div class="h5 font-weight-bold">Rp 10,000</div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Mulai</small>
                            <div class="small font-weight-bold">25 Nov 2025, 08:00</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Berakhir</small>
                            <div class="small font-weight-bold">25 Nov 2025, 10:45</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Bid -->
            <div class="card shadow">
                <div class="card-header py-3">
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
                                    <td>Pembeli #1245</td>
                                    <td><strong>Rp 750,000</strong></td>
                                    <td><small>10 menit lalu</small></td>
                                </tr>
                                <tr>
                                    <td>Pembeli #1244</td>
                                    <td>Rp 730,000</td>
                                    <td><small>15 menit lalu</small></td>
                                </tr>
                                <tr>
                                    <td>Pembeli #1243</td>
                                    <td>Rp 700,000</td>
                                    <td><small>45 menit lalu</small></td>
                                </tr>
                                <tr>
                                    <td>Pembeli #1242</td>
                                    <td>Rp 600,000</td>
                                    <td><small>2 jam lalu</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deskripsi Lengkap -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Deskripsi Lengkap</h6>
        </div>
        <div class="card-body">
            <p>
                Vas Keramik Antik dari Dinasti Ming adalah karya seni keramik berkualitas tinggi yang berasal dari periode 1368-1644. 
                Vas ini menampilkan desain klasik dengan motif tradisional yang indah.
            </p>
            <p>
                Kondisi barang: Sangat baik dengan sedikit retak kecil pada bagian bawah. 
                Barang telah tersertifikat keaslian oleh ahli keramik berpengalaman.
            </p>
            <p>
                Barang ini cocok untuk koleksi pribadi atau investasi jangka panjang. 
                Pengiriman aman dengan asuransi penuh tersedia.
            </p>
        </div>
    </div>

    <!-- Aksi -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" onclick="editItem()">
                            <i class="fas fa-edit"></i> Edit Barang
                        </button>
                        <button class="btn btn-warning" onclick="extendAuction()">
                            <i class="fas fa-clock"></i> Perpanjang Lelang
                        </button>
                        <button class="btn btn-danger" onclick="endAuction()">
                            <i class="fas fa-stop"></i> Akhiri Lelang
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik</h6>
                </div>
                <div class="card-body small">
                    <p><strong>Views:</strong> 245</p>
                    <p><strong>Favorit:</strong> 18</p>
                    <p><strong>Questions:</strong> 3</p>
                    <p><strong>Conversion Rate:</strong> 4.9%</p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function editItem() {
            alert('Fitur edit barang akan diimplementasikan');
            // TODO: Implement actual edit functionality
        }

        function extendAuction() {
            alert('Lelang akan diperpanjang 1 hari');
            // TODO: Implement actual extend functionality
        }

        function endAuction() {
            if(confirm('Yakin ingin mengakhiri lelang ini sekarang?')) {
                alert('Lelang telah diakhiri');
                // TODO: Implement actual end functionality
            }
        }
    </script>
@endpush
