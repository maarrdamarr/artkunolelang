@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('admin.articles.index') }}">Berita</a>
    <a class="collapse-item" href="{{ route('admin.landing_sections.index') }}">Landing Sections</a>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $section->exists ? 'Edit' : 'Buat' }} Section</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            @if($section->exists)
                <form action="{{ route('admin.landing_sections.update', $section->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form action="{{ route('admin.landing_sections.store') }}" method="POST" enctype="multipart/form-data">
            @endif
                @csrf

                <div class="form-group">
                    <label for="key">Key (optional)</label>
                    <input type="text" name="key" id="key" class="form-control" value="{{ old('key', $section->key) }}">
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $section->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $section->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image (upload) — optional, leave blank to keep existing</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <input type="hidden" name="existing_image" value="{{ old('image', $section->image) }}">
                    @if($section->image)
                        <div class="mt-2">
                            @php
                                $preview = \Illuminate\Support\Str::startsWith($section->image, ['http://','https://']) ? $section->image : asset('storage/' . $section->image);
                            @endphp
                            <img src="{{ $preview }}" alt="current image" style="max-width:240px; height:auto; border-radius:4px;" />
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="order">Order</label>
                    <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $section->order ?? 0) }}">
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" name="published" id="published" class="form-check-input" value="1" {{ old('published', $section->published) ? 'checked' : '' }}>
                    <label for="published" class="form-check-label">Published</label>
                </div>

                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

@endsection
