<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <!--end::Header Nav-->
                  <a href="{{route('site.index')}}" class="mt-7" target="_blank">{{ trans('langs.visit_store') }}</a>
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Languages-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        <img class="h-20px w-20px rounded-sm" src="{{ app()->getLocale() =='ar' ? asset('assets/media/svg/flags/022-syria.svg') :asset('assets/media/svg/flags/226-united-states.svg') }}" alt=""/>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <!--begin::Item-->
                        <li class="navi-item">
                            <a href="{{route('site.change.language',['locale'=>'en'])}}" class="navi-link">
                                <span class="symbol symbol-20 mr-3"><img src="{{ asset('assets/media/svg/flags/226-united-states.svg') }}" alt=""/></span>
                                <span class="navi-text">English</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="navi-item active">
                            <a href="{{route('site.change.language',['locale'=>'ar'])}}" class="navi-link">
                                <span class="symbol symbol-20 mr-3"><img src="{{ asset('assets/media/svg/flags/022-syria.svg') }}" alt=""/></span>
                                <span class="navi-text">Arabic</span>
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Languages-->

            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"> {{  __('langs.welcome') }} </span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->name}}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
					<span class="symbol-label font-size-h5 font-weight-bold">
                        @if(auth()->user()->photo )
                            <img src="{{url('/image/profile/'.auth()->user()->photo)}}" style="width:100%;height:100%" class=" align-self-end" alt=""/>
                        @else
                            <img src="{{asset('assets/media/svg/avatars/007-boy-2.svg')}}" style="width:100%;height:100%" class=" align-self-end" alt=""/>
                        @endif
                    </span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>


<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0"> {{  __('langs.profile') }}
            <small class="text-muted font-size-sm ml-2"></small></h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                @if(auth()->user()->photo)
                    <img src="{{url('/image/profile/'.auth()->user()->photo)}}" style="width:100%" class=" align-self-end" alt=""/>
                @else
                    <img src="{{asset('assets/media/svg/avatars/007-boy-2.svg')}}" class=" align-self-end" alt=""/>
                @endif
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{auth()->user()->name}}</a>
                <div class="text-muted mt-1"></div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Phone.svg--><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M7.13888889,4 L7.13888889,19 L16.8611111,19 L16.8611111,4 L7.13888889,4 Z M7.83333333,1 L16.1666667,1 C17.5729473,1 18.25,1.98121694 18.25,3.5 L18.25,20.5 C18.25,22.0187831 17.5729473,23 16.1666667,23 L7.83333333,23 C6.42705272,23 5.75,22.0187831 5.75,20.5 L5.75,3.5 C5.75,1.98121694 6.42705272,1 7.83333333,1 Z" fill="#000000" fill-rule="nonzero"/><polygon fill="#000000" opacity="0.3" points="7 4 7 19 17 19 17 4"/><circle fill="#000000" cx="12" cy="21" r="1"/></g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="navi-text text-muted text-hover-primary">{{auth()->user()->username}}</span>
                        </span>
                    </a>
                    <a class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5" href="{{ route('auth.logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"> {{  __('langs.logout') }} </a>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0"></div>
        <!--end::Nav-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->
    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel-->
