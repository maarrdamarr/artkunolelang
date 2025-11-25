@extends('layouts.public')

@section('content')
    @php
        // fallback images if sections or images missing
        $heroImage = $sections->firstWhere('key','hero')->image ?? 'https://images.unsplash.com/photo-1523978591478-c753949ff840?w=1400&q=80&auto=format&fit=crop';
    @endphp

    <!-- Hero -->
    <section class="jumbotron jumbotron-fluid text-white" style="background-image: url('{{ $heroImage }}'); background-size: cover; background-position: center;">
        <div class="container" style="background: rgba(0,0,0,0.35); padding: 80px 30px;">
            <h1 class="display-4 font-weight-bold">{{ $sections->firstWhere('key','hero')->title ?? 'Discover Antique Treasures' }}</h1>
            <p class="lead">{{ $sections->firstWhere('key','hero')->description ?? 'Explore curated antique auctions and timeless pieces.' }}</p>
            <p>
                <a href="#collections" class="btn btn-primary btn-lg">Explore Collections</a>
                <a href="{{ route('user.browse') }}" class="btn btn-outline-light btn-lg">Lihat Lelang</a>
            </p>
        </div>
    </section>

    <div class="container my-5">
        <!-- Featured Collections -->
        <section id="collections" class="mb-5">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="h4">{{ $sections->firstWhere('key','destinations')->title ?? 'Featured Collections' }}</h2>
                    <p class="text-muted">{{ $sections->firstWhere('key','destinations')->description ?? 'Popular categories and curated collections.' }}</p>
                </div>
            </div>

            <div class="row">
                @foreach($sections->where('key','!=','hero')->take(6) as $section)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ $section->image ?? 'https://images.unsplash.com/photo-1549880338-65ddcdfd017b?w=1200&q=80&auto=format&fit=crop' }}" class="card-img-top" alt="{{ $section->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $section->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($section->description ?? ''), 120) }}</p>
                                <a href="#" class="btn btn-sm btn-primary">Lihat Koleksi</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Articles -->
        <section id="artikel" class="mb-5">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="h4">Berita & Artikel Terbaru</h2>
                </div>
            </div>

            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?w=1200&q=80&auto=format&fit=crop" class="card-img-top" alt="{{ $article->title }}">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->excerpt }}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                            <div class="card-footer small text-muted">{{ $article->published_at?->format('d M Y') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    {{ $articles->links() }}
                </div>
            </div>
        </section>
    </div>

@endsection
