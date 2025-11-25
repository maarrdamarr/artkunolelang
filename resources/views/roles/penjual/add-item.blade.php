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
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang untuk Lelang</h1>
        <a href="{{ route('penjual.manage-items') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>

    <!-- Info Alert -->
    <div class="alert alert-info" role="alert">
        <i class="fas fa-info-circle"></i> 
        <strong>Informasi:</strong> Semua barang yang ditambahkan akan melalui proses verifikasi oleh admin sebelum dapat dilelang. 
        Pastikan dokumentasi lengkap dan foto berkualitas tinggi.
    </div>

    <form id="addItemForm" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-lg-8">
                <!-- Informasi Barang -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="itemName">Nama Barang <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="itemName" name="itemName" 
                                placeholder="Contoh: Vas Keramik Antik Dinasti Ming" required>
                            <small class="form-text text-muted">Deskripsi singkat barang yang jelas dan menarik</small>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori <span class="text-danger">*</span></label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="">Pilih Kategori</option>
                                <option value="keramik">Keramik</option>
                                <option value="wayang">Wayang</option>
                                <option value="patung">Patung</option>
                                <option value="perhiasan">Perhiasan</option>
                                <option value="tekstil">Tekstil</option>
                                <option value="furniture">Furniture</option>
                                <option value="senjata">Senjata Tradisional</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Lengkap <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                placeholder="Deskripsikan barang secara lengkap, termasuk kondisi, dimensi, asal-usul, dll..." required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="condition">Kondisi Barang <span class="text-danger">*</span></label>
                                    <select class="form-control" id="condition" name="condition" required>
                                        <option value="">Pilih Kondisi</option>
                                        <option value="sangat-baik">Sangat Baik</option>
                                        <option value="baik">Baik</option>
                                        <option value="cukup-baik">Cukup Baik</option>
                                        <option value="perlu-restorasi">Perlu Restorasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="origin">Asal Barang <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="origin" name="origin" 
                                        placeholder="Contoh: Dinasti Ming, Jawa, dll" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Lelang -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Lelang</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startPrice">Harga Awal (Rp) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" id="startPrice" name="startPrice" 
                                            placeholder="500000" min="100000" step="10000" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bidIncrement">Kenaikan Bid Minimum (Rp) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" id="bidIncrement" name="bidIncrement" 
                                            placeholder="10000" min="10000" step="5000" value="10000" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="auctionDuration">Durasi Lelang <span class="text-danger">*</span></label>
                                    <select class="form-control" id="auctionDuration" name="auctionDuration" required>
                                        <option value="">Pilih Durasi</option>
                                        <option value="1">1 Hari</option>
                                        <option value="2">2 Hari</option>
                                        <option value="3">3 Hari</option>
                                        <option value="5">5 Hari</option>
                                        <option value="7">1 Minggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reservePrice">Harga Cadangan (Opsional)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" id="reservePrice" name="reservePrice" 
                                            placeholder="Kosongkan jika tidak ada">
                                    </div>
                                    <small class="form-text text-muted">Lelang akan berhasil jika mencapai harga ini</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gambar Barang -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Gambar Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="mainImage">Gambar Utama <span class="text-danger">*</span></label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="mainImage" name="mainImage" 
                                    accept="image/*" required>
                                <label class="custom-file-label" for="mainImage">Pilih File...</label>
                            </div>
                            <small class="form-text text-muted">Format: JPG, PNG (Maks 5MB). Gunakan gambar berkualitas tinggi</small>
                        </div>

                        <div class="form-group">
                            <label for="additionalImages">Gambar Tambahan (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="additionalImages" name="additionalImages[]" 
                                    accept="image/*" multiple>
                                <label class="custom-file-label" for="additionalImages">Pilih File...</label>
                            </div>
                            <small class="form-text text-muted">Maksimal 5 gambar tambahan</small>
                        </div>
                    </div>
                </div>

                <!-- Dokumentasi & Sertifikat -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Dokumentasi & Sertifikat</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="certificate">Sertifikat Keaslian (Opsional)</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="certificate" name="certificate" 
                                    accept=".pdf,.jpg,.png">
                                <label class="custom-file-label" for="certificate">Pilih File...</label>
                            </div>
                            <small class="form-text text-muted">Dokumen untuk membuktikan keaslian barang</small>
                        </div>

                        <div class="form-group">
                            <label for="documentation">Dokumentasi Lainnya (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="documentation" name="documentation[]" 
                                    accept=".pdf,.jpg,.png" multiple>
                                <label class="custom-file-label" for="documentation">Pilih File...</label>
                            </div>
                            <small class="form-text text-muted">Laporan ahli, foto detail, dll</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Preview -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Preview</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img id="previewImage" src="https://via.placeholder.com/300x200?text=Preview" 
                                alt="Preview" style="width: 100%; max-height: 250px; object-fit: cover;" class="rounded">
                        </div>
                        <p class="small">
                            <strong id="previewName">Nama Barang</strong>
                            <br><span class="badge badge-primary" id="previewCategory">Kategori</span>
                        </p>
                        <hr>
                        <p class="small">
                            <strong>Harga Awal:</strong> <span id="previewPrice">Rp 0</span>
                            <br><strong>Durasi:</strong> <span id="previewDuration">-</span> Hari
                        </p>
                    </div>
                </div>

                <!-- Checklist -->
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Checklist Sebelum Submit</h6>
                    </div>
                    <div class="card-body small">
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="check1">
                            <label class="custom-control-label" for="check1">
                                Informasi lengkap & akurat
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="check2">
                            <label class="custom-control-label" for="check2">
                                Gambar berkualitas tinggi
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="check3">
                            <label class="custom-control-label" for="check3">
                                Memiliki dokumentasi pendukung
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check4">
                            <label class="custom-control-label" for="check4">
                                Siap untuk verifikasi admin
                            </label>
                        </div>

                        <hr>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-upload"></i> Submit Barang
                            </button>
                            <a href="{{ route('penjual.dashboard') }}" class="btn btn-secondary btn-block">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script>
        // Preview Update
        document.getElementById('mainImage').addEventListener('change', function(e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('previewImage').src = event.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });

        document.getElementById('itemName').addEventListener('input', function() {
            document.getElementById('previewName').textContent = this.value || 'Nama Barang';
        });

        document.getElementById('category').addEventListener('change', function() {
            const categoryMap = {
                'keramik': 'Keramik',
                'wayang': 'Wayang',
                'patung': 'Patung',
                'perhiasan': 'Perhiasan',
                'tekstil': 'Tekstil',
                'furniture': 'Furniture',
                'senjata': 'Senjata',
                'lainnya': 'Lainnya'
            };
            document.getElementById('previewCategory').textContent = categoryMap[this.value] || 'Kategori';
        });

        document.getElementById('startPrice').addEventListener('input', function() {
            const price = parseInt(this.value) || 0;
            document.getElementById('previewPrice').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
        });

        document.getElementById('auctionDuration').addEventListener('change', function() {
            document.getElementById('previewDuration').textContent = this.value || '-';
        });

        document.getElementById('addItemForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Barang berhasil disubmit untuk verifikasi admin!');
            // TODO: Implement actual form submission
        });
    </script>
@endpush
