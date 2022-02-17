<div class="container-fluid p-0" id="navbar">
    <div class="nav-logo d-flex justify-content-center bg-white">
        <img src="{{ asset('assets/img/logo.png') }}" >
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white p-0  ">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('site.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('site.shop.index')}}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('site.about_us.index')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('site.faq.index')}}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.contact_us.index') }}">Contact</a>
                    </li>
                    <li class="nav-item  d-lg-none d-md-none d-sm-block d-xs-block">
                        <a href="{{route('site.cart.index')}}" class="CartIco "> <i class="fal fa-shopping-bag"></i><span class="badge badge-pill badge-danger">5</span> </a>
                    </li>
                    <li class="nav-item  d-lg-none d-md-none d-sm-block d-xs-block">
                        <select class="form-select lang-select" aria-label="Default select example">
                            <option value="0" selected>English</option>
                            <option value="1">עִברִית</option>

                        </select>
                    </li>
                    <li class="nav-item subscribe d-lg-none d-md-none d-sm-block d-xs-block">

                        <div class="input-group mb-3 ">
                            <form action="{{route('site.shop.index')}}" method="get">
                            <input  type="text" id="name" name="text-search"  class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Search">
                            </form>
                        </div>

                    </li>
                </ul>
                <form class="d-flex right-navbar  ">

                    <!--div class="btn-group lang-group ms-5" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                      <label class="btn btn-outline-primary" for="btnradio1">English</label>


                      <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                      <label class="btn btn-outline-primary " for="btnradio3">עִברִית</label>
                    </div-->
                    <select class="form-select lang-select" aria-label="Default select example">
                        <option value="0" selected>English</option>
                        <option value="1">עִברִית</option>

                    </select>
                    <a href="{{route('site.cart.index')}}" class="CartIco "> <i class="fal fa-shopping-bag"></i>
                    <span class="badge badge-pill badge-danger">5</span> </a>
                    <form action="{{route('site.shop.index')}}" method="get">
                        <div class="searchDiv">
                            <input  type="text" id="name" name="text-search"  class="form-control me-2 rounded-pill font" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-success rounded-pill" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </nav>
</div>


{{--<div class=" headerTop">--}}
{{--    <div class="container">--}}
{{--        <div class="row" style="justify-content: space-evenly;">--}}
{{--            <div class="logo-top"><a href="{{ route('site.index') }}"><img src="{{ asset('site/images/logoCut.PNG') }}" alt="logo" class="h-logo"></a></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<header id="header" class="fixed-top ">--}}
{{--    <ul id="btns-mob-menu" class="  mb-0">--}}
{{--        <li class=" top-menu-btn">--}}
{{--            <a href="{{route('site.cart.index')}}" class="icon-menu">--}}
{{--                <p class="lang-btn"><i class="fas fa-shopping-bag"></i></p></a>--}}
{{--           @php--}}
{{--               $locales = config('app.locales');--}}
{{--                unset($locales[app()->getLocale()]);--}}
{{--           @endphp--}}
{{--             <a class="icon-menu" href="{{ route('site.change.language',['locale' => array_keys($locales)[0]]) }}">--}}
{{--                <p class="lang-btn"><i class="fas fa-globe"></i></p>--}}
{{--            </a>--}}
{{--            <span class="">{{ strtoupper(app()->getLocale()) }}</span>--}}
{{--        </li>--}}

{{--        <div class="logo hideLlogoSm"><a href="{{route('site.cart.index')}}"><img src="{{ asset('site/images/logoCut.PNG') }}" alt="logo" class="h-logo"></a></div>--}}
{{--        <div class=""></div>--}}
{{--    </ul>--}}
{{--    <nav class="main-nav float-right d-none d-lg-block">--}}
{{--        <ul class="menu-list">--}}
{{--            <li class=" top-menu-btn mobile-hide"><a data-toggle="modal" data-target="#searchModal" class="icon-menu"><p class=""><img src="{{ asset('site/images/glasses.PNG') }}" alt="search"> {{trans('site.search')}}..</p></a></li>--}}
{{--            <li class=" top-menu-btn mobile-hide flex-grow-1"></li>--}}
{{--            <li class="{{request()->segment(2) === null ?'activeMenuTab' : ''}}">--}}
{{--                <a href="{{route('site.index')}}">--}}
{{--                    <p class="menu-p">{{ trans('site.home') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="{{request()->segment(2) === 'shop' ?'activeMenuTab' : ''}}">--}}
{{--                <a href="{{route('site.shop.index')}}">--}}
{{--                    <p class="menu-p">{{ trans('site.shop') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="{{request()->segment(2) === 'about-us' ?'activeMenuTab' : ''}}">--}}
{{--                <a href="{{route('site.about_us.index')}}">--}}
{{--                    <p class="menu-p">{{ trans('site.about_us') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="{{request()->segment(2) === 'faqs' ?'activeMenuTab' : ''}}">--}}
{{--                <a href="{{route('site.faq.index')}}">--}}
{{--                    <p class="menu-p">{{ trans('site.FAQ') }} </p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="{{request()->segment(2) === 'contact-us' ?'activeMenuTab' : ''}}">--}}
{{--                <a href="{{route('site.contact_us.index')}}">--}}
{{--                    <p class="menu-p">{{ trans('site.contact_us') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="input-group mobile-search d-lg-none">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>--}}
{{--                </div>--}}
{{--                <form action="{{route('site.shop.index')}}" style="display: flex; flex-direction: column">--}}
{{--                <input type="text" id="name" name="text-search" required class="form-control" placeholder="{{ trans('site.search') }}">--}}
{{--                </form>--}}
{{--            </li>--}}
{{--            <li class=" top-menu-btn mobile-hide flex-grow-1"></li>--}}

{{--        </ul>--}}
{{--    </nav>--}}
{{--</header>--}}
