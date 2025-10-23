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
                           

                            @if(count($tokens) > 0)
                                <div class="d-none d-md-block table-responsive">
                                    {{-- Desktop/tablet view --}}
                                    <table class="table table-bordered table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Website ID</th>
                                                <th>Token</th>
                                                <th>Expired At</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Terakhir Diperbarui</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tokens as $i => $token)
                                                <tr>
                                                    <td>{{ $token->user_id }}</td>
                                                    <td>{{ $token->website_id }}</td>
                                                    <td>
                                                        <code>{{ $token->token }}</code>
                                                    </td>
                                                    <td>
                                                        {{ $token->expired_at ? \Carbon\Carbon::parse($token->expired_at)->format('d M Y H:i') : '-' }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($token->created_at)->format('d M Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($token->updated_at)->format('d M Y H:i') }}</td>
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
                                             
                                                <div class="mb-1"><strong>Token:</strong> <code class="d-block overflow-auto" style="word-break: break-all;">{{ $token->token }}</code></div>
                                                <div class="mb-1">
                                                <div><strong>Tanggal Dibuat:</strong> {{ \Carbon\Carbon::parse($token->created_at)->format('d M Y H:i') }}</div>
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
