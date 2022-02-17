<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('site.layouts.head')

<body>
    @include('site.layouts.header')


<div id="app">
    @yield('content')

    <div class="overlay"></div>
    @include('site.layouts.footer')
</div>

@include('site.layouts.js')
</body>
</html>
