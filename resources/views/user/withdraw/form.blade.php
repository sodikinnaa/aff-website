@extends('layouts.user')

@section('title', 'Form Withdraw')

@section('content')
<div class="android-wrapper">
        <div class="content-android">
            



       
            <section class="produk-section" style="margin-bottom: 1.6rem;">
                <div class="produk-section-header">
                    <h2>Form Pengajuan Withdraw</h2>
                </div>
                <style>
                    .withdraw-form-group {
                        max-width: 100%;
                        width: 100%;
                        margin: 0 auto 0 auto;
                    }
                    .withdraw-form-group label {
                        font-weight: 600;
                        color: #3730a3;
                        display: block;
                        margin-bottom: 7px;
                    }
                    .withdraw-form-input,
                    .withdraw-form-select,
                    .withdraw-form-textarea {
                        width: 100%;
                        box-sizing: border-box;
                        padding: .78rem 1rem;
                        border-radius: 12px;
                        border: 1px solid #c7d2fe;
                        background: #f9fafb;
                        font-size: 1.06rem;
                        margin-bottom: 0;
                    }
                    .withdraw-form-btn {
                        width: 100%;
                        background: linear-gradient(90deg,#34d399 0%,#059669 100%);
                        border: none;
                        color: #fff;
                        font-size: 1.14rem;
                        padding: .95rem 0;
                        border-radius: 14px;
                        font-weight: 700;
                        box-shadow: 0 5px 15px rgba(52,211,153,0.22);
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 8px;
                        transition: all .22s;
                        margin-top: 8px;
                    }
                </style>
                <form action="#" method="POST" style="display:flex; flex-direction:column; gap:18px; align-items:center;">
                    @csrf
                    <!-- Nominal Withdraw -->
                    <div class="withdraw-form-group">
                        <label for="nominal">Nominal Withdraw</label>
                        <input type="number" min="10000" step="1000" id="nominal" name="nominal" placeholder="Masukkan nominal (minimal Rp10.000)" required
                            class="withdraw-form-input">
                    </div>
                    <!-- Metode Pembayaran -->
                    <div class="withdraw-form-group">
                        <label for="metode">Metode Pembayaran</label>
                        <select id="metode" name="metode" required class="withdraw-form-select">
                            <option value="" disabled selected>Pilih metode pembayaran</option>
                            <option value="bca">Bank BCA</option>
                            <option value="bni">Bank BNI</option>
                            <option value="bri">Bank BRI</option>
                            <option value="mandiri">Bank Mandiri</option>
                            <option value="dana">Dana</option>
                            <option value="ovo">OVO</option>
                            <option value="gopay">GoPay</option>
                            <option value="shopeepay">ShopeePay</option>
                        </select>
                    </div>
                    <!-- Nama Rekening/Akun -->
                    <div class="withdraw-form-group">
                        <label for="nama_rekening">Nama Rekening / Pemilik Akun</label>
                        <input type="text" id="nama_rekening" name="nama_rekening" placeholder="Masukkan nama rekening / akun e-wallet" required
                            class="withdraw-form-input">
                    </div>
                    <!-- Nomor Rekening/HP E-Wallet -->
                    <div class="withdraw-form-group">
                        <label for="no_rek">Nomor Rekening / Nomor HP (E-Wallet)</label>
                        <input type="text" id="no_rek" name="no_rek" placeholder="Masukkan nomor rekening atau e-wallet" required
                            class="withdraw-form-input">
                    </div>
                    <!-- Catatan Opsional -->
                    <div class="withdraw-form-group">
                        <label for="catatan">Catatan (Opsional)</label>
                        <textarea id="catatan" name="catatan" rows="2" placeholder="Misal: Tarik saldo minggu ini"
                            class="withdraw-form-textarea"></textarea>
                    </div>
                    <!-- Tombol Kirim -->
                    <div class="withdraw-form-group" style="margin-bottom:0;">
                        <button type="submit" class="withdraw-form-btn">
                            <svg width="21" height="21" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v2a3 3 0 0 1-6 0V5m12 6v5a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-5"/><polyline points="16 5 12 1 8 5"/>
                            </svg>
                            Kirim Permintaan
                        </button>
                    </div>
                </form>
            </section>

           
            
        </div>
</div>
@endsection
