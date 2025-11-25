@extends('layouts.sb-admin')

@section('menu-items')
    <a class="collapse-item" href="{{ route('admin.articles.index') }}">Berita</a>
    <a class="collapse-item" href="{{ route('admin.landing_sections.index') }}">Landing Sections</a>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Landing Sections</h1>
        <a href="{{ route('admin.landing_sections.create') }}" class="btn btn-sm btn-primary">Buat Section</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Key</th>
                        <th>Title</th>
                        <th>Published</th>
                        <th>Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->key }}</td>
                            <td>{{ $s->title }}</td>
                            <td>{{ $s->published ? 'Yes' : 'No' }}</td>
                            <td>{{ $s->order }}</td>
                            <td>
                                <a href="{{ route('admin.landing_sections.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.landing_sections.destroy', $s->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus section?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">{{ $sections->links() }}</div>
        </div>
    </div>

@endsection
