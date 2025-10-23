<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Siap Berkarir')</title>
    @stack('styles')
    <style>
        /*
        ========================================
        CSS Custom Properties (App/SaaS Theme)
        ========================================
        */
        :root {
            --color-background: #f9fafb;
            --color-surface: #ffffff; /* For nav backgrounds */
            --color-text-primary: #1f2937;
            --color-text-secondary: #6b7280;
            --color-primary-accent: #3b82f6;
            --color-border: #e5e7eb;

            --top-nav-height: 70px;
            --bottom-tab-height: 65px;
            --font-family-sans-serif: "Inter", -apple-system, sans-serif;
            --transition-speed: 0.2s;
        }

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        /*
        ========================================
        Base & Page Styles
        ========================================
        */
        *, *::before, *::after { box-sizing: border-box; }
        body {
            margin: 0; font-family: var(--font-family-sans-serif);
            line-height: 1.6; background-color: var(--color-background);
        }

        .content {
            /* Add padding to the top for the desktop nav AND the bottom for the mobile nav */
            padding-top: var(--top-nav-height);
            padding-bottom: var(--bottom-tab-height);
            min-height: 150vh;
        }

        .content-container { max-width: 1024px; margin: 0 auto; padding: 2rem; }
        a { text-decoration: none; }
        
        /*
        ========================================
        Desktop-First Top Navbar Styles
        ========================================
        This is one of the two navigation components.
        It is hidden by default on mobile (see media query at the bottom).
        */
        .desktop-nav {
            position: fixed; top: 0; left: 0; z-index: 1000;
            width: 100%; height: var(--top-nav-height);
            display: flex; align-items: center;
            background-color: var(--color-surface);
            border-bottom: 1px solid var(--color-border);
            padding: 0 2rem;
        }
        
        .desktop-nav__container {
            width: 100%; max-width: 1200px;
            margin: 0 auto; display: flex;
            align-items: center; justify-content: space-between;
        }
        
        .desktop-nav__brand { font-size: 1.5rem; font-weight: 600; color: var(--color-text-primary); }
        .desktop-nav__list { list-style: none; margin: 0; padding: 0; display: flex; gap: 2rem; }
        .desktop-nav__link { font-weight: 500; color: var(--color-text-secondary); }
        .desktop-nav__link:hover, .desktop-nav__link.is-active { color: var(--color-primary-accent); }
        
        /*
        ========================================
        Mobile-First Bottom Tab Bar Styles
        ========================================
        This is the second navigation component.
        It is visible by default (mobile-first).
        */
        .mobile-tab-nav {
            position: fixed; bottom: 0; left: 0; z-index: 1000;
            width: 100%; height: var(--bottom-tab-height);
            display: flex; justify-content: space-around;
            background-color: var(--color-surface);
            border-top: 1px solid var(--color-border);
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
        }
        
        .tab-link {
            display: flex; flex-direction: column; align-items: center;
            justify-content: center; flex-grow: 1;
            gap: 4px; padding: 6px 0;
            font-size: 0.75rem; color: var(--color-text-secondary);
            transition: color var(--transition-speed) ease;
        }
        
        .tab-link__icon { width: 24px; height: 24px; }
        
        /* Active state for the mobile tab */
        .tab-link.is-active { color: var(--color-primary-accent); }
        
        /*
        ========================================
        The Responsive Switch
        ========================================
        */
        /* On screens LARGER than 768px... */
        @media (min-width: 768px) {
            /* Hide the mobile bottom tab bar */
            .mobile-tab-nav {
                display: none;
            }
        }
        
        /* On screens SMALLER than 768px... */
        @media (max-width: 767px) {
            /* Hide the desktop top navbar */
            .desktop-nav {
                display: none;
            }
            /* Reset padding on body to account for hidden top nav */
            .content {
                padding-top: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Desktop Top Navbar - only visible on large screens -->
    <header class="desktop-nav">
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
    </header>

    <!-- Page Content -->
    <main class="content">
        <div class="content-container">
            <h1>Responsive Navbar System</h1>
            <p>On large screens, you'll see a standard navigation bar at the top. On small screens, it disappears and is replaced by an app-style tab bar at the bottom.</p>
        </div>
    </main>
    
    <!-- Mobile Bottom Tab Bar - only visible on small screens -->
    <nav class="mobile-tab-nav" aria-label="Main mobile navigation">
        <a href="#" class="tab-link is-active" aria-current="page">
            <svg class="tab-link__icon" viewBox="0 0 24 24"><path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>
            <span class="tab-link__label">Home</span>
        </a>
        <a href="#" class="tab-link">
            <svg class="tab-link__icon" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,10L16.25,14.25L14.83,15.66L10.59,11.41L12,10Z"/></svg>
            <span class="tab-link__label">Explore</span>
        </a>
        <a href="#" class="tab-link">
            <svg class="tab-link__icon" viewBox="0 0 24 24"><path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,8V11H8V13H12V16L16,12L12,8Z" /></svg>
            <span class="tab-link__label">Create</span>
        </a>
        <a href="#" class="tab-link">
            <svg class="tab-link__icon" viewBox="0 0 24 24"><path fill="currentColor" d="M12,12A5,5 0 0,0 17,7A5,5 0 0,0 12,2A5,5 0 0,0 7,7A5,5 0 0,0 12,12M12,14C9.33,14 4,15.33 4,18V20H20V18C20,15.33 14.67,14 12,14Z" /></svg>
            <span class="tab-link__label">Profile</span>
        </a>
    </nav>
    
</body>
</html>