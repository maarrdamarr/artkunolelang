@extends('layouts.sb-admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Payment Methods</h1>
        <a href="{{ route('user.payment-methods.create') }}" class="btn btn-primary">Add Payment Method</a>
    </div>

    <div class="mb-3">
        <div class="alert alert-info mb-0">Need help? Contact via WhatsApp: <a href="https://wa.me/62882009047730" target="_blank">+62 882-0090-47730</a></div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($methods->isEmpty())
                <p>No payment methods yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Label</th>
                                <th>Details</th>
                                <th>Image</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($methods as $m)
                            <tr>
                                <td>{{ $m->type }}</td>
                                <td>{{ $m->label }}</td>
                                <td style="max-width:320px">@if($m->details) <pre style="white-space:pre-wrap">{{ json_encode($m->details) }}</pre> @endif</td>
                                <td>
                                    @if($m->image)
                                        <img src="{{ asset('storage/'.$m->image) }}" alt="qr" style="height:48px">
                                    @endif
                                </td>
                                <td>{{ $m->active ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('user.payment-methods.edit', $m) }}" class="btn btn-sm btn-secondary">Edit</a>
                                    <form action="{{ route('user.payment-methods.destroy', $m) }}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this payment method?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
