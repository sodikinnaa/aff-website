@extends('layouts.guest')

@section('title', $title ?? 'Login - Siap Berkarir')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-sm border-0 bg-white">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h2 class="h3 mb-0 text-primary fw-semibold">Siap Affiliate</h2>
                        <p class="text-muted small mb-0" style="font-size: 15px;">
                            Sistem Affiliasi untuk Penghasilan Berkelanjutan.<br>
                            Komisi Instan, Dashboard Realtime, Dukungan Bisnis Digital.
                        </p>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success mb-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login.submit') }}" autocomplete="off" class="mb-0">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="username">
                                <i class="ti ti-user"></i> Username / Email / Nomor WA
                            </label>
                            <input type="text" class="form-control" id="username" name="username" required autofocus 
                                placeholder="Masukkan username, email atau WhatsApp..." value="{{ old('username') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">
                                <i class="ti ti-lock"></i> Kata Sandi
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Password Akun Affiliate">
                        </div>

                       

                        <div class="d-flex justify-content-end mb-3">
                            <a href="#" class="small text-primary">Lupa password?</a>
                        </div>

                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                <i class="ti ti-affiliate"></i> login
                            </button>
                        </div>
                    </form>
                    <div class="mt-4 text-center">
                        <span class="text-muted small">
                            Belum punya akun affiliate? 
                            <a href="{{ url('/register') }}" class="text-primary fw-semibold">Daftar Affiliate</a>
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

