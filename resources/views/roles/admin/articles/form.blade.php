@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('admin.articles.index') }}">Berita</a>
    <a class="collapse-item" href="{{ route('admin.kelola-user') }}">Kelola User</a>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $article->exists ? 'Edit' : 'Buat' }} Berita</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            @if($article->exists)
                <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @endif
                @csrf

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="excerpt">Ringkasan</label>
                    <input type="text" name="excerpt" id="excerpt" class="form-control" value="{{ old('excerpt', $article->excerpt) }}">
                </div>

                <div class="form-group">
                    <label for="body">Isi</label>
                    <textarea name="body" id="body" class="form-control" rows="8">{{ old('body', $article->body) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Gambar (opsional)</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @if($article->image)
                        <div class="mt-2"><img src="{{ asset('storage/' . $article->image) }}" alt="" style="max-width:200px"></div>
                    @endif
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" name="published" id="published" class="form-check-input" value="1" {{ old('published', $article->published) ? 'checked' : '' }}>
                    <label for="published" class="form-check-label">Terbitkan</label>
                </div>

                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

@endsection
