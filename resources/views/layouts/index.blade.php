<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    @yield('title')
    <!-- CSS files -->
    @yield('css')
</head>
<body >
<script src="{{ asset('js/demo-theme.min.js') }}?1684106062"></script>
<div class="page">
    @include('partials.header')
{{--    @include('partials.aside')--}}
    <div class="main-content">
        @yield('main')
    </div>
    @include('partials.footer')
</div>
@yield('js')
</body>
</html>
