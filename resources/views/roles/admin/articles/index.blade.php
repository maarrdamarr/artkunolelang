@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('admin.kelola-user') }}">Kelola User</a>
    <a class="collapse-item" href="{{ route('admin.verifikasi-barang') }}">Verifikasi Barang</a>
    <a class="collapse-item" href="{{ route('admin.articles.index') }}">Berita</a>
    <a class="collapse-item" href="{{ route('admin.laporan') }}">Laporan</a>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Berita</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-primary">Buat Berita</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->user->name ?? 'Admin' }}</td>
                                <td>{{ $article->published ? 'Published' : 'Draft' }}</td>
                                <td>{{ $article->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus artikel ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">{{ $articles->links() }}</div>
        </div>
    </div>

@endsection
