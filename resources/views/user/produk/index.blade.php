@extends('layouts.user')

@section('title', 'Produk Website ')

@section('content')
<div class="android-wrapper">
        <div class="content-android">
            <!-- Section: Performa Website -->
            <section class="produk-section" style="margin-bottom: 1.6rem;">
                <div class="produk-section-header">
                    <h2>Daftar Produk</h2>
                   
                </div>
                <div class="produk-pilihan-grid">
                    

                    @foreach($products as $p)
                    <div class="produk-pilihan-card">
                        @if(!empty($p['hot']) && $p['hot'])
                            <div class="badge-hot">Hot</div>
                        @endif
                        <div class="produk-pilihan-imgwrap">
                            <img src="{{ $p['img_url'] }}" alt="{{ $p['nama_produk'] }}">
                        </div>
                        <div class="produk-nama">{{ $p['nama_produk'] }}</div>
                        <div class="produk-harga">Rp{{ number_format($p['price'], 0, ',', '.') }}</div>
                        <div class="produk-komisi">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="height: 16px; width: 16px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 .79-4 2s1.79 2 4 2 4 .79 4 2-1.79 2-4 2m0-8v10m0 0v2m0-12V6" />
                            </svg>
                            {{ $p['komisi_persen'] }}%
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            
        </div>
</div>
@endsection
