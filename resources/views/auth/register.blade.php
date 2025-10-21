@extends('layouts.guest')

@section('title', $title ?? 'Login - Siap Berkarir')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <img src="https://demo.siapberkarir.id/img/logo.jpeg" alt="Logo Siap Affiliate" class="mb-2 img-fluid" style="max-height:48px;">
                        <h2 class="h3 mb-0 text-primary fw-semibold">Pendaftaran Affiliate</h2>
                        <p class="text-muted small mb-0" style="font-size: 15px;">
                            Daftar sebagai calon afiliator Siap Affiliate.<br>
                            Sistem Affiliasi, Komisi Instan & Dashboard Realtime.
                        </p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register.submit') }}" autocomplete="off">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="email">
                                <i class="ti ti-mail"></i> Email
                            </label>
                            <input type="email" class="form-control" id="email" name="email" required autofocus value="{{ old('email') }}" placeholder="Alamat Email Aktif">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password">
                                <i class="ti ti-lock"></i> Password
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Buat Password">
                        </div>

                        <!-- ============================ -->
                        <!-- Nomor Telepon (Dropdown Kode Negara) -->
                        <!-- ============================ -->
                        <div class="mb-3">
                            <label class="form-label" for="countryCode">
                                <i class="ti ti-flag"></i> Pilih Negara
                            </label>
                            <select class="form-select" id="countryCode" name="country_code" required>
                                <option value="">Pilih Negara</option>
                                <option value="+62" selected>🇮🇩 Indonesia (+62)</option>
                                <option value="+60">🇲🇾 Malaysia (+60)</option>
                                <option value="+65">🇸🇬 Singapura (+65)</option>
                                <option value="+63">🇵🇭 Filipina (+63)</option>
                                <option value="+66">🇹🇭 Thailand (+66)</option>
                                <option value="+1">🇺🇸 Amerika Serikat (+1)</option>
                                <option value="+44">🇬🇧 Inggris (+44)</option>
                                <option value="+81">🇯🇵 Jepang (+81)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="wa_number">
                                <i class="ti ti-brand-whatsapp"></i> Nomor WhatsApp
                            </label>
                            <input type="text" class="form-control" id="wa_number" name="wa_number" required placeholder="Nomor WhatsApp Aktif (tanpa kode negara)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="refcode">
                                <i class="ti ti-discount-2"></i> Kode Referral (Opsional)
                            </label>
                            <input type="text" class="form-control" id="refcode" name="refcode" placeholder="(Opsional) Jika daftar via referral">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                <i class="ti ti-affiliate"></i> Daftar Affiliate
                            </button>
                        </div>
                    </form>
                    <div class="mt-4 text-center">
                        <span class="text-muted small">
                            Sudah punya akun affiliate? 
                            <a href="{{ url('/login') }}" class="text-primary fw-semibold">Masuk di sini</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{ url('/') }}" class="text-primary">
                    <i class="ti ti-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>

