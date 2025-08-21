<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="{{ asset('tabler/css/tabler.min.css') }}" rel="stylesheet">
    <!-- FontAwesome Free CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <style>
        .layout-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            z-index: 1000;
        }

        .main-content {
            margin-left: 240px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100vw - 280px);
        }

        .header-area {
            position: relative;
            z-index: 999;
            width: 100%;
        }

        .content-area {
            flex: 1;
            width: 100%;
            padding: 0;
        }

        /* Forçar que containers dentro do conteúdo ocupem toda largura */
        .content-area .container-xl,
        .content-area .container,
        .content-area .page-wrapper {
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 !important;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* Forçar largura completa para componentes específicos do Tabler */
        .content-area .page-header .container-xl,
        .content-area .page-body .container-xl {
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 !important;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* Garantir que cards e tabelas ocupem todo espaço */
        .content-area .card,
        .content-area .table-responsive {
            width: 100% !important;
        }

        .footer-area {
            width: 100%;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="layout-container">
        {{-- Menu/Navegação lateral --}}
        <div class="sidebar">
            @include('layouts.navigation')
        </div>

        {{-- Área principal (Header + Conteúdo + Footer) --}}
        <div class="main-content">
            {{-- Header fixo do sistema --}}
            <div class="header-area w-full">
                @include('layouts.header')
            </div>

            {{-- Header dinâmico da página (opcional) --}}
            @isset($header)
                <header class="bg-white shadow w-full">
                    <div class="w-full px-8 lg:px-16 py-6">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="content-area">
                @yield('content')
            </main>

            {{-- Footer --}}
            <div class="footer-area">
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('tabler/js/tabler.min.js') }}"></script>
</body>

</html>
