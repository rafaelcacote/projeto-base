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
            position: relative;
        }

        /* Sidebar - Responsivo */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        /* Main content - Responsivo */
        .main-content {
            margin-left: 280px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100vw - 280px);
            transition: margin-left 0.3s ease, width 0.3s ease;
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
            overflow-x: auto;
        }

        /* Containers responsivos */
        .content-area .container-xl,
        .content-area .container,
        .content-area .page-wrapper {
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 !important;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .content-area .page-header .container-xl,
        .content-area .page-body .container-xl {
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 !important;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .content-area .card,
        .content-area .table-responsive {
            width: 100% !important;
        }

        .footer-area {
            width: 100%;
        }

        /* Botão toggle para mobile (escondido por padrão) */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: #fff;
            border: 1px solid #ddd;
            padding: 0.5rem;
            border-radius: 0.375rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Media Queries para Responsividade */
        
        /* Tablets e telas médias (768px - 1023px) */
        @media (max-width: 1023px) {
            .sidebar {
                width: 240px;
            }
            
            .main-content {
                margin-left: 240px;
                width: calc(100vw - 240px);
            }
            
            .content-area .container-xl,
            .content-area .container,
            .content-area .page-wrapper {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }

        /* Telas pequenas/Mobile (até 767px) */
        @media (max-width: 767px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                width: 100vw;
            }
            
            .sidebar-toggle {
                display: block;
            }
            
            .content-area .container-xl,
            .content-area .container,
            .content-area .page-wrapper {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
            
            /* Overlay para mobile quando sidebar está aberto */
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0,0,0,0.5);
                z-index: 999;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
        }

        /* Telas muito pequenas (até 480px) */
        @media (max-width: 480px) {
            .content-area .container-xl,
            .content-area .container,
            .content-area .page-wrapper {
                padding-left: 0.25rem;
                padding-right: 0.25rem;
            }
            
            .header-area .px-8 {
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }
            
            .header-area .lg\:px-16 {
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }
        }

        /* Garantir que tabelas sejam scrolláveis em telas pequenas */
        @media (max-width: 767px) {
            .table-responsive {
                overflow-x: auto !important;
                -webkit-overflow-scrolling: touch;
            }
            
            .card {
                margin-bottom: 1rem;
            }
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
