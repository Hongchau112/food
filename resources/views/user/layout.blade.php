<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.layout.head')
    @stack('head')
</head>

<body>
<!-- HEADER  -->
@include('user.layout.header')
<!-- Banner  -->
<main>
    <div class="main">
        <!-- content @s -->
    @yield('main')
    <!-- content @e -->

    </div>
</main>

<!-- FOOTER -->
@include('user.layout.footer')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- OWL JS -->

<!-- APP JS -->
{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
<script src="{{asset('mystore/js/jquery.min.js')}}"></script>
<script src="{{asset('mystore/js/bootstrap.min.js')}}"></script>
<script src="{{asset('mystore/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('mystore/js/lightslider.js')}}"></script>
<script src="{{asset('mystore/js/prettify.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>--}}

@stack('footer')
</body>

</html>

