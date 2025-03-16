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

                        <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                            @csrf
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                            <span class="login100-form-title pb-5">
                                Register
                            </span>

                            <!-- Name -->
                            <div class="wrap-input100 validate-input input-group">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 form-control ms-0" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 form-control ms-0" id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 form-control ms-0" id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="wrap-input100 validate-input input-group">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye-off text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 form-control ms-0" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="text-end pt-4">
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>

                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'register'}).then(function(token) {
                document.getElementById('recaptcha_token').value = token;
            });
        });
    </script>
</body>

</html>
