@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="page-wrapper">
    <!-- BEGIN PAGE HEADER -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h1 class="page-title">{{ $title }}</h1>
                    <div class="text-secondary small mt-1">
                        Detail dari Website dengan nama: <span class="fw-bold">{{ $website->nama_web ?? $website->name ?? '-' }}</span>
                    </div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('admin.website') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- BEGIN PAGE BODY -->
    <main id="content" class="page-body">
        <div class="container-xl">
            {{-- Tampilkan pesan sukses/gagal jika ada --}}
            @foreach (['success', 'error', 'warning', 'info'] as $msg)
                @if(session($msg))
                    <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
                        <div class="alert-description">{!! session($msg) !!}</div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
            @endforeach

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Informasi Website</h3>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Nama Website</dt>
                                <dd class="col-sm-8">{{ $website->nama_web ?? $website->name ?? '-' }}</dd>

                                <dt class="col-sm-4">Url Website</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ $website->url }}" target="_blank" rel="noopener">
                                        {{ $website->url }}
                                    </a>
                                </dd>
                                <dt class="col-sm-4">Deskripsi</dt>
                                <dd class="col-sm-8">
                                    {{ $website->deskripsi ?? '-' }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar Token API Dummy --}}
            <div class="row mt-4">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Daftar Token API</h3>
                        </div>
                        <div class="card-body">
                            @php
                                // Dummy tokens (simulasi data, nanti bisa diambil dari relasi model jika sudah ada)
                                $tokens = [
                                    [
                                        'token' => '1234567890abcdef',
                                        'name' => 'Main Token',
                                        'created_at' => '2024-05-01 10:22:31',
                                        'status' => 'active'
                                    ],
                                    [
                                        'token' => 'abcdef1234567890',
                                        'name' => 'Server To Server',
                                        'created_at' => '2024-04-20 08:10:55',
                                        'status' => 'inactive'
                                    ],
                                ];
                            @endphp

                            @if(count($tokens) > 0)
                                <div class="d-none d-md-block table-responsive">
                                    {{-- Desktop/tablet view --}}
                                    <table class="table table-bordered table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Token</th>
                                                <th>Nama Token</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tokens as $i => $token)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>
                                                        <code>{{ $token['token'] }}</code>
                                                    </td>
                                                    <td>{{ $token['name'] }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($token['created_at'])->format('d M Y H:i') }}</td>
                                                    <td>
                                                        @if($token['status'] === 'active')
                                                            <span class="badge bg-success">Aktif</span>
                                                        @else
                                                            <span class="badge bg-secondary">Nonaktif</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Mobile friendly version --}}
                                <div class="d-md-none">
                                    @foreach($tokens as $i => $token)
                                        <div class="card mb-2 border shadow-sm">
                                            <div class="card-body py-2 px-3">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <small class="text-muted fw-bold">#{{ $i + 1 }}</small>
                                                    <span>
                                                        @if($token['status'] === 'active')
                                                            <span class="badge bg-success">Aktif</span>
                                                        @else
                                                            <span class="badge bg-secondary">Nonaktif</span>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="mb-1"><strong>Token:</strong> <code class="d-block overflow-auto" style="word-break: break-all;">{{ $token['token'] }}</code></div>
                                                <div class="mb-1"><strong>Nama:</strong> {{ $token['name'] }}</div>
                                                <div><strong>Tanggal Dibuat:</strong> {{ \Carbon\Carbon::parse($token['created_at'])->format('d M Y H:i') }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info mb-0">
                                    Belum ada token untuk website ini.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END PAGE BODY -->
</div>
@endsection
