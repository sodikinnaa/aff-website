@extends('layouts.admin')

@section('title', 'Daftar Website Aktiv')

@section('content')
<div class="page-wrapper">
    <!-- BEGIN PAGE HEADER -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h1 class="page-title">{{ $title ?? 'Daftar Website Aktiv' }}</h1>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/logout -->
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                                focusable="false"
                                class="icon icon-2 me-1"
                                >
                                <path d="M14 8l4 4l-4 4" />
                                <path d="M3 12h15" />
                                <path d="M7 12v-7a2 2 0 0 1 2 -2h4" />
                                <path d="M13 21h-4a2 2 0 0 1 -2 -2v-3" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- BEGIN PAGE BODY -->
    <main id="content" class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Website Aktif</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Website</th>
                                        <th>Domain</th>
                                        <th>Status</th>
                                        <th>Dibuat Pada</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($websites as $website)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $website->nama_web }}</td>
                                            <td><a href="{{ $website->url }}" target="_blank">{{ $website->url }}</a></td>
                                            <td>
                                                @if($website->is_active)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Non-Aktif</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($website->created_at)->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.website.list.detail', $website->id) }}" class="btn btn-sm btn-warning">
                                                    Produk
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-secondary">Belum ada data website aktif.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END PAGE BODY -->
</div>

@endsection
