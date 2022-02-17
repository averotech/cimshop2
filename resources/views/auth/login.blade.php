<!DOCTYPE html>
<html direction="{{ request()->segment(1) == 'ar' ? 'rtl' : 'ltr' }}"
      dir="{{request()->segment(1) == 'ar' ? 'rtl' : 'ltr'}}"
      style="direction: {{request()->segment(1) == 'ar' ? 'rtl' : 'ltr'}}" >
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>{{ trans('langs.login') }}</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{asset('assets/admin/css/pages/login/classic/login-4.rtl.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('assets/admin/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/admin/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{asset('assets/admin/css/themes/layout/header/base/light.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/admin/css/themes/layout/header/menu/light.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/admin/css/themes/layout/brand/dark.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/admin/css/themes/layout/aside/dark.rtl.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{asset('assets/admin/media/logos/favicon.png')}}" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
         <style>
        /* current style */
        @font-face {
            font-family: 'Droid Arabic Kufi';
        }
        body, a, p, span, h1, h2, h3, h4, h5, h6, div, label {
            font-family: 'Droid Arabic Kufi'; }

        @font-face {
            font-family: 'Droid Arabic Kufi';
            font-style: normal;
            font-weight: 400;
            src: url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.eot);
            src: url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.eot?#iefix) format('embedded-opentype'),
            url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.woff2) format('woff2'),
            url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.woff) format('woff'),
            url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Droid Arabic Kufi';
            font-style: normal;
            font-weight: 700;
            src: url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.eot);
            src: url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.eot?#iefix) format('embedded-opentype'),
            url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.woff2) format('woff2'),
            url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.woff) format('woff'),
            url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.ttf) format('truetype');
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }


        .modal-backdrop {
            position: relative !important;
        }

        body,h1,h2,h3,h4,h5{
            font-family: 'Droid Arabic Kufi' !important;
        }
/*
		body{
			background:#fff
		} */

    </style>





	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{asset('assets/admin/media/logos/logo-letter-13.png')}}" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>{{trans('langs.login')}}</h3>
								<div class="text-muted font-weight-bold">


                                     @if(session()->has('alert_error_msg'))
                                       <div  class="alert alert-primary" role="alert">
                                           {{ session('alert_error_msg') }}
                                       </div>

                                     @endif

                                </div>
							</div>

                            {!! Form::open(['url' => route('auth.do_login'),
                                                     'method'=>'post',
                                                     'class' => 'form ',
                                                     'id' => 'kt_login_signin_form',
                                                     'style' =>  'display:none'

                                  ]) !!}



                                    {!! Form::submit('تسجيل الدخول', [
                                        'class'=>'btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4',

                                     ]) !!}

                              {!! Form::close() !!}


                            <form method="POST" action="{{ route('auth.do_login') }}" class="form" id="kt_login_signin_form">
                              @csrf


                                 <div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="email" placeholder="{{trans('langs.email')}}" name="email"  />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="{{trans('langs.password')}}" name="password" />
								</div>




                        <div class="form-group row mb-0">
                            @if(app()->getLocale()==='ar')
                            <div class="col-md-8 offset-md-2">
                                @else
                                    <div class="col-md-12 offset-md-2">
                            @endif
                                <button type="submit" class="btn btn-primary">
                                  {{trans('langs.login')}}
                                </button>

                            </div>
                        </div>
                    </form>


						</div>
						<!--end::Login Sign in form-->

						<!--begin::Login forgot password form-->
						<!--<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<div class="text-muted font-weight-bold">Enter your email to reset your password</div>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
								</div>
							</form>
						</div>-->
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
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
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/admin/js/pages/custom/login/login-general.js')}}"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>




