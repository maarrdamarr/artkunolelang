@extends('layouts.public')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Artikel & Tips Koleksi</h1>

    @if($articles->count() > 0)
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="object-fit: cover; height: 200px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            @if($article->excerpt)
                                <p class="card-text">{{ Str::limit($article->excerpt, 100) }}</p>
                            @endif
                            <small class="text-muted">Diterbitkan: {{ $article->published_at->format('d M Y') }}</small>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    @else
        <p class="text-center">Belum ada artikel yang tersedia.</p>
    @endif
</div>
@endsection
