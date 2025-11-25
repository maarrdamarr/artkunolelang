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
        <h1 class="h3 mb-0 text-gray-800">Kelola Barang Lelang</h1>
        <a href="{{ route('penjual.add-item') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
            <i class="fas fa-plus fa-sm"></i> Tambah Barang
        </a>
    </div>

    <!-- Filter & Search -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Cari barang..." id="searchInput">
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending Verifikasi</option>
                        <option value="active">Aktif</option>
                        <option value="ended">Selesai</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="sortFilter">
                        <option value="">Urutkan</option>
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="price-high">Harga Tertinggi</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Items Table -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Barang</th>
                            <th>Kategori</th>
                            <th>Harga Awal</th>
                            <th>Bid Tertinggi</th>
                            <th>Status</th>
                            <th>Waktu Lelang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item 1 - Active -->
                        <tr>
                            <td>
                                <strong>Vas Keramik Antik Ming</strong>
                                <br><small class="text-muted">Dinasti Ming (1368-1644)</small>
                            </td>
                            <td>Keramik</td>
                            <td>Rp 500,000</td>
                            <td>Rp 750,000</td>
                            <td>
                                <span class="badge badge-success">Aktif</span>
                            </td>
                            <td>
                                <small>Berakhir: 2 jam</small>
                            </td>
                            <td>
                                <a href="{{ route('penjual.item-detail', 1) }}" class="btn btn-xs btn-primary" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-xs btn-danger" title="Hapus" onclick="deleteItem(1)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Item 2 - Pending -->
                        <tr>
                            <td>
                                <strong>Wayang Kulit Klasik Jawa</strong>
                                <br><small class="text-muted">Jawa Klasik</small>
                            </td>
                            <td>Wayang</td>
                            <td>Rp 300,000</td>
                            <td>-</td>
                            <td>
                                <span class="badge badge-warning">Pending Verifikasi</span>
                            </td>
                            <td>
                                <small>Menunggu...</small>
                            </td>
                            <td>
                                <a href="{{ route('penjual.item-detail', 2) }}" class="btn btn-xs btn-primary" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-xs btn-danger" title="Hapus" onclick="deleteItem(2)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Item 3 - Ended -->
                        <tr>
                            <td>
                                <strong>Patung Batu Nisan Bali</strong>
                                <br><small class="text-muted">Bali Klasik</small>
                            </td>
                            <td>Patung</td>
                            <td>Rp 1,000,000</td>
                            <td>Rp 1,250,000</td>
                            <td>
                                <span class="badge badge-info">Selesai</span>
                            </td>
                            <td>
                                <small>22 Nov 2025</small>
                            </td>
                            <td>
                                <a href="{{ route('penjual.item-detail', 3) }}" class="btn btn-xs btn-primary" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-xs btn-secondary" title="Lelang Ulang" onclick="relisting(3)">
                                    <i class="fas fa-redo"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Item 4 - Rejected -->
                        <tr>
                            <td>
                                <strong>Perhiasan Emas Antik</strong>
                                <br><small class="text-muted">Emas 24 Karat</small>
                            </td>
                            <td>Perhiasan</td>
                            <td>Rp 2,000,000</td>
                            <td>-</td>
                            <td>
                                <span class="badge badge-danger">Ditolak</span>
                            </td>
                            <td>
                                <small>20 Nov 2025</small>
                            </td>
                            <td>
                                <a href="{{ route('penjual.item-detail', 4) }}" class="btn btn-xs btn-primary" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-info" title="Edit & Submit Ulang">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Item 5 - Active -->
                        <tr>
                            <td>
                                <strong>Batik Tradisional Cirebon</strong>
                                <br><small class="text-muted">Batik Motif Pegon</small>
                            </td>
                            <td>Tekstil</td>
                            <td>Rp 400,000</td>
                            <td>Rp 600,000</td>
                            <td>
                                <span class="badge badge-success">Aktif</span>
                            </td>
                            <td>
                                <small>Berakhir: 3 jam</small>
                            </td>
                            <td>
                                <a href="{{ route('penjual.item-detail', 5) }}" class="btn btn-xs btn-primary" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-xs btn-danger" title="Hapus" onclick="deleteItem(5)">
                                    <i class="fas fa-trash"></i>
                                </button>
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
                        Total Barang</div>
                    <div class="h3 mb-0 text-gray-800">42</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-success font-weight-bold text-uppercase mb-1">
                        Lelang Aktif</div>
                    <div class="h3 mb-0 text-gray-800">8</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-warning font-weight-bold text-uppercase mb-1">
                        Pending Verifikasi</div>
                    <div class="h3 mb-0 text-gray-800">3</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-danger font-weight-bold text-uppercase mb-1">
                        Ditolak</div>
                    <div class="h3 mb-0 text-gray-800">1</div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function deleteItem(itemId) {
            if(confirm('Yakin ingin menghapus barang ini?')) {
                alert('Barang ' + itemId + ' telah dihapus');
                // TODO: Implement actual deletion
            }
        }

        function relisting(itemId) {
            alert('Barang ' + itemId + ' akan dilelang ulang');
            // TODO: Implement actual relisting
        }
    </script>
@endpush
