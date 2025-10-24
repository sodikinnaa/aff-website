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
                <div class="col">
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
                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-8">
                                    {{ $website->status ?? '-' }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar Token API Dummy --}}
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h3 class="card-title mb-0">Daftar Token API</h3>
                            <!-- Tombol Generate Token lebih baik ditempatkan di kanan header card -->
                            <form action="{{ route('admin.token.generate') }}" method="POST" class="mb-0">
                                @csrf
                                <input type="hidden" name="website_id" value="{{ $website->id }}">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-key"></i> Generate Token
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            @if(count($tokens) > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped mb-0 w-100" style="min-width:650px;">
                                        <thead>
                                            <tr>
                                                <th style="white-space:nowrap;">User ID</th>
                                                <th style="white-space:nowrap;">Token</th>
                                                <!-- <th style="white-space:nowrap;">Expired At</th> -->
                                                <th style="white-space:nowrap;">Tanggal Dibuat</th>
                                                <th style="white-space:nowrap;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tokens as $i => $token)
                                                <tr>
                                                    <td style="vertical-align: middle;">{{ $token->user_id }}</td>
                                                    <td style="vertical-align: middle;max-width:180px;word-break:break-all;">
                                                        <div class="d-flex align-items-center">
                                                            <code class="d-block overflow-auto mb-0" style="word-break: break-all;">
                                                                {{ str_repeat('*', max(6, strlen($token->token))) }}
                                                            </code>
                                                            <button type="button" class="btn btn-link btn-sm ms-2 copy-token-btn" 
                                                                title="Copy Token" 
                                                                data-token="{{ $token->token }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <rect x="9" y="9" width="13" height="13" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                                                                    <rect x="3" y="3" width="13" height="13" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                                                                </svg>
                                                            </button>
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    // Only add if not already injected
                                                                    if (!document.getElementById('copy-token-toast-styles')) {
                                                                        let style = document.createElement('style');
                                                                        style.id = 'copy-token-toast-styles';
                                                                        style.innerHTML = `
                                                                            .token-toast {
                                                                                position: fixed;
                                                                                z-index: 9999;
                                                                                left: 50%;
                                                                                bottom: 32px;
                                                                                transform: translateX(-50%);
                                                                                background: #323232;
                                                                                color: #fff;
                                                                                padding: 10px 20px;
                                                                                border-radius: 8px;
                                                                                display: flex;
                                                                                align-items: center;
                                                                                box-shadow: 0 4px 16px rgba(0,0,0,0.15);
                                                                                font-size: 1rem;
                                                                                opacity: 0;
                                                                                pointer-events: none;
                                                                                transition: opacity 0.2s;
                                                                            }
                                                                            .token-toast.show {
                                                                                opacity: 1;
                                                                                pointer-events: auto;
                                                                            }
                                                                            .token-toast code {
                                                                                background: rgba(255,255,255,0.08);
                                                                                border-radius: 4px;
                                                                                margin-left: 6px;
                                                                                color: #fff;
                                                                                font-size: 0.95em;
                                                                                padding: 2px 6px;
                                                                            }
                                                                        `;
                                                                        document.head.appendChild(style);
                                                                    }
                                                                });

                                                                function showCopyTokenToast(token) {
                                                                    let toast = document.getElementById('copy-token-toast');
                                                                    if (!toast) {
                                                                        toast = document.createElement('div');
                                                                        toast.id = 'copy-token-toast';
                                                                        toast.className = 'token-toast';
                                                                        document.body.appendChild(toast);
                                                                    }
                                                                    toast.innerHTML = '<span>Token berhasil disalin!</span> <code>' + token + '</code>';
                                                                    toast.classList.add('show');
                                                                    setTimeout(function() {
                                                                        toast.classList.remove('show');
                                                                    }, 2200);
                                                                }

                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    document.querySelectorAll('.copy-token-btn').forEach(function(btn) {
                                                                        btn.addEventListener('click', function() {
                                                                            var token = this.getAttribute('data-token');
                                                                            var origIcon = this.querySelector('svg');
                                                                            var origSvg = origIcon ? origIcon.outerHTML : '';
                                                                            
                                                                            // Change icon to checkmark
                                                                            this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><polyline points="20 6 9.5 17 4 11.5" stroke-width="2" stroke="currentColor" fill="none"/></svg>`;
                                                                            
                                                                            navigator.clipboard.writeText(token).then(() => {
                                                                                showCopyTokenToast(token);
                                                                            });
                                                                            
                                                                            setTimeout(() => {
                                                                                this.innerHTML = origSvg;
                                                                            }, 1600);
                                                                        });
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </td>
                                                    <!-- <td style="vertical-align: middle;">
                                                        {{ $token->expired_at ? \Carbon\Carbon::parse($token->expired_at)->format('d M Y H:i') : '-' }}
                                                    </td> -->
                                                    <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($token->created_at)->format('d M Y H:i') }}</td>
                                                    <td style="vertical-align: middle;">
                                                        <form 
                                                            action="{{ route('admin.token.delete', ['id' => $token->id]) }}" 
                                                            method="POST" 
                                                            style="display:inline;"
                                                            onsubmit="return confirm('Anda yakin ingin menghapus token ini?');"
                                                        >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" type="submit" title="Hapus Token">
                                                                <i class="fas fa-trash"></i> Hapus Token
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
