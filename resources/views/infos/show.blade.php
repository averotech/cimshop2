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
                                        <h3 class="card-label">  {{  __('langs.website_info') }}
                                        <span class="d-block text-muted pt-2 font-size-sm"><!--advance header options--></span></h3>
                                    </div>
                                    <div class="card-toolbar">
                                        <!--begin::Dropdown-->


                                        <!--end::Dropdown-->
                                        <!--begin::Button-->
                                        <a href="javascript:history.back()" class="btn btn-primary font-weight-bolder">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->

                                            <!--end::Svg Icon-->
                                        </span><i class="la la-sign-out-alt"></i> {{  __('langs.back') }}</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <div class="card-body">
                                        <!--begin::Card-->
                                    <div class="card card-custom gutter-b example example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title"> {{  __('langs.website_info') }}</h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <!--<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Form-->
                                         {!! Form::open(['url' => route('admin.website_info.add'),
                                                        'method'=>'post' ,
                                                        'enctype' => 'multipart/form-data',
                                                        ]) !!}


                                            @csrf
                                            <div class="card-body">



                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{  __('langs.email') }}: </label>

                                                    @if($info)
                                                        <input id="email" type="email" class="form-control" required  placeholder=" {{  __('langs.email') }}" name="email"   value="{{ $info->email }}" />
                                                    @else
                                                    <input id="email" type="email" class="form-control" required  placeholder=" {{  __('langs.email') }}" name="email"   value="{{ old('email') }}" />
                                                    @endif

                                                </div>

                                                <div class="col-lg-6">
                                                    <label>
                                                    {{  __('langs.phone') }}

                                                     : </label>
                                                        @if($info)
                                                        <input id="title" type="text" class="form-control" required  placeholder=" {{  __('langs.phone') }}" name="phone"    value="{{ $info->phone }}" />
                                                        @else
                                                        <input id="title" type="text" class="form-control" required  placeholder=" {{  __('langs.phone') }}" name="phone"   value="{{ old('phone') }}" />
                                                        @endif


                                                </div>

                                            </div>


                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>
                                                          {{  __('langs.whatsapp_link') }}

                                                    : </label>
                                                        @if($info)
                                                        <input id="whatsapp_link" type="text" class="form-control" required  placeholder=" {{  __('langs.whatsapp_link') }}" name="whatsapp_link"   value="{{ $info->whatsapp_link }}" />
                                                        @else
                                                        <input id="whatsapp_link" type="text" class="form-control" required  placeholder=" {{  __('langs.whatsapp_link') }}" name="whatsapp_link"   value="{{ old('whatsapp_link') }}" />
                                                        @endif

                                                </div>

                                                <div class="col-lg-6">
                                                    <label>
                                                    {{  __('langs.facebook_link') }}

                                                     : </label>
                                                        @if($info)
                                                        <input id="title" type="text" class="form-control" required  placeholder=" {{  __('langs.facebook_link') }}" name="facebook_link"   value="{{ $info->facebook_link }}" />
                                                        @else
                                                        <input id="title" type="text" class="form-control" required  placeholder=" {{  __('langs.facebook_link') }}" name="facebook_link"   value="{{ old('facebook_link') }}" />
                                                        @endif


                                                </div>

                                            </div>


                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>
                                                    {{  __('langs.about_us') }}
                                                    @if(app()->isLocale('ar'))
                                                    (عربي)
                                                    @endif

                                                    @if(app()->isLocale('en'))
                                                    (ar)
                                                    @endif
                                                    : </label>

                                                        @if($info)
                                                        <textarea class="form-control" name="about_us"   rows="4">{{$info->about_us}}</textarea>
                                                        @else
                                                        <textarea class="form-control" name="about_us"   rows="4"></textarea>
                                                        @endif

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>
                                                    {{  __('langs.about_us') }}
                                                            @if(app()->isLocale('ar'))
                                                            (إنكليزي)
                                                            @endif

                                                            @if(app()->isLocale('en'))
                                                            (en)
                                                            @endif
                                                    : </label>

                                                        @if($info)
                                                        <textarea class="form-control" name="about_us_en"   rows="4">{{$info->about_us_en}}</textarea>
                                                        @else
                                                        <textarea class="form-control" name="about_us_en"   rows="4"></textarea>
                                                        @endif

                                                </div>
                                            </div>


                                            @foreach($images as $image)
                                                    <span class="rem_img" id="{{$image->id}}">

                                                         <img src="{{url('/image/story/'.$image->img)}}" style="width:10%;height:10%" class=" align-self-end" alt="" />

                                                         <input type="hidden" class="id_img" value="{{$image->id}}"/>

                                                         <button  class="btn btn-danger btn-xs btn-shadow font-weight-bold mr-2 removeImage" type="button">
                                                             <i class="la la-close"></i>
                                                         </button>

                                                    </span>
                                            @endforeach


                                            <br/>
                                            <br/>
                                            <br/>



                                            <input type="hidden" name="del_imgs" class="del_img"/>

                                            <div class="sliderList">
                                                <div class="input-group control-group" >
                                                <input type="file" name="imageFile[]"  class="myfrm form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success addMoreSlider" type="button">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="clone d-none">
                                                <div class="control-group input-group phpicoder" style="margin-top:5px">
                                                <input type="file" name="imageFile[]" class="myfrm form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger removeSliderImage" type="button">
                                                        <i class="la la-close"></i>
                                                    </button>
                                                </div>
                                                </div>
                                            </div>


                                            <br/>
                                            <br/>


                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label> {{  __('langs.video') }}  : </label>
                                                    <br/>
                                                    <input type="file"  name="video">
                                                    <br/>
                                                    <br/>
                                                    <video width="320" height="240" controls>
                                                        <source src="{{url('/video/'.$info->video)}}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            </div>

{{--                                            <div class="form-group row">--}}
{{--                                                <div class="col-lg-12">--}}
{{--                                                    <label> {{  __('langs.location') }}  : </label>--}}
{{--                                                    <br/>--}}
{{--                                                    <div id="map"></div>--}}
{{--                                                </div>--}}
{{--                                            </div> --}}

                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <label> {{  __('langs.location') }}  :
                                                            <a href="https://www.embedgooglemap.net/" target="_blank">{{ trans('site.click') }}</a>
                                                        </label>
                                                        <br/>
                                                        <input type="text" name="google_map" value="{{$info->google_map}}" class="myfrm form-control">
                                                    </div>
                                                 </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <label> {{  __('langs.website') }}  :</label>
                                                        <br/>
                                                        <input type="text" name="website" value="{{$info->website}}" class="myfrm form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <label> {{  __('langs.address') }}  :</label>
                                                        <br/>
                                                        <input type="text" name="address" value="{{$info->address}}" class="myfrm form-control">
                                                    </div>
                                                </div>

                                            <input class=" form-group row form-control form-control-lg form-control-solid"  id="lat" name="lat" type="hidden" value=""></input>
                                            <input class=" form-group row form-control form-control-lg form-control-solid"  id="lng" name="lng" type="hidden" value=""></input>

                                            <div class="form-group row" id="lat" name="lat"></div>
                                            <div class="form-group row" id="lng" name="lng"></div>
{{--                                            <div id="mapCanvas"></div>--}}
                                            <div id="markerStatus" style="display: none;"></div>
                                            <div id="myaddress" style="display: none;"></div>


                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-lg-4"></div>
                                                    <div class="col-lg-8">
                                                            {!! Form::submit( __('langs.save'), [
                                                                    'class'=>' submit btn btn-primary mr-2',
                                                                    'type'=>'reset',
                                                                    'id' => 'send'
                                                                     ]) !!}
                                                    </div>
                                                </div>
                                            </div>


                                        {!! Form::close() !!}
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Card-->



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
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>

    <!--end::Page Scripts-->



    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCLZOWnjcU-l5PEeT_6EYmiLauD0tyxhpY&sensor=false"></script>

    <script type="text/javascript">

    var map, infoWindow;
    var geocoder;

    function initialize() {
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById('mapCanvas'), {
        center: {
        lat: -34.397,
        lng: 150.644
        },
        zoom: 6
    });
    infoWindow = new google.maps.InfoWindow;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
            lat: {{$info->lat}},  //Put Lat Value From API
            lng: {{$info->lng}}   //Put Lng Value From API
        };
        // var pos = {
        //     // lat: position.coords.latitude,
        //     // lng: position.coords.longitude
        //     lat: '{{!empty($info->lat)}}' ? {{$info->lat}} : position.coords.latitude,
        //     lng: '{{!empty($info->lng)}}'?  {{$info->lng}} :  position.coords.longitude
        // };

      console.log("pos : "+pos);

      var marker = new google.maps.Marker({
        position: pos,
        map: map,
        draggable: true,
        title: 'Your position'
      });
      map.setCenter(pos);


      updateMarkerPosition(marker.getPosition());
      geocodePosition(pos);

      // Add dragging event listeners.
      google.maps.event.addListener(marker, 'dragstart', function() {
        updateMarkerAddress('Dragging...');
      });

      google.maps.event.addListener(marker, 'drag', function() {
        updateMarkerStatus('Dragging...');
        updateMarkerPosition(marker.getPosition());
      });

      google.maps.event.addListener(marker, 'dragend', function() {
        updateMarkerStatus('Drag ended');
        geocodePosition(marker.getPosition());
        map.panTo(marker.getPosition());
      });

        google.maps.event.addListener(map, 'click', function(e) {
            updateMarkerPosition(e.latLng);
            geocodePosition(marker.getPosition());
            marker.setPosition(e.latLng);
            map.panTo(marker.getPosition());
        });

        }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }

    }

    function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
        updateMarkerAddress(responses[0].formatted_address);

        } else {
        updateMarkerAddress('Cannot determine address at this location.');
        }
    });
    }

    function updateMarkerStatus(str) {
    document.getElementById('markerStatus').innerHTML = str;
    }

    function updateMarkerPosition(latLng) {
        lat = latLng.lat();
        $("#lat").val(lat);
        lng = latLng.lng();
        $("#lng").val(lng);
        // document.getElementById('lng').innerHTML =  latLng.lng();

    }

    function updateMarkerAddress(str) {
    document.getElementById('myaddress').innerHTML = str;
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
    }

    //Onload handler to fire off the app.
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>




</body>
<!--end::Body-->
</html>
