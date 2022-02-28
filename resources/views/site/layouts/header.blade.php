@if(app()->getLocale() === 'iw')
    <div class="container-fluid p-0" id="navbar">
        <div class="nav-logo d-flex justify-content-center bg-white">
            <img src="{{ asset('assets/img/logo.png') }}">
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white p-0  ">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <div class="d-flex justify-content-between align-content-center innerContentNav" style="width:100%">
                        <ul class="navbar-nav   mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('site.index') }}">{{ trans('site.home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) === 'shop' ?'active' : ''}}" href="{{route('site.shop.index')}}">{{ trans('site.shop') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) === 'about-us' ?'active' : ''}}" href="{{route('site.about_us.index')}}">{{ trans('site.about_us') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) === 'faqs' ?'active' : ''}}" href="{{route('site.faq.index')}}">{{ trans('site.FAQ') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) === 'contact-us' ?'active' : ''}}" href="{{ route('site.contact_us.index') }}">{{ trans('site.contact_us') }}</a>
                            </li>
                            <li class="nav-item subscribe d-lg-none d-md-none d-sm-block d-xs-block">
                                <div class="input-group mb-3 ">
                                    <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <input  type="submit" class="btn btn-outline-secondary" value="Search" id="button-addon2">
                                </div>
                            </li>
                        </ul>
                        <form class="d-flex right-navbar  " action="{{route('site.shop.index')}}" method="get">
                            <select class="form-select lang-select" aria-label="Default select example">
                                @foreach($locales as $key=>$value)
                                    <option value="{{$key}}" {{app()->getLocale() === $key ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                            <a href="{{route('site.cart.index')}}" class="CartIco "> <i class="fal fa-shopping-bag"></i>
{{--                                <span class="badge badge-pill badge-danger">5</span> --}}
                            </a>
                            <div class="searchDiv">
                                <input class="form-control me-2 rounded-pill font" type="search" id="name" name="text-search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success rounded-pill" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="mobileCartLang   d-lg-none d-md-block d-sm-block d-xs-block">
            <select class="form-select lang-select" aria-label="Default select example">
                @foreach($locales as $key=>$value)
                    <option value="{{$key}}" {{app()->getLocale() === $key ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
            <a href="{{ route('site.cart.index') }}" class="CartIco ">
                <i class="fal fa-shopping-bag"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </div>
    </div>
@else
    <div class="container-fluid p-0" id="navbar">
        <div class="nav-logo d-flex justify-content-center bg-white"><img src="{{ asset('assets/img/logo.png') }}"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white p-0  ">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('site.index') }}">{{ trans('site.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->segment(2) === 'shop' ?'active' : ''}}" href="{{route('site.shop.index')}}">{{ trans('site.shop') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->segment(2) === 'about-us' ?'active' : ''}}" href="{{route('site.about_us.index')}}">{{ trans('site.about_us') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->segment(2) === 'faqs' ?'active' : ''}}" href="{{route('site.faq.index')}}">{{ trans('site.FAQ') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->segment(2) === 'contact-us' ?'active' : ''}}" href="{{ route('site.contact_us.index') }}">{{ trans('site.contact_us') }}</a>
                        </li>
                        <li class="nav-item  d-lg-none d-md-none d-sm-block d-xs-block">
                            <a href="{{route('site.cart.index')}}" class="CartIco ">
                                <i class="fal fa-shopping-bag"></i>
                                {{--<span class="badge badge-pill badge-danger">5</span>--}}
                            </a>
                        </li>
                        <li class="nav-item  d-lg-none d-md-none d-sm-block d-xs-block">
                            <select class="form-select lang-select" aria-label="Default select example">
                                @foreach($locales as $key=>$value)
                                    <option value="{{$key}}" {{app()->getLocale() === $key ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="nav-item subscribe d-lg-none d-md-none d-sm-block d-xs-block">

                            <div class="input-group mb-3 ">
                                <form action="{{route('site.shop.index')}}" method="get">
                                    <input type="text" id="name" name="text-search" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <input class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Search">
                                </form>
                            </div>

                        </li>
                    </ul>
                    <form action="{{route('site.shop.index')}}" method="get" class="d-flex right-navbar  ">

                        <!--div class="btn-group lang-group ms-5" role="group" aria-label="Basic radio toggle button group">
                          <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                          <label class="btn btn-outline-primary" for="btnradio1">English</label>


                          <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                          <label class="btn btn-outline-primary " for="btnradio3">עִברִית</label>
                        </div-->
                        <select class="form-select lang-select" aria-label="Default select example">
                            @foreach($locales as $key=>$value)
                                <option value="{{$key}}" {{app()->getLocale() === $key ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                        <a href="{{route('site.cart.index')}}" class="CartIco "> <i class="fal fa-shopping-bag"></i>
                            {{--<span class="badge badge-pill badge-danger">5</span>--}}
                        </a>
                        <div class="searchDiv">
                            <input type="text" id="name" name="text-search" class="form-control me-2 rounded-pill font" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-success rounded-pill" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <div class="mobileCartLang   d-lg-none d-md-block d-sm-block d-xs-block">
            <select class="form-select lang-select" aria-label="Default select example">
                @foreach($locales as $key=>$value)
                    <option value="{{$key}}" {{app()->getLocale() === $key ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
            <a href="{{ route('site.cart.index') }}" class="CartIco "> <i class="fal fa-shopping-bag"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </div>
    </div>
@endif
