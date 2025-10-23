<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Siap Berkarir')</title>
    @stack('styles')

    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/templates/dist/libs/jsvectormap/dist/jsvectormap.css?1758526130" rel="stylesheet" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/templates/dist/css/tabler.css?1758526130" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PLUGINS STYLES -->
    <link href="/templates/dist/css/tabler-flags.css?1758526130" rel="stylesheet" />
    <link href="/templates/dist/css/tabler-socials.css?1758526130" rel="stylesheet" />
    <link href="/templates/dist/css/tabler-payments.css?1758526130" rel="stylesheet" />
    <link href="/templates/dist/css/tabler-vendors.css?1758526130" rel="stylesheet" />
    <link href="/templates/dist/css/tabler-marketing.css?1758526130" rel="stylesheet" />
    <link href="/templates/dist/css/tabler-themes.css?1758526130" rel="stylesheet" />
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN DEMO STYLES -->
    <link href="/templates/preview/css/demo.css?1758526130" rel="stylesheet" />
    <!-- END DEMO STYLES -->
    <!-- BEGIN CUSTOM FONT -->
    <style>
      @import url("https://rsms.me/inter/inter.css");
      .table-responsive {
        overflow: visible !important;
      }
    </style>
    <!-- END CUSTOM FONT -->
    
    
  </head>
  <body>
  <a href="#content" class="visually-hidden skip-link">Skip to main content</a>
    <!-- BEGIN GLOBAL THEME SCRIPT -->
    <script src="/templates/dist/js/tabler-theme.min.js?1758451981"></script>
    <div class="page">
    <script src="/templates/dist/js/tabler-theme.min.js?1758451981"></script>

        <!--  BEGIN SIDEBAR  -->
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent">
        <div class="container-fluid">
            <!-- BEGIN NAVBAR TOGGLER -->
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu"
            aria-expanded="false"
            aria-label="Toggle sidebar navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- END NAVBAR TOGGLER -->
            <!-- BEGIN NAVBAR LOGO -->
            <div class="navbar-brand navbar-brand-autodark">
            <a href="." aria-label="Admin Dashboard">
                <!-- Logo SVG or Image -->
                <svg xmlns="http://www.w3.org/2000/svg" width="110" height="32" viewBox="0 0 232 68" class="navbar-brand-image">
                <!-- ...logo path... -->
                <text x="0" y="50" font-size="32" fill="#066fd1" font-family="Arial, sans-serif">Admin</text>
                </svg>
            </a>
            </div>
            <!-- END NAVBAR LOGO -->

            <div class="navbar-nav flex-row d-lg-none">
            <!-- User Dropdown (Mobile) -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(/templates/static/avatars/000m.jpg)"> </span>
                <div class="d-none d-xl-block ps-2">
                    <div>Admin</div>
                    <div class="mt-1 small text-secondary">Administrator</div>
                </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
            </div>

            <div class="collapse navbar-collapse" id="sidebar-menu">
            <!-- BEGIN NAVBAR MENU -->
            <ul class="navbar-nav pt-lg-3">

                <!-- Dashboard Utama -->
                <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Home/Overview Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l-2 0l9 -9l9 9l-2 0"/><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/></svg>
                    </span>
                    <span class="nav-link-title">Dashboard Utama</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/notifications') ? 'active' : '' }}" href="/admin/notifications">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Notification Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    </span>
                    <span class="nav-link-title">Notifikasi</span>
                </a>
                </li>

                <!-- User Management -->
                @php
                $userManagementActive = request()->is('admin/users*') || request()->is('admin/roles*');
                @endphp
                <li class="nav-item dropdown {{ $userManagementActive ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle {{ $userManagementActive ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="{{ $userManagementActive ? 'true' : 'false' }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- User Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="4"/><path d="M5.5 21h13a2 2 0 0 0 2-2v-1a7 7 0 0 0-14 0v1a2 2 0 0 0 2 2z"/></svg>
                    </span>
                    <span class="nav-link-title">User Management</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item {{ request()->is('admin/users') ? 'active' : '' }}" href="/admin/users">
                    <span class="me-2">
                        <!-- Table Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                    </span>
                    Daftar User
                    </a>

                    <a class="dropdown-item {{ request()->is('admin/roles') ? 'active' : '' }}" href="{{ env('APP_URL') }}/admin/users/roles">
                    <span class="me-2">
                        <!-- Shield Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </span>
                    Daftar Admin
                    </a>
                </div>
                </li>

                <!-- Produk & Lisensi -->
                @php
                $produkLisensiActive = request()->is('admin/products*') || request()->is('admin/mayar/sync') || request()->is('admin/payments/monitoring');
                @endphp
                <li class="nav-item dropdown {{ $produkLisensiActive ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle {{ $produkLisensiActive ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="{{ $produkLisensiActive ? 'true' : 'false' }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Box Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/></svg>
                    </span>
                    <span class="nav-link-title">Produk & Lisensi</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item {{ request()->is('admin/products/siapberkarir*') ? 'active' : '' }}" href="{{ route('admin.products.detail', ['id' => 'siap-berkarir']) }}">
                    <span class="me-2">
                        <!-- Book Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M4 4.5A2.5 2.5 0 0 1 6.5 7H20"/><path d="M20 22V2"/><path d="M4 22V2"/></svg>
                    </span>
                    Siap Berkarir
                    </a>
                    
                </div>
                </li>

                

                <!-- System & Settings -->
                @php
                $systemSettingsActive = request()->is('admin/webhooks*') || request()->is('admin/system/cache');
                @endphp
                <li class="nav-item dropdown {{ $systemSettingsActive ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle {{ $systemSettingsActive ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="{{ $systemSettingsActive ? 'true' : 'false' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Settings Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.09a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.09a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        </span>
                        <span class="nav-link-title">System & Settings</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item {{ request()->is('admin/setting/website') ? 'active' : '' }}" href="{{ route('admin.website') }}">
                        <span class="me-2">
                            <!-- Globe/Website Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="2" y1="12" x2="22" y2="12"/>
                                <path d="M12 2a15.3 15.3 0 0 1 0 20"/>
                                <path d="M12 2a15.3 15.3 0 0 0 0 20"/>
                            </svg>
                        </span>
                        Daftar Website
                        </a>
                        <a class="dropdown-item {{ request()->is('admin/webhooks/targets*') ? 'active' : '' }}" href="/admin/webhooks/targets/show">
                        <span class="me-2">
                            <!-- Target Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>
                            </svg>
                        </span>
                        Target Webhook
                        </a>
                        <a class="dropdown-item {{ request()->is('admin/system/cache') ? 'active' : '' }}" href="/admin/system/cache">
                        <span class="me-2">
                            <!-- Refresh/Caching Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.13-3.36L23 10"/><path d="M20.49 15a9 9 0 0 1-14.13 3.36L1 14"/></svg>
                        </span>
                        Caching & Optimisasi
                        </a>
                        <a class="dropdown-item {{ request()->is('admin/settings') ? 'active' : '' }}" href="/admin/settings">
                        <span class="me-2">
                            <!-- Settings/Sliders Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                        </span>
                        Pengaturan Sistem
                        </a>
                    </div>
                </li>

            </ul>
            <!-- END NAVBAR MENU -->
            </div>
        </div>
        </aside>
        <!--  END SIDEBAR  -->
        <form id="logout-form" action="/logout" method="POST" class="d-none">
        @csrf
        </form>

      
        @yield('content')
      
      <footer>
        @yield('footer')
      </footer>
    </div>


    <!-- BEGIN PAGE LIBRARIES -->
    <script src="/templates/dist/libs/apexcharts/dist/apexcharts.min.js?1758526130" defer></script>
    <script src="/templates/dist/libs/jsvectormap/dist/jsvectormap.min.js?1758526130" defer></script>
    <script src="/templates/dist/libs/jsvectormap/dist/maps/world.js?1758526130" defer></script>
    <script src="/templates/dist/libs/jsvectormap/dist/maps/world-merc.js?1758526130" defer></script>
    <!-- END PAGE LIBRARIES -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/templates/dist/js/tabler.min.js?1758526130" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="/templates/preview/js/demo.min.js?1758526130" defer></script>
    <!-- END DEMO SCRIPTS -->
    
    @stack('scripts')

  </body>
</html>