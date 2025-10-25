@extends('layouts.user')

@section('title', 'My Produk ')

@section('content')
<div class="android-wrapper">
        <div class="content-android">
            <!-- Section: Performa Website -->
            <section class="produk-section" style="margin-bottom: 1.6rem;">
                <div class="produk-section-header">
                    <h2>My Produk</h2>
                </div>
                <div class="produk-pilihan-grid">
                    @php
                        // Default image
                        $defaultImg = 'https://media.mayar.id/images/4a3522c8-4439-4382-8d4d-ae08f39bdc4c.jpeg';

                        // Dummy data jika kosong
                        $dummyProducts = [
                            [
                                'img_url' => $defaultImg,
                                'nama_produk' => 'Produk A',
                                'kategori' => 'Kategori A',
                                'komisi_persen' => 30,
                                'click_count' => 124,
                                'earning' => 2370000,
                            ],
                            [
                                'img_url' => $defaultImg,
                                'nama_produk' => 'Produk B',
                                'kategori' => 'Kategori B',
                                'komisi_persen' => 25,
                                'click_count' => 86,
                                'earning' => 1720500,
                            ],
                            [
                                'img_url' => $defaultImg,
                                'nama_produk' => 'Produk C',
                                'kategori' => 'Kategori C',
                                'komisi_persen' => 35,
                                'click_count' => 96,
                                'earning' => 1338750,
                            ],
                        ];

                        // Gunakan products jika ada, jika tidak dummy
                        $showProducts = (isset($products) && count($products) > 0) ? $products : $dummyProducts;
                    @endphp

                    @forelse($showProducts as $produk)
                        <div class="produk-pilihan-card" style="position:relative;">
                            <div class="produk-pilihan-imgwrap">
                                <img 
                                    src="{{ $produk['img_url'] ?? ($produk->img_url ?? $defaultImg) }}" 
                                    alt="{{ $produk['nama_produk'] ?? ($produk->nama_produk ?? '-') }}"
                                    onerror="this.onerror=null;this.src='{{ $defaultImg }}';">
                            </div>
                            <div class="produk-nama" style="font-size:1.06rem;font-weight:600;color:#0f172a;">
                                {{ $produk['nama_produk'] ?? ($produk->nama_produk ?? '-') }}
                            </div>
                            <div style="font-size:.96rem;color:#757575;">
                                {{ $produk['kategori'] ?? ($produk->kategori ?? '-') }}
                            </div>
                            <div class="produk-harga" style="margin-bottom:8px;">
                                <span style="color:#0284c7;font-weight:500;">
                                    {{ $produk['click_count'] ?? ($produk->click_count ?? 0) }} klik
                                </span>
                                <span style="margin-left:12px;color:#22c55e;font-weight:500;">
                                    Komisi: {{ $produk['komisi_persen'] ?? ($produk->komisi_persen ?? 0) }}%
                                </span>
                            </div>
                            <div class="produk-komisi" style="margin-top:0;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 .79-4 2s1.79 2 4 2 4 .79 4 2-1.79 2-4 2m0-8v10m0 0v2m0-12V6" />
                                </svg>
                                @php 
                                    $earning = $produk['earning'] ?? ($produk->earning ?? null); 
                                @endphp
                                Rp
                                {{ is_numeric($earning) ? number_format($earning, 0, ',', '.') : ($earning ?? '-') }}
                            </div>
                            <div style="margin-top:12px; text-align:right;">
                                <a href="#" style="background:linear-gradient(90deg,#6366f1 0%,#f472b6 100%); color:#fff; font-weight:600; font-size:.97rem; border:none; outline:none; border-radius:9px; padding:.46rem 1.15rem; box-shadow:0 1px 8px rgba(99,102,241,0.08); text-decoration:none; transition:background .17s; display:inline-block;">
                                    Detail
                                </a>
                            </div>
                        </div>
                    @empty
                        <div style="grid-column:1 / -1; text-align:center; color:#cbd5e1; padding:2.2rem 0; font-style:italic;">
                            Belum ada produk.
                        </div>
                    @endforelse
                </div>
            </section>
            
        </div>
</div>
@endsection
