<!DOCTYPE html>
<html lang="zxx" class="js">

    <head>
        @include('admin.layout.head')
        @include('sweetalert::alert')
        @stack('head')
    </head>

    <body class="nk-body bg-lighter npc-general has-sidebar ">
        <div class="nk-app-root">
            <!-- main @s -->
            <div class="nk-main ">
                <!-- sidebar @s -->
                @include('admin.layout.sidebar')
                <!-- sidebar @e -->
                <!-- wrap @s -->
                <div class="nk-wrap ">
                    <!-- main header @s -->
                    @include('admin.layout.header')
                    <!-- main header @e -->

                    <!-- content @s -->
                    @yield('main')

                    <!-- footer @s -->
                    @include('admin.layout.footer')
                    <!-- footer @e -->

                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
        <!-- thêm cái editor cho trang create product -->
        <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="{{ asset('dashlite/assets/js/bundle.js?ver=2.5.0') }}"></script>
        <script src="{{ asset('dashlite/assets/js/scripts.js?ver=2.5.0') }}"></script>
        <script src="{{ asset('dashlite/assets/js/charts/gd-default.js?ver=2.5.0') }}"></script>
        @stack('footer')
    </body>
</html>
