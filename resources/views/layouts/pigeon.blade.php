<!doctype html>
<html lang="en" dir="ltr">

<head>
    @include('layouts.head')
    @stack('plugin-styles')
</head>

<body class="app sidebar-mini ltr light-mode">
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">
                    @yield('content')
                </div>
            </div>
            <!--app-content closed-->
        </div>

        @include('layouts.footer')
    </div>

    @include('layouts.scripts')
    @stack('plugin-scripts')
</body>

</html>
