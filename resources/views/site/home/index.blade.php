@extends('site.layouts.app')
@push('page-title',trans('site.home_page'))
@section('content')
    @include('site.home.includes.sliders')
    @include('site.home.includes.ads')
    @include('site.home.includes.products')
@endsection


{{--<section class="mainBanner">--}}
{{--    <div class="slide h-100 d-flex justify-content-center align-items-center">--}}
{{--        <h4>{{ trans('site.beauty_cream') }}<br>{{ trans('site.from_cimShop') }}</h4>--}}
{{--    </div>--}}
{{--</section>--}}
{{--@include('site.home.includes.ads')--}}
{{--@include('site.home.includes.products')--}}
