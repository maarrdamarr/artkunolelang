@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard User') }}</div>

                <div class="card-body">
                    <h5>Selamat datang, {{ Auth::user()->name }}!</h5>
                    <p>Anda login sebagai <strong>User</strong></p>
                    
                    <div class="alert alert-info" role="alert">
                        Ini adalah halaman dashboard untuk user biasa. 
                        Di sini Anda dapat melihat informasi profil dan aktivitas Anda.
                    </div>

                    <div class="mt-4">
                        <h6>Informasi Akun</h6>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                            <li class="list-group-item"><strong>Role:</strong> <span class="badge bg-primary">{{ Auth::user()->role }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
