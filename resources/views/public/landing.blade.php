@extends('layouts.public')

@section('content')
@php
    $heroImage = $sections->firstWhere('key','hero')->image ?? 'https://images.unsplash.com/photo-1523978591478-c753949ff840?w=1600&q=80&auto=format&fit=crop';
@endphp

<!-- Hero Section -->
<section class="relative min-h-screen bg-cover bg-center bg-no-repeat flex items-center" style="background-image: url('{{ $heroImage }}');">
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(45, 90, 39, 0.6) 0%, rgba(74, 122, 58, 0.4) 100%);"></div>
    <div class="relative z-10 container mx-auto px-6 text-center text-white">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">{{ $sections->firstWhere('key','hero')->title ?? 'Discover Antique Treasures' }}</h1>
        <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-2xl mx-auto">{{ $sections->firstWhere('key','hero')->description ?? 'Explore curated antique auctions and timeless pieces from around the world.' }}</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#collections" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">Jelajahi Koleksi</a>
            <a href="{{ route('user.browse') }}" class="border-2 border-white text-white hover:bg-white hover:text-green-700 font-semibold py-3 px-8 rounded-lg transition duration-300 ease-in-out">Lihat Lelang</a>
        </div>
    </div>
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-white text-2xl"></i>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ $sections->firstWhere('key','destinations')->title ?? 'Why Choose ArtKunolElang' }}</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">{{ $sections->firstWhere('key','destinations')->description ?? 'Your trusted platform for authentic antique auctions and rare collectibles.' }}</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-amber-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-gavel text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Authentic Auctions</h3>
                <p class="text-gray-600">Participate in verified auctions with genuine antique pieces from trusted sellers.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-blue-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Secure Transactions</h3>
                <p class="text-gray-600">Safe and secure payment methods with buyer and seller protection guarantee.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-green-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-globe text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Global Marketplace</h3>
                <p class="text-gray-600">Connect with collectors and sellers from around the world in our international marketplace.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Collections -->
<section id="collections" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Collections</h2>
            <p class="text-xl text-gray-600">Discover our most sought-after antique categories and curated collections</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($sections->where('key','!=','hero')->take(6) as $section)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                    <div class="relative overflow-hidden">
                        <img src="{{ $section->image ?? 'https://images.unsplash.com/photo-1549880338-65ddcdfd017b?w=400&q=80&auto=format&fit=crop' }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" alt="{{ $section->title }}">
                        <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <a href="#" class="bg-white text-gray-900 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors">Explore Collection</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $section->title }}</h3>
                        <p class="text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($section->description ?? ''), 100) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16" style="background: linear-gradient(135deg, #2d5a27 0%, #4a7a3a 100%);">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8 text-center text-white">
            <div>
                <div class="text-4xl font-bold mb-2">{{ \App\Models\Item::count() }}</div>
                <div class="text-green-100">Barang Terdaftar</div>
            </div>
            <div>
                <div class="text-4xl font-bold mb-2">{{ \App\Models\User::where('role', 'penjual')->count() }}</div>
                <div class="text-green-100">Pedagang</div>
            </div>
            <div>
                <div class="text-4xl font-bold mb-2">{{ \App\Models\User::where('role', 'user')->count() }}</div>
                <div class="text-green-100">Kolektor</div>
            </div>
            <div>
                <div class="text-4xl font-bold mb-2">{{ \App\Models\Bid::count() }}</div>
                <div class="text-green-100">Penawaran Ditempatkan</div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News -->
<section id="artikel" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest News & Articles</h2>
            <p class="text-xl text-gray-600">Stay updated with the latest in the antique world</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($articles->take(3) as $article)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="aspect-video overflow-hidden">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" alt="{{ $article->title }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?w=400&q=80&auto=format&fit=crop" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" alt="{{ $article->title }}">
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="far fa-calendar mr-2"></i>
                            {{ $article->published_at?->format('M d, Y') }}
                        </div>
                        <h3 class="text-xl font-semibold mb-3 line-clamp-2">{{ $article->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->excerpt }}</p>
                        <a href="{{ route('article.show', $article->id) }}" class="inline-flex items-center text-green-600 font-semibold hover:text-green-700 transition-colors">
                            Read More
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('artikel.index') }}" class="bg-gray-900 text-white font-semibold py-3 px-8 rounded-lg hover:bg-gray-800 transition duration-300">View All Articles</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20" style="background: linear-gradient(135deg, #2d5a27 0%, #4a7a3a 100%);">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-white mb-6">Siap Mulai Menawar?</h2>
        <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">Bergabunglah dengan ribuan kolektor dan mulai perjalanan Anda menemukan barang antik langka dan berharga.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="bg-white text-green-700 font-semibold py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">Mulai Sekarang</a>
            <a href="{{ route('login') }}" class="border-2 border-white text-white hover:bg-white hover:text-green-700 font-semibold py-3 px-8 rounded-lg transition duration-300">Masuk</a>
        </div>
    </div>
