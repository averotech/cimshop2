<head>
    <meta charset="utf-8">
    <title>CimShop | @stack('page-title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet"/>
    <link href="{{ asset('assets/img/favicon2.ico') }}" rel="icon">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('assets/css/fontawesome/all.css') }}" rel="stylesheet" >
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet" >
    <link href="{{ asset('assets/css/owl.theme.default.css') }}" rel="stylesheet" >
    <link href="{{ asset('assets/css/popup-lightbox.css') }}" rel="stylesheet" >
    @if(app()->getLocale() === 'iw')
        <link href="{{ asset('assets/css/style-rtl.css') }}" rel="stylesheet" >
    @else
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" >
    @endif
    <style>
        .error {
            color:red;
        }
        [v-cloak] > * {
            display: none;
        }
    </style>
    @stack('css')
</head>
