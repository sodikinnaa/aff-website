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
    </style>
    <!-- END CUSTOM FONT -->
    
    
  </head>
  <body>
    <div class="page">
      
      <main>
      @yield('content')
    </main>
    
    <footer>
      @yield('footer')
    </footer>
  </div>


    @stack('scripts')
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

  </body>
</html>