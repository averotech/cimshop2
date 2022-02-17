<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('site.layouts.head')


<body class="website-container">
@include('site.layouts.header')
<div id="app">
    @yield('content')
    @include('site.layouts.footer')
    <search-product-modal-component :title="'{{ trans('site.title_search') }}'"
                                    :button="'{{  trans('site.submit') }}'"
    ></search-product-modal-component>
</div>


<a href=" #" class="back-to-top"><svg x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
    <g><path d="M500.5,239.7c-3.9,0-7.8,1.5-10.8,4.5c-6,6-6,15.7,0,21.7l474.2,490c6,6,15.7,6,21.7,0c6-6,6-15.7,0-21.7l-474.2-490C508.3,241.2,504.4,239.7,500.5,239.7z"/><path d="M500,239.7c-3.9,0-7.8,1.5-10.8,4.5l-474.7,490c-6,6-6,15.7,0,21.7c6,6,15.7,6,21.7,0l474.7-490c6-6,6-15.7,0-21.7C507.9,241.2,504,239.7,500,239.7z"/></g>
    </svg>
</a>
{{--<a href=" #" class="back-to-top"><i class="fas fa-arrow-up"></i></a>--}}
@include('site.layouts.js')
</body>

</html>
