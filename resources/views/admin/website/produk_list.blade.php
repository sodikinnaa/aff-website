@extends('layouts.admin')
@section('title', $title ?? 'Daftar Produk Website')
@section('content')
<div class="page-wrapper">
    <!-- BEGIN PAGE HEADER -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h1 class="page-title">{{ $title ?? 'Detail Produk Website' }}</h1>
                </div>
                <div class="col-auto ms-auto d-print-none d-flex gap-2">
                    <a href="{{ route('admin.website.produk.sync', ['id' => $website->id]) }}"
                       class="btn btn-success">
                        <i class="icon icon-refresh"></i> Sinkronisasi Produk
                    </a>
                    <a href="{{ route('admin.website.list') }}" class="btn btn-secondary">
                        Kembali ke Daftar Website
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- BEGIN PAGE BODY -->
    <main id="content" class="page-body">
        <div class="container-xl">

            @foreach (['success', 'error', 'warning', 'info'] as $msg)
                @if(session($msg))
                    <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
                        <div class="alert-description">{!! session($msg) !!}</div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
            @endforeach

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Informasi Website</h3>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Nama Website</dt>
                                <dd class="col-sm-8">{{ $website->nama_web ?? $website->name ?? '-' }}</dd>

                                <dt class="col-sm-4">URL Website</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ $website->url }}" target="_blank" rel="noopener">
                                        {{ $website->url }}
                                    </a>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar Produk Website --}}
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @if(count($produkList) > 0)
                                <div class="d-flex flex-wrap gap-3 justify-content-start">
                                    @foreach($produkList as $i => $produk)
                                        <div class="card h-100 shadow-sm border-0 position-relative mb-3 produk-card" style="flex: 1 1 200px; min-width: 250px; max-width: 320px;">
                                            <div class="card-image position-relative" style="width: 100%; aspect-ratio: 16/9; background: #f1f1f1; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                                {{-- Tampilkan gambar produk dengan ukuran penuh pada kontainer --}}
                                                @if (!empty($produk->img_url))
                                                    <img src="{{ $produk->img_url }}" alt="{{ $produk->nama_produk ?? 'Nama Produk' }}" class="img-fluid rounded"
                                                        style="width: 100%; height: 100%; object-fit: cover; aspect-ratio: 16/9;">
                                                @else
                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($produk->nama_produk ?? 'Produk') }}&background=0D8ABC&color=fff&size=300" alt="{{ $produk->nama_produk ?? 'Nama Produk' }}" class="img-fluid rounded"
                                                        style="width: 100%; height: 100%; object-fit: cover; aspect-ratio: 16/9;">
                                                @endif
                                                <div class="position-absolute top-50 start-50 translate-middle d-flex gap-2" style="z-index:2;">
                                                    <a href="{{ route('admin.website.produk.edit', ['id' => $produk->id]) }}" class="badge bg-azure text-azure-fg d-flex align-items-center gap-1 text-decoration-none shadow" style="font-size: 1rem; opacity: 0.95;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M16 3l4 4l-12 12h-4v-4z" />
                                                            <path d="M13 6l4 4" />
                                                        </svg>
                                                        
                                                    </a>
                                                    <form action="{{ route('admin.website.produk.delete', ['id' => $produk->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="badge bg-red text-red-fg d-flex align-items-center gap-1 shadow border-0" style="font-size: 1rem; opacity: 0.95;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                            
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-body pb-2">
                                                <h5 class="card-title mb-2" style="font-size: 1rem; font-weight: bold; color: #222;">
                                                    {{ $produk->nama_produk ?? '-' }}
                                                </h5>
                                                <div class="mb-1 small text-muted" title="URL Produk" style="word-break: break-all;">
                                                    <i class="fas fa-link"></i>
                                                    {{ Str::limit($produk->url, 40, '...') }}
                                                </div>
                                                <div class="d-flex flex-wrap gap-2 mt-2 align-items-center mb-3 badges-list">
                                                    <span class="badge bg-green text-green-fg" title="Harga Produk">
                                                        <i class="fas fa-money-bill-wave"></i>
                                                        Rp {{ number_format($produk->price ?? 0, 0, ',', '.') }}
                                                    </span>
                                                    <span class="badge bg-azure text-azure-fg" title="Komisi Produk">
                                                        <i class="fas fa-percent"></i>
                                                        {{ $produk->komisi_persen ?? '0' }}%
                                                    </span>
                                                    <span class="badge bg-dark text-dark-fg" title="No">
                                                        #{{ $i + 1 }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <style>
                                            @media (max-width: 576px) {
                                                .produk-card {
                                                    min-width: 100% !important;
                                                    max-width: 100% !important;
                                                    flex-basis: 100% !important;
                                                    margin-left: 0 !important;
                                                    margin-right: 0 !important;
                                                }
                                            }
                                        </style>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info mb-0">
                                    Belum ada produk di website ini.
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
