@include('template.includes.header')

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <a href="{{ route('admin.dashboard.index') }}">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }}" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->
            <!--begin::Header Menu Mobile Toggle-->
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->

            @include('template.includes.sidebar')

            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->

                 @include('template.includes.navbar')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->

                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <!--end::Toolbar-->
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Notice-->
                                  @if(session()->has('alert_error_msg'))
                                   <div  class="alert alert-danger" role="alert">
                                       {{ session('alert_error_msg') }}
                                   </div>

                                   @endif


                                   @if(session()->has('alert_success_msg'))
                                   <div class="alert alert-success" role="alert">
                                       {{ session('alert_success_msg') }}
                                   </div>

                                   @endif
                            <!--end::Notice-->
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                    <div class="card-title">
                                        <h3 class="card-label"> {{  __('langs.products') }}
                                        <span class="d-block text-muted pt-2 font-size-sm"><!--advance header options--></span></h3>
                                    </div>
                                    <div class="card-toolbar">
                                        <!--begin::Dropdown-->


                                        <!--end::Dropdown-->
                                        <!--begin::Button-->
                                        <a href="{{route('admin.product.create')}}" class="btn btn-primary font-weight-bolder">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->

                                            <!--end::Svg Icon-->
                                        </span><i class="la la-plus"></i> {{  __('langs.add') }}</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
                                        <thead>

                                            <tr>
                                                <th>{{  __('langs.id') }}  </th>
                                                <th>  {{  __('langs.name') }}
                                                            @if(app()->isLocale('ar'))
                                                            (عربي)
                                                            @endif

                                                            @if(app()->isLocale('en'))
                                                            (ar)
                                                            @endif
                                                 </th>
                                                <th>
                                                     {{  __('langs.name') }}
                                                             @if(app()->isLocale('ar'))
                                                            (إنكليزي)
                                                            @endif

                                                            @if(app()->isLocale('en'))
                                                            (en)
                                                            @endif

                                                </th>

                                                <th> {{  __('langs.sku') }}  </th>
                                                <th>
                                                    {{  __('langs.price') }}
                                                </th>
                                                <th>
                                                    {{  __('langs.quantity') }}
                                                </th>
                                                <th>
                                                    {{  __('langs.min_stock') }}
                                                </th>



                                                <th >{{  __('langs.tools') }}  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>
                                                    {{$product->name}}
                                                </td>
                                                <td>
                                                {{$product->name_en}}
                                                </td>
                                                <td>
                                                    {{$product->sku}}
                                                </td>
                                                <td>
                                                {{$product->price}}
                                                </td>
                                                <td>
                                                {{$product->quantity}}
                                                </td>
                                                <td>
                                                {{$product->min_stock}}
                                                </td>

                                                <td>

                                                    <a href="{{route('admin.product.edit',['id' =>$product->id])}}" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.edit') }}">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.delete') }}" data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}">
                                                        <i class="la la-trash"></i>
                                                    </a>

                                                    <a href="{{route('admin.product.show',['id'=>$product->id])}}" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.details') }}">
                                                    <i class="la la-newspaper"></i>
                                                    </a>

                                                    <a href="{{route('admin.product.other_info.info',['id' => $product->id])}}" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.add_other_info') }}">
                                                        <i class="la la-plus"></i>
                                                    </a>


                                                    <!-- Modal-->
                                                    <div class="modal fade" id="exampleModalCenter{{$product->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">  {{  __('langs.confirm_title') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">


                                                                {{  __('langs.confirm_msg') }}  {{$product->id}} ؟

                                                                </div>
                                                                <div class="modal-footer">

                                                                       {!! Form::open(['url' => route('admin.product.delete',['id' =>$product->id]) , 'files' => true,'method'=>'delete']) !!}

                                                                         {!! Form::submit( __('langs.yes') , ['class'=>' submit btn btn-primary font-weight-bold',

                                                                                                ]) !!}


                                                                         {!! Form::close() !!}

                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{__('langs.no')}}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





                                                </td>
                                            </tr>

                                            @endforeach




                                        </tbody>
                                    </table>




                                    <!--end: Datatable-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                     @include('template.includes.footer')
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->


    <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset('assets/admin/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/admin/js/pages/crud/datatables/basic/headers.js')}}"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
