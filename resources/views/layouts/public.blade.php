<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<!-- Enhanced Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(135deg, #2d5a27 0%, #4a7a3a 100%); box-shadow: 0 2px 10px rgba(45, 90, 39, 0.3);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('home') }}">
            <img src="{{ asset('favicon.ico') }}" alt="Logo" width="30" height="30" class="me-2">
            <span>{{ config('app.name', 'ArtKunolElang') }}</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Main Navigation -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold px-3" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold px-3" href="{{ route('user.browse') }}">
                        <i class="fas fa-gavel me-1"></i>Lelang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold px-3" href="{{ route('artikel.index') }}">
                        <i class="fas fa-newspaper me-1"></i>Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold px-3" href="#collections">
                        <i class="fas fa-palette me-1"></i>Koleksi
                    </a>
                </li>
            </ul>

            <!-- Authentication Section -->
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-semibold px-3" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow border-0 mt-2" aria-labelledby="userDropdown">
                            <a class="dropdown-item py-2" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2 text-success"></i>Dashboard
                            </a>
                            @if(Auth::user()->hasRole('user'))
                                <a class="dropdown-item py-2" href="{{ route('user.bid-history') }}">
                                    <i class="fas fa-history me-2 text-warning"></i>Riwayat Tawaran
                                </a>
                                <a class="dropdown-item py-2" href="{{ route('user.watchlist') }}">
                                    <i class="fas fa-heart me-2 text-danger"></i>Watchlist
                                </a>
                            @elseif(Auth::user()->hasRole('penjual'))
                                <a class="dropdown-item py-2" href="{{ route('penjual.manage-items') }}">
                                    <i class="fas fa-boxes me-2 text-info"></i>Kelola Item
                                </a>
                                <a class="dropdown-item py-2" href="{{ route('penjual.sales-report') }}">
                                    <i class="fas fa-chart-line me-2 text-primary"></i>Laporan Penjualan
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Keluar
                                </button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm fw-bold mx-1 px-3" href="{{ route('register') }}" style="border-color: rgba(255,255,255,0.7);">
                            <i class="fas fa-user-plus me-1"></i>Daftar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light btn-sm fw-bold text-success mx-1 px-3" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main style="padding-top: 76px;">
    @yield('content')
</main>

<footer class="bg-light py-4 mt-5">
    <div class="container text-center text-muted">&copy; {{ date('Y') }} {{ config('app.name') }}</div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 70
                }, 1000);
            }
        });
    });
</script>
