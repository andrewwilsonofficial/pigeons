<!doctype html>
<html lang="en" dir="ltr">

<head>
    @include('layouts.head')
</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        @include('layouts.loader')

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- Theme-Layout -->

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <a href="{{ route('landing') }}">
                            <img src="{{ asset('assets/images/brand/logo-dark.png') }}" class="header-brand-img"
                                height="70" style="border-radius: 9px;">
                        </a>
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                            @csrf
                            <span class="login100-form-title pb-5">
                                {{ __('Login') }}
                            </span>

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 form-control ms-0" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email">
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 form-control ms-0" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                            </div>
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="text-end pt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Not a member?<a href="{{ route('register') }}" class="text-primary ms-1">Sign UP</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/js/show-password.min.js') }}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ asset('assets/js/generate-otp.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Custom-switcher -->
    <script src="{{ asset('assets/js/custom-swicher.js') }}"></script>

    <!-- Switcher js -->
    <script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>

</body>

</html>
