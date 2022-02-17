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
										<h3 class="card-label">   {{  __('langs.orders') }}
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
										</span><i class="la la-sign-out-alt"></i>  {{  __('langs.back') }}</a>
										<!--end::Button-->
									</div>
								</div>
								<div class="card-body">
										<!--begin::Card-->
									<div class="card card-custom gutter-b example example-compact">
										<div class="card-header">
											<h3 class="card-title">   {{  __('langs.edit_order') }}</h3>
											<div class="card-toolbar">
												<div class="example-tools justify-content-center">
													<!--<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
													<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>-->
												</div>
											</div>
										</div>
										<!--begin::Form-->
										 {!! Form::open(['url' => route('admin.order.edit',['id' =>$order->id]),
														'method'=>'post' ,
														'enctype' => 'multipart/form-data',
														]) !!}


											@csrf
											<div class="card-body">


											<div class="form-group row">
													<div class="col-lg-12">
														<label>
														{{  __('langs.status') }} : </label>

														<select class="form-control" id="exampleSelectd" name="status">
															<option value="pending" {{$order->status == "pending" ? 'selected' :  ''}} >{{  __('langs.pending') }}</option>
															<option value="confirmed" {{$order->status == "confirmed" ? 'selected' :  '' }}>{{  __('langs.confirmed') }}</option>
															<option value="preparing" {{$order->status == "preparing" ? 'selected' :  ''}} >{{  __('langs.preparing') }}</option>
															<option value="awaiting_shipment" {{$order->status == "awaiting_shipment" ? 'selected' :  ''}} >{{  __('langs.awaiting_shipment') }}</option>
															<option value="shipped" {{$order->status == "shipped" ? 'selected' :  ''}} >{{  __('langs.shipped') }}</option>
															<option value="delivered" {{$order->status == "delivered" ? 'selected' :  ''}} >{{  __('langs.delivered') }}</option>
															<option value="cancelled" {{$order->status == "cancelled" ? 'selected' :  ''}} >{{  __('langs.cancelled') }}</option>
													    </select>

													</div>
                                                </div>



											</div>
											<div class="card-footer">
												<div class="row">
													<div class="col-lg-4"></div>
													<div class="col-lg-8">
															{!! Form::submit(  __('langs.save'), [
																	'class'=>' submit btn btn-primary mr-2',
																	'type'=>'reset',
																	'id' => 'send'
																	 ]) !!}
														<!-- <button type="reset" class="btn btn-secondary">إلغاء</button> -->
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




	<script type="text/javascript">
		$(document).ready(function() {
		  $(".addMoreSlider").click(function(){
			  var cloneHTML = $(".clone").html();
			  $(".sliderList").after(cloneHTML);
		  });
		  $("body").on("click",".removeSliderImage",function(){
			  $(this).parent().parent(".phpicoder").remove();
		  });
		});
	</script>




</body>
<!--end::Body-->
</html>
