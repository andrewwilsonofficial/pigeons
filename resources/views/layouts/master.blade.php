<!doctype html>
<html lang="en" dir="ltr">

<head>
    @include('layouts.head')
    @stack('plugin-styles')
</head>

<body class="app sidebar-mini ltr light-mode">

    @include('layouts.loader')

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            @include('layouts.header')

            @include('layouts.sidebar')

            <!--app-content open-->
            <div class="main-content app-content mt-0">
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
