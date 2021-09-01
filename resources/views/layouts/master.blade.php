<!DOCTYPE html>
<html>
<head>
    @include('layouts.meta')
    @yield('title')
    @include('layouts.css')
    @yield('css')
</head>
<body role="document" style="height: 100%;">
    @include('layouts.nav')
    <div class="container mb-4 h-75" role="main">
        @yield('content')
    </div>
    @include('layouts.bottom')
    @include('layouts.scripts')
    @include('Alerts::show')
    @yield('scripts')
</body>
</html>