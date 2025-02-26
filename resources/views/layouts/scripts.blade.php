<!-- JQUERY JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- TypeHead js -->
<script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
<script src="{{ asset('assets/js/typehead.js') }}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
<script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>

<!-- INTERNAL Notifications js -->
<script src="{{ asset('assets/plugins/notify/js/rainbow.js') }}"></script>
<script src="{{ asset('assets/plugins/notify/js/jquery.growl.js') }}"></script>
<script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}"></script>

<!-- SIDE-MENU JS -->
<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

<!-- SIDEBAR JS -->
<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

<!-- Color Theme js -->
<script src="{{ asset('assets/js/themeColors.js') }}"></script>

<!-- Sticky js -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- Custom-switcher -->
<script src="{{ asset('assets/js/custom-swicher.js') }}"></script>

<!-- Switcher js -->
<script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>

<!-- SELECT2 JS -->
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>

@if (session('success'))
    <script>
        $.growl.notice({
            message: "{{ session('success') }}",
        });
    </script>
@endif
@if (session('error'))
    <script>
        $.growl.error({
            message: "{{ session('error') }}",
        });
    </script>
@endif

<!-- Hotjar Tracking Code for Site 5318402 (name missing) -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:5318402,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>