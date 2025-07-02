<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.header')
    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/toastr/toastr.min.css') }}"> --}}
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-no-expand">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader-overlay" id="preloader">
            {{-- <div class="preloader-pattern"></div> --}}
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <!-- Floating Geometric Shapes -->
                <div
                    class="absolute top-20 left-20 w-32 h-32 bg-gradient-to-br from-emerald-200 to-emerald-300 rounded-3xl rotate-12 opacity-30 animate-float">
                </div>
                <div
                    class="absolute top-40 right-32 w-24 h-24 bg-gradient-to-br from-teal-200 to-teal-300 rounded-full opacity-40 animate-float-delayed">
                </div>
                <div
                    class="absolute bottom-32 left-40 w-20 h-20 bg-gradient-to-br from-green-200 to-green-300 rounded-2xl rotate-45 opacity-35 animate-float-delayed-2">
                </div>
                <div
                    class="absolute bottom-20 right-20 w-28 h-28 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-full opacity-25 animate-float">
                </div>

                <!-- Gradient Orbs -->
                <div
                    class="absolute -top-40 -left-40 w-80 h-80 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-gentle">
                </div>
                <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-15 animate-pulse-gentle"
                    style="animation-delay: 0.1s;"></div>
            </div>

            <div class="preloader-content">
                <div id="logoContainer" class="preloader-logo-container">
                    <img id="preloaderLogo" src="{{ asset('storage/img/logo-niis-putih.png') }}"
                        class="preloader-logo" />
                </div>
                <h2 class="preloader-title gradient-text">NIIS</h2>
                <p class="preloader-subtitle shimmer-text">Sistem Informasi Islam Terpadu</p>
                <p class="preloader-system-name shimmer-text">Memuat Dashboard...</p>
                <div class="loading-indicator shimmer-effect">
                    <div class="loading-bar"></div>
                </div>
            </div>
        </div>
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')

        <!-- Main content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('layouts.partials.footer')

    </div>
    @stack('scripts')
</body>

</html>
