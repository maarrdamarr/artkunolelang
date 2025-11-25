@extends('layouts.sb-admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3">{{ $method->exists ? 'Edit' : 'Add' }} Payment Method</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ $method->exists ? route('user.payment-methods.update', $method) : route('user.payment-methods.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($method->exists)
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-control">
                        <option value="qr" {{ old('type', $method->type) == 'qr' ? 'selected' : '' }}>QR</option>
                        <option value="bank" {{ old('type', $method->type) == 'bank' ? 'selected' : '' }}>Bank</option>
                        <option value="ewallet" {{ old('type', $method->type) == 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
                        <option value="manual" {{ old('type', $method->type) == 'manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Label (optional)</label>
                    <input type="text" name="label" class="form-control" value="{{ old('label', $method->label) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Details (JSON or plain text)</label>
                    <textarea name="details" class="form-control" rows="4">{{ old('details', is_array($method->details) ? json_encode($method->details) : $method->details) }}</textarea>
                    <small class="form-text text-muted">For bank: {"bank":"BCA","account":"1234","owner":"Nama"}. For QR: leave empty and upload image.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">QR Image (optional)</label>
                    <input type="file" name="image" class="form-control-file">
                    @if($method->image)
                        <div class="mt-2"><img src="{{ asset('storage/'.$method->image) }}" style="height:120px"></div>
                    @endif
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="active" value="1" class="form-check-input" id="active" {{ old('active', $method->active) ? 'checked' : '' }}>
                    <label for="active" class="form-check-label">Active</label>
                </div>

                <button class="btn btn-primary">{{ $method->exists ? 'Update' : 'Create' }}</button>
                <a href="{{ route('user.payment-methods.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
