@php
    $role = Auth::check() ? Auth::user()->role : null;
@endphp

<!-- Sidebar Menu: role-aware top-level links -->
@if(!$role)
    <!-- Public links for guests -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#info">Informasi & Berita</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#gallery">Galeri Barang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#artikel">Artikel & Tips</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login / Register</a>
    </li>
@elseif($role === 'user')
    <!-- Buyer menu -->
    <li class="nav-item"><a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard Pembeli</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('user.browse') }}">Browse Lelang Aktif</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('user.bid-history') }}">Riwayat Bid</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('user.watchlist') }}">Watchlist / Favorit</a></li>
@elseif($role === 'penjual')
    <!-- Seller menu -->
    <li class="nav-item"><a class="nav-link" href="{{ route('penjual.dashboard') }}">Dashboard Penjual</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('penjual.add-item') }}">Tambah Barang</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('penjual.manage-items') }}">Kelola Barang</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('penjual.sales-report') }}">Laporan Penjualan</a></li>
@elseif($role === 'admin')
    <!-- Admin menu -->
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.verifikasi-barang') }}">Verifikasi Barang</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.kelola-user') }}">Kelola User</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.kelola-lelang') }}">Kelola Lelang</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}">Laporan & Statistik</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.articles.index') }}">Kelola Konten Berita</a></li>
@else
    <!-- Fallback: show home -->
    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
@endif
