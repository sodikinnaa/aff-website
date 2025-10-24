<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Siap Berkarir')</title>
    @stack('styles')
    <style>
        :root {
            --color-background: #f9fafb;
            --color-surface: #fff;
            --color-text-primary: #1f2937;
            --color-text-secondary: #6b7280;
            --color-primary-accent: #3b82f6;
            --color-border: #e5e7eb;
            --bottom-tab-height: 65px;
            --font-family-sans-serif: "Inter", -apple-system, sans-serif;
            --transition-speed: 0.2s;
        }
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            background: var(--color-background);
            font-family: var(--font-family-sans-serif);
            color: var(--color-text-primary);
            min-height: 100vh;
            box-sizing: border-box;
            padding-bottom: var(--bottom-tab-height);
            width: 100%;
        }

        /* Batasi tampilan seperti android pada desktop dan tablet */
        .android-wrapper {
            width: 100%;
            max-width: 980px; /* Tablet max width */
            min-height: 100vh;
            margin: 0 auto;
            background: var(--color-background);
            position: relative;
            box-shadow: 0 0 18px 4px rgba(143,158,179,0.11);
            border-radius: 0;
        }
        @media (max-width: 1000px) {
            .android-wrapper {
                width: 100vw;
                max-width: 100vw;
                min-width: 0;
                border-radius: 0;
                box-shadow: none;
            }
        }
        .content-android {
            max-width: 100%;
            margin: 0 auto;
            padding: 1.5rem 1rem 1rem 1rem;
            min-height: calc(100vh - var(--bottom-tab-height));
        }
        .mobile-tab-nav {
            position: fixed; 
            left: 50%; 
            bottom: 0; 
            z-index: 1000;
            width: 100%;
            max-width: 980px;
            height: var(--bottom-tab-height);
            display: flex; 
            justify-content: space-around;
            background: var(--color-surface);
            border-top: 1px solid var(--color-border);
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
            transform: translateX(-50%);
        }
        @media (max-width: 1000px) {
            .mobile-tab-nav {
                left: 0;
                width: 100vw;
                min-width: 0;
                max-width: 100vw;
                transform: none;
            }
        }
        .tab-link {
            flex: 1;
            display: flex; flex-direction: column; align-items: center;
            justify-content: center;
            color: var(--color-text-secondary);
            text-decoration: none;
            font-size: 0.85rem;
            padding: 6px 0;
            transition: color var(--transition-speed);
        }
        .tab-link__icon { width: 24px; height: 24px; }
        .tab-link.is-active { color: var(--color-primary-accent); }
    </style>
</head>
<body>
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

    <style>
    /* === SECTION WRAPPER === */
    .produk-section {
        background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 18px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        padding: 1.25rem 1rem 1.3rem 1rem;
        margin-bottom: 1.6rem;
    }

    /* === HEADER === */
    .produk-section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 12px;
    }
    .produk-section-header h2 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }
    .produk-section-header a {
        font-size: .9rem;
        color: #2563eb;
        font-weight: 500;
        text-decoration: none;
    }
    .produk-section-header a:hover {
        text-decoration: underline;
    }

    /* === GRID === */
    .produk-pilihan-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 14px;
    }

    /* === CARD === */
    .produk-pilihan-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        padding: 1rem .8rem 1rem .8rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        transition: all 0.25s ease;
        cursor: pointer;
    }
    .produk-pilihan-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 12px rgba(37,99,235,0.15);
    }

    /* === BADGE HOT === */
    .badge-hot {
        position: absolute;
        top: 8px;
        left: 8px;
        background: #ef4444;
        color: #fff;
        font-size: .7rem;
        font-weight: 600;
        border-radius: 6px;
        padding: 2px 6px;
        z-index: 2;
        box-shadow: 0 4px 12px rgba(239,68,68,0.10);
    }

    /* === IMAGE WRAPPER === */
    .produk-pilihan-imgwrap {
        width: 100%;
        aspect-ratio: 1/1;
        border-radius: 14px;
        background: linear-gradient(120deg, #f1f5f9 60%, #aecbfa 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 13px;
        overflow: hidden;
        box-shadow: 0 3px 16px rgba(59,130,246,0.07), 0 1px 8px rgba(99,102,241,.04);
        transition: box-shadow 0.3s;
    }
    .produk-pilihan-card:hover .produk-pilihan-imgwrap {
        box-shadow: 0 8px 25px rgba(37,99,235,0.22), 0 2px 10px rgba(16,185,129,.09);
    }
    .produk-pilihan-imgwrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 14px;
        transition: transform 0.4s cubic-bezier(.34,2,0,1), filter 0.25s;
        box-shadow: 0 1px 6px rgba(59,130,246,0.12);
        filter: saturate(1.03) contrast(1.05) brightness(1.09);
    }
    .produk-pilihan-card:hover .produk-pilihan-imgwrap img {
        transform: scale(1.10) rotate(-1deg);
        filter: saturate(1.18) contrast(1.08) brightness(1.18);
    }

    /* === TEXT === */
    .produk-nama {
        font-size: 1rem;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .produk-harga {
        font-size: .92rem;
        color: #475569;
        margin-bottom: 9px;
        font-weight: 500;
        letter-spacing: 0.01em;
    }

    /* === KOMISI BADGE === */
    .produk-komisi {
        background: linear-gradient(92deg, #bbf7d0 60%, #6ee7b7 100%);
        color: #15803d;
        font-size: .89rem;
        font-weight: 600;
        border-radius: 8px;
        padding: 4px 12px 4px 9px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        box-shadow: 0 1px 6px rgba(16,185,129,0.09);
        margin-top: 5px;
    }
    .produk-komisi svg {
        width: 15px;
        height: 15px;
        color: #16a34a;
    }

    /* === RESPONSIVE === */
    @media (max-width: 720px) {
        .produk-pilihan-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 600px) {
        .produk-pilihan-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 400px) {
        /* .produk-pilihan-grid { grid-template-columns: 1fr; } */
        .produk-pilihan-grid { grid-template-columns: repeat(2, 1fr); }
    }
    </style>

    <section class="produk-section">
        <div class="produk-section-header">
            <h2>Produk dengan Komisi Terbaik 💰</h2>
            <a href="#">Lihat Semua &rsaquo;</a>
        </div>

        @php
            $products = [
                ['nama_produk' => 'Pro Health','price' => 120000,'komisi_persen' => 12,'img_url' => 'https://media.mayar.id/images/4613fe87-7960-4c63-abd2-84cf724caca7.jpeg','hot' => true],
                ['nama_produk' => 'EcoWash','price' => 95000,'komisi_persen' => 15,'img_url' => 'https://media.mayar.id/images/4613fe87-7960-4c63-abd2-84cf724caca7.jpeg','hot' => false],
                ['nama_produk' => 'FreshTea','price' => 78000,'komisi_persen' => 10,'img_url' => 'https://media.mayar.id/images/4613fe87-7960-4c63-abd2-84cf724caca7.jpeg','hot' => false],
                ['nama_produk' => 'SmartLamp','price' => 159000,'komisi_persen' => 17,'img_url' => 'https://media.mayar.id/images/4613fe87-7960-4c63-abd2-84cf724caca7.jpeg','hot' => true],
            ];
        @endphp

        <div class="produk-pilihan-grid">
            @foreach($products as $p)
            <div class="produk-pilihan-card">
                @if($p['hot'])
                    <div class="badge-hot">Hot</div>
                @endif
                <div class="produk-pilihan-imgwrap">
                    <img src="{{ $p['img_url'] }}" alt="{{ $p['nama_produk'] }}">
                </div>
                <div class="produk-nama">{{ $p['nama_produk'] }}</div>
                <div class="produk-harga">Rp{{ number_format($p['price'], 0, ',', '.') }}</div>
                <div class="produk-komisi">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 .79-4 2s1.79 2 4 2 4 .79 4 2-1.79 2-4 2m0-8v10m0 0v2m0-12V6" />
                    </svg>
                    {{ $p['komisi_persen'] }}%
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

        <nav class="mobile-tab-nav" aria-label="Navigasi utama Android">
            <a href="#" class="tab-link is-active" aria-current="page">
                <svg class="tab-link__icon" viewBox="0 0 24 24"><path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>
                <span>Beranda</span>
            </a>
            <a href="#" class="tab-link">
            <!-- Referral (Fereal) Icon -->
            <svg class="tab-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 12v7a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-7" />
                <path d="M16 6l-4-3-4 3" />
                <path d="M12 3v11" />
            </svg>
            <span>Referal</span>
            </a>

            <a href="#" class="tab-link">
            <!-- Withdraw (Wallet) Icon -->
            <svg class="tab-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="7" width="20" height="14" rx="2" />
                <path d="M16 3v4" />
                <path d="M7 12h.01" />
            </svg>
            <span>Withdraw</span>
            </a>

            <a href="#" class="tab-link">
                <svg class="tab-link__icon" viewBox="0 0 24 24"><path fill="currentColor" d="M12,12A5,5 0 0,0 17,7A5,5 0 0,0 12,2A5,5 0 0,0 7,7A5,5 0 0,0 12,12M12,14C9.33,14 4,15.33 4,18V20H20V18C20,15.33 14.67,14 12,14Z" /></svg>
                <span>Profil</span>
            </a>
        </nav>
    </div>
</body>
</html>