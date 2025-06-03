<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />

    <title>Rapport</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <link href="{{ asset('assetsfront/img/smart2.png') }}" rel="icon">

    <link rel="stylesheet" href="{{ asset('../assets/vendor/fonts/iconify-icons.css') }}" />


    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <script src="{{ asset('../assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('../assets/js/config.js') }}"></script>

    <script src="{{ asset('../assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('../assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('../assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('../assets/vendor/js/menu.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    @if (session('alerte_stock'))
        <div class="alert alert-danger text-center fw-bold">
            {{ session('alerte_stock') }}
        </div>
    @endif

    @include('layouts.sidebar')

    @yield('content')

    @include('layouts.footer')

    <script src="{{ asset('../assets/js/main.js') }}"></script>

    <script src="{{ asset('../assets/js/pages-account-settings-account.js') }}"></script>

    <script async="async" defer="defer" src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
