@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="alert alert-info mb-3">
                <h1 class="mb-2 h3"><i class="ti ti-dashboard"></i> Dashboard Admin</h1>
                <p>Selamat datang di dashboard admin. Ini adalah tampilan sementara dashboard.</p>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Anda dapat menambah menu atau widget lainnya di sini sesuai kebutuhan admin.
                    </p>
                    <hr>
                    <ul class="list-group list-group-flush mb-0">
                        <li class="list-group-item">
                            <i class="ti ti-users"></i> <a href="{{ route('admin.users') }}">Manajemen Pengguna</a>
                        </li>
                        <li class="list-group-item">
                            <i class="ti ti-report-analytics"></i> <a href="{{ route('admin.reports') }}">Laporan Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
