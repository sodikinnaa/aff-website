@extends('layouts.user')

@section('title', 'History Withdraw')

@section('content')
<div class="android-wrapper">
        <div class="content-android">
            

            <section class="produk-section" style="margin-bottom: 1.6rem;">
                <div class="produk-section-header">
                    <h2>Riwayat Withdraw</h2>
                </div>
                <div style="display: flex; flex-direction: column; gap: 17px;">
                    @php
                        $withdraws = [
                            [
                                'tanggal' => '25 Okt 2025',
                                'nominal' => 500000,
                                'status' => 'Pending',
                                'metode' => 'Bank BCA',
                                'id' => 1
                            ],
                            [
                                'tanggal' => '10 Okt 2025',
                                'nominal' => 350000,
                                'status' => 'Diterima',
                                'metode' => 'OVO',
                                'id' => 2
                            ],
                            [
                                'tanggal' => '02 Okt 2025',
                                'nominal' => 800000,
                                'status' => 'Ditolak',
                                'metode' => 'Bank BNI',
                                'id' => 3
                            ]
                        ];
                    @endphp
                    @foreach ($withdraws as $withdraw)
                        <div style="background:#fff; border-radius:13px; box-shadow:0 1px 5px rgba(99,102,241,0.07); padding:1.15rem 1.1rem; display:flex; flex-direction:column; gap:7px; position:relative;">
                            <div style="display:flex; align-items:center; justify-content:space-between;">
                                <span style="font-weight:500; color:#6366f1;">{{ $withdraw['tanggal'] }}</span>
                                <span style="font-weight:700; color:#059669;">Rp {{ number_format($withdraw['nominal'],0,',','.') }}</span>
                            </div>
                            <div style="display:flex; align-items:center; justify-content:space-between; font-size:.98rem;">
                                <span style="color:#64748b;">{{ $withdraw['metode'] }}</span>
                                @php
                                    $status = $withdraw['status'];
                                    if($status == 'Pending'){
                                        $badgeColor = '#eab308';
                                        $badgeBG = '#fef9c3';
                                    }elseif($status == 'Diterima'){
                                        $badgeColor = '#16a34a';
                                        $badgeBG = '#bbf7d0';
                                    }else{
                                        $badgeColor = '#dc2626';
                                        $badgeBG = '#fee2e2';
                                    }
                                @endphp
                                <span style="font-weight:600;color:{{ $badgeColor }};background:{{ $badgeBG }};border-radius:7px;padding:2px 13px;font-size:.96rem;">{{ $status }}</span>
                            </div>
                            <div style="margin-top:7px; display:flex; justify-content:flex-end;">
                                <a href="#" style="background:linear-gradient(90deg,#6366f1 0%,#f472b6 100%); color:#fff; font-weight:600; font-size:.97rem; border:none; outline:none; border-radius:9px; padding:.5rem 1.15rem; box-shadow:0 1px 8px rgba(99,102,241,0.09); text-decoration:none; transition:background .19s; display:inline-block;">
                                    Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{-- 
                    <div style="text-align:center;color:#cbd5e1;padding:2rem 0;font-style:italic;">Belum ada riwayat withdraw.</div> 
                    --}}
                </div>
            </section>


           
            
        </div>
</div>
@endsection
