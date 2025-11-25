@extends('layouts.public')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h3">{{ $article->title }}</h1>
                <p class="text-muted">{{ $article->published_at?->format('d M Y') }} | oleh {{ $article->user->name ?? 'Admin' }}</p>
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
                @endif
                <div class="article-body">{!! nl2br(e($article->body)) !!}</div>
            </div>
        </div>
    </div>
@endsection
