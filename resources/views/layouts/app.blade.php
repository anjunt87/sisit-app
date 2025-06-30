<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.header')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/toastr/toastr.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-no-expand">
    <div class="wrapper">

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
