@extends('layouts.user')

@section('title', 'User Dashboard')

@section('content')

<div class="android-wrapper">
        <div class="content-android">
            
            <!-- Android Affiliator Hub Card Template -->
            <section style="display:flex;align-items:center;gap:16px;margin-bottom:1.5rem;">
                <div style="width:56px;height:56px;border-radius:16px;background:linear-gradient(135deg, #3b82f6 40%, #1e293b 100%);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(59,130,246,0.11);">
                    <!-- User Initials/Avatar Icon -->
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="12" fill="#fff" fill-opacity=".22"/>
                        <path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM12 14c-4 0-8 2-8 4v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-2c0-2-4-4-8-4Z" fill="#3b82f6"/>
                    </svg>
                </div>
                <div>
                    <div style="font-size:1.2rem;font-weight:600;letter-spacing:.01em;color:var(--color-text-primary);margin-bottom:2px;">
                        Hallo, Partner!
                    </div>
                    <div style="font-size:.98rem;color:var(--color-text-secondary);">
                        Selamat datang kembali,<br>
                        <strong style="font-weight:600;color:#3b82f6;">Sodikin</strong>
                    </div>
                </div>
            </section>

            <!-- Section: Performa Website -->
            <section class="produk-section" style="margin-bottom: 1.6rem;">
                <div class="produk-section-header">
                    <h2>Performa Anda </h2>
                    <a href="#" style="
                            font-size: 0.94rem;
                            padding: 5px 15px;
                            color: #0ea5e9;
                            background: #e0f2fe;
                            border-radius: 7px;
                            font-weight: 500;
                            text-decoration: none;
                            transition: background .15s;
                        " onmouseover="this.style.background='#bae6fd';" onmouseout="this.style.background='#e0f2fe';">
                            Selengkapnya &rsaquo;
                        </a>
                </div>
                <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                    <!-- visitor  -->
                    <div style="flex:1; min-width:160px; background: linear-gradient(92deg,#fff7ca 80%,#f1f5f9 110%); border-radius:13px; padding:1.2rem 1rem; box-shadow:0 1px 7px rgba(250,204,21,0.09); display: flex; flex-direction: column; align-items: flex-start;">
                        <div style="font-size:.99rem; color:#b45309; font-weight: 600;">Visitor</div>
                        <div style="font-size:1.55rem; font-weight:700; margin-top:4px; color:#78350f;">
                            {{ number_format($stat_total_visitor ?? 0, 0, ',', '.') }}
                        </div>
                    </div>
                    <!-- Total Klik -->
                    <div style="flex:1; min-width:160px; background: linear-gradient(92deg,#dbeafe 80%,#f1f5f9 110%); border-radius:13px; padding:1.2rem 1rem; box-shadow:0 1px 7px rgba(59,130,246,0.07); display: flex; flex-direction: column; align-items: flex-start;">
                        <div style="font-size:.99rem; color:#2563eb; font-weight: 600;">Total Klik</div>
                        <div style="font-size:1.55rem; font-weight:700; margin-top:4px; color:#1e293b;">
                            {{ number_format($stat_total_klik ?? 0, 0, ',', '.') }}
                        </div>
                    </div>
                    <!-- Total Penghasilan -->
                    <div style="flex:1; min-width:160px; background: linear-gradient(92deg,#bbf7d0 80%,#f1f5f9 120%); border-radius:13px; padding:1.2rem 1rem; box-shadow:0 1px 7px rgba(16,185,129,0.09); display: flex; flex-direction: column; align-items: flex-start;">
                        <div style="font-size:.99rem; color:#15803d; font-weight: 600;">Total Penghasilan</div>
                        <div style="font-size:1.55rem; font-weight:700; margin-top:4px; color:#15803d;">
                            Rp{{ number_format($stat_total_pendapatan ?? 0, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </section>
            @foreach($websites->where('status', 'active') as $website)
                <section class="produk-section">
                    <div class="produk-section-header">
                        <h2>Produk {{ $website->nama_web }} 💰</h2>
                        <a href="{{ route('user.website.produk', ['id_web' => $website->id]) }}" style="
                            font-size: 0.94rem;
                            padding: 5px 15px;
                            color: #0ea5e9;
                            background: #e0f2fe;
                            border-radius: 7px;
                            font-weight: 500;
                            text-decoration: none;
                            transition: background .15s;
                        " onmouseover="this.style.background='#bae6fd';" onmouseout="this.style.background='#e0f2fe';">
                            Lihat Semua &rsaquo;
                        </a>
                    </div>

                    <div class="produk-pilihan-grid">
                        @forelse($website->products as $p)
                        <div class="produk-pilihan-card">
                            @if(!empty($p->hot) && $p->hot)
                                <div class="badge-hot">Hot</div>
                            @endif
                            <div class="produk-pilihan-imgwrap">
                                <img src="{{ $p->img_url }}" alt="{{ $p->nama_produk }}">
                            </div>
                            <div class="produk-nama">{{ $p->nama_produk }}</div>
                            <div class="produk-harga">Rp{{ number_format($p->price, 0, ',', '.') }}</div>
                            <div class="produk-komisi">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 .79-4 2s1.79 2 4 2 4 .79 4 2-1.79 2-4 2m0-8v10m0 0v2m0-12V6" />
                                </svg>
                                {{ $p->komisi_persen }}%
                            </div>
                        </div>
                        @empty
                        <p style="color:#6b7280;">Belum ada produk aktif di website ini.</p>
                        @endforelse
                    </div>
                </section>
            @endforeach
        </div>
    </div>
@endsection

