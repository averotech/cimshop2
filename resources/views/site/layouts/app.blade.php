<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'iw' ? 'rtl' : 'ltr' }}">

@include('site.layouts.head')

<body>
    @include('site.layouts.header')


<div id="app" v-cloak>
    @yield('content')

    <div class="overlay"></div>
    <cart-component :route-cart="'{{ route('site.cart.index') }}'"></cart-component>

    @include('site.layouts.footer')
</div>

@include('site.layouts.js')
</body>
</html>
