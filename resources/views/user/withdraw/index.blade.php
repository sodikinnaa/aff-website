@extends('layouts.user')

@section('title', 'Withdraw')

@section('content')
<div class="android-wrapper">
        <div class="content-android">
            <!-- twtihdraw fitur -->
            <section class="produk-section" style="margin-bottom: 2rem;">
                <div class="produk-section-header">
                    <h2>Status Komisi & Withdraw</h2>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 18px; margin-bottom: 12px;">
                    <!-- Total Komisi -->
                    <div style="flex:1; min-width:170px; background: linear-gradient(92deg,#e0e7ef 70%,#c7d2fe 100%); border-radius:13px; padding:1.3rem 1.1rem; box-shadow:0 1px 7px rgba(100,116,139,0.07);">
                        <div style="font-size:.93rem; color:#6366f1; font-weight: 500;">Total Komisi</div>
                        <div style="font-size:1.4rem; font-weight:700; margin-top:5px; color:#3730a3;">
                            Rp0
                        </div>
                    </div>
                    <!-- Saldo Aktif / Dapat Ditarik -->
                    <div style="flex:1; min-width:170px; background: linear-gradient(92deg,#bbf7d0 80%,#f1f5f9 120%); border-radius:13px; padding:1.3rem 1.1rem; box-shadow:0 1px 7px rgba(16,185,129,0.09);">
                        <div style="font-size:.93rem; color:#16a34a; font-weight: 500;">Saldo Aktif / Dapat Ditarik</div>
                        <div style="font-size:1.4rem; font-weight:700; margin-top:5px; color:#15803d;">
                            Rp0
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 18px; margin-bottom: 20px;">
                    <!-- Saldo Pending -->
                    <div style="flex:1; min-width:170px; background: linear-gradient(92deg,#fee2e2 80%,#f1f5f9 120%); border-radius:13px; padding:1.3rem 1.1rem; box-shadow:0 1px 7px rgba(239,68,68,0.08);">
                        <div style="font-size:.93rem; color:#f87171; font-weight: 500;">Saldo Pending</div>
                        <div style="font-size:1.4rem; font-weight:700; margin-top:5px; color:#dc2626;">
                            Rp0
                        </div>
                    </div>
                    <!-- Total Ditarik -->
                    <div style="flex:1; min-width:170px; background: linear-gradient(92deg,#e0e7ef 70%,#fde68a 100%); border-radius:13px; padding:1.3rem 1.1rem; box-shadow:0 1px 7px rgba(250,204,21,0.09);">
                        <div style="font-size:.93rem; color:#fbbf24; font-weight: 500;">Total Ditarik</div>
                        <div style="font-size:1.4rem; font-weight:700; margin-top:5px; color:#b45309;">
                            Rp0
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 12px; max-width: 680px; margin-left: auto; margin-right: auto;">
                    <a href="{{ route('user.withdraw.form') }}" style="background: linear-gradient(90deg,#36d399 0%,#059669 100%); border:none; color:#fff; font-size:1.07rem; padding: .75rem 1.6rem; border-radius:14px; font-weight:700; box-shadow:0 4px 14px rgba(52,211,153,0.13); cursor:pointer; transition:background 0.2s; display:inline-flex; align-items:center; text-decoration:none;">
                        <span style="vertical-align:middle; margin-right:7px;">
                            <svg width="18" height="18" style="vertical-align:middle;opacity:0.93;" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v2a3 3 0 0 1-6 0V5m12 6v5a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-5"/><polyline points="16 5 12 1 8 5"/></svg>
                        </span>
                        Ajukan Withdraw
                    </a>
                    <a href="{{ route('user.withdraw.history') }}" style="background: linear-gradient(90deg,#f472b6 0%,#6366f1 100%); border:none; color:#fff; font-size:1.07rem; padding: .75rem 1.6rem; border-radius:14px; font-weight:700; box-shadow:0 4px 14px rgba(99,102,241,0.14); cursor:pointer; transition:background 0.2s; display:inline-flex; align-items:center; text-decoration:none;">
                        <span style="vertical-align:middle; margin-right:7px;">
                            <svg width="18" height="18" style="vertical-align:middle;opacity:0.89;" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="6" width="13" height="10" rx="2"/><path d="M16 6V4a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v2"/></svg>
                        </span>
                        Riwayat Withdraw
                    </a>
                </div>
            </section>


           
            
        </div>
</div>
@endsection
