@extends('layouts.user')

@section('title', 'Profile')

@section('content')
<div class="android-wrapper">
        <div class="content-android">
            <!-- Section: Performa Website -->
            <section class="produk-section" style="margin-bottom: 1.6rem;">
                <div class="produk-section-header">
                    <h2>Menu Profil</h2>
                </div>
                <div style="display: flex; flex-direction: column; gap: 14px;">
                    <a href="#" style="display: flex; align-items: center; padding: 1rem 1rem; background: #f1f5f9; color: #1e293b; border-radius: 11px; text-decoration: none; font-weight: 500; font-size:1.08rem; box-shadow: 0 1px 6px rgba(59,130,246,0.04);">
                        <svg height="22" width="22" fill="none" stroke="#6366f1" stroke-width="2" style="margin-right:13px;" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="8" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v2"/></svg>
                        Data Diri
                    </a>
                    <a href="#" style="display: flex; align-items: center; padding: 1rem 1rem; background: #f1f5f9; color: #1e293b; border-radius: 11px; text-decoration: none; font-weight: 500; font-size:1.08rem; box-shadow: 0 1px 6px rgba(59,130,246,0.04);">
                        <svg height="22" width="22" fill="none" stroke="#fbbf24" stroke-width="2" style="margin-right:13px;" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="5" width="16" height="13" rx="2"/><path d="M16 3v4m-8-4v4"/></svg>
                        Ganti Password
                    </a>
                    <a href="{{ route('logout') }}" style="display: flex; align-items: center; padding: 1rem 1rem; background: #f1f5f9; color: #1e293b; border-radius: 11px; text-decoration: none; font-weight: 500; font-size:1.08rem; box-shadow: 0 1px 6px rgba(59,130,246,0.04);">
                        <svg height="22" width="22" fill="none" stroke="#ef4444" stroke-width="2" style="margin-right:13px;" stroke-linecap="round" stroke-linejoin="round"><path d="M15 12V9a3 3 0 0 0-6 0v3"/><path d="M3 8a2 2 0 0 1 2-2h2l1-2h6l1 2h2a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8z"/></svg>
                        Keluar Akun
                    </a>
                </div>
            </section>
            
        </div>
</div>
@endsection
