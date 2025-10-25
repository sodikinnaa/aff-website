<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUa6mY2P6L2Co4zQCcKVxzQ9VV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Optionally, Bootstrap JS for components (dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-uF8AjWkJZlAIXazhbugzuDUFcPRl1b/HFB70dNDO7xjMnIKh4j/wcgUp3NEPoPFc" crossorigin="anonymous"></script>
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
    


    <!-- Desktop Top Navbar - only visible on large screens -->
    <!-- <header class="desktop-nav">
        <div class="desktop-nav__container">
            <a href="#" class="desktop-nav__brand">BrandName</a>
            <nav>
                <ul class="desktop-nav__list">
                    <li><a href="#" class="desktop-nav__link is-active">Home</a></li>
                    <li><a href="#" class="desktop-nav__link">Explore</a></li>
                    <li><a href="#" class="desktop-nav__link">Create</a></li>
                    <li><a href="#" class="desktop-nav__link">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header> -->

    <!-- Page Content -->
    @yield('content')
    <!-- <main class="content">
        <div class="content-container">
            <h1>Responsive Navbar System</h1>
            <p>On large screens, you'll see a standard navigation bar at the top. On small screens, it disappears and is replaced by an app-style tab bar at the bottom.</p>
        </div>
    </main> -->
    <!-- Mobile Bottom Tab Bar - only visible on small screens -->
    
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
                    width: 100%;
                    min-height: 1.3em;
                    /* Responsive wrap & cut text, but also easily multi-line */
                    white-space: normal;
                    word-break: break-word;
                    overflow-wrap: break-word;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    max-width: 100%;
                }
                @media (max-width: 480px) {
                    .produk-nama {
                        font-size: 0.95rem;
                        -webkit-line-clamp: 3;
                    }
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

    <nav class="mobile-tab-nav" aria-label="Navigasi utama Android">
        <a href="{{ route('user.dashboard') }}"
           class="tab-link{{ request()->routeIs('user.dashboard') ? ' is-active' : '' }}"
           @if(request()->routeIs('user.dashboard')) aria-current="page" @endif>
            <svg class="tab-link__icon" viewBox="0 0 24 24"><path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>
            <span>Beranda</span>
        </a>
        <!-- <a href="{{ route('user.referal') }}"
           class="tab-link{{ request()->routeIs('user.referal') ? ' is-active' : '' }}"
           @if(request()->routeIs('user.referal')) aria-current="page" @endif>
            <svg class="tab-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 12v7a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-7" />
                <path d="M16 6l-4-3-4 3" />
                <path d="M12 3v11" />
            </svg>
            <span>Referal</span>
        </a> -->
        <a href="{{ route('user.website.myproduk') }}"
           class="tab-link{{ request()->routeIs('user.website.myproduk') ? ' is-active' : '' }}"
           @if(request()->routeIs('user.website.myproduk')) aria-current="page" @endif>
            <!-- MyProduk Icon -->
            <svg class="tab-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3.5" y="7" width="17" height="10" rx="2.5"/>
                <path d="M7 7V5.5A2.5 2.5 0 0 1 9.5 3h5A2.5 2.5 0 0 1 17 5.5V7"/>
                <circle cx="12" cy="12" r="2.2"/>
            </svg>
            <span>My Produk</span>
        </a>
        <a href="{{ route('user.withdraw') }}"
           class="tab-link{{ request()->routeIs('user.withdraw') ? ' is-active' : '' }}"
           @if(request()->routeIs('user.withdraw')) aria-current="page" @endif>
            <!-- Withdraw (Wallet) Icon -->
            <svg class="tab-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="7" width="20" height="14" rx="2" />
                <path d="M16 3v4" />
                <path d="M7 12h.01" />
            </svg>
            <span>Withdraw</span>
        </a>
        <a href="{{ route('user.profile') }}"
           class="tab-link{{ request()->routeIs('user.profile') ? ' is-active' : '' }}"
           @if(request()->routeIs('user.profile')) aria-current="page" @endif>
            <svg class="tab-link__icon" viewBox="0 0 24 24"><path fill="currentColor" d="M12,12A5,5 0 0,0 17,7A5,5 0 0,0 12,2A5,5 0 0,0 7,7A5,5 0 0,0 12,12M12,14C9.33,14 4,15.33 4,18V20H20V18C20,15.33 14.67,14 12,14Z" /></svg>
            <span>Profil</span>
        </a>
    </nav>
</body>
</html>