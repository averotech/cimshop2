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
										<h3 class="card-label">{{  __('langs.product_details') }}
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


							<div class="row">

								<div class="col-xl-4">
									<!--begin::Nav Panel Widget 2-->
									<div class="card card-custom card-stretch gutter-b">
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Wrapper-->
											<div class="d-flex justify-content-between flex-column pt-4 h-100">
												<!--begin::Container-->
												<div class="pb-5">
													<!--begin::Header-->
													<div class="d-flex flex-column flex-center">
														<!--begin::Symbol-->
														<div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
															 <span class="symbol-label">
																 @if($product->images()->first())
														        	<img src="{{url('/image/product/'.$product->images()->first()->img)}}" style="width:100%;height:100% !important" class="h-75 align-self-end" alt="" />
																 @endif
															 </span>
														 </div>
														<!--end::Symbol-->
														<!--begin::Username-->
														<a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1"></a>

														<!--end::Username-->
														<!--begin::Info-->
														<div class="font-weight-bold text-dark-50 font-size-sm pb-6"></div>
														<!--end::Info-->
													</div>
													<!--end::Header-->
													<!--begin::Body-->
													<div class="pt-1">
														<!--begin::Text-->
														<!--end::Text-->

														<div class="row">



															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9 col-md-12">
															<!--begin::Symbol-->
															<div class="symbol symbol-45 symbol-light mr-4">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-2x svg-icon-dark-50">

																		<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Settings-1.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"/>
																				<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
																				<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
																			</g>
																		</svg><!--end::Svg Icon-->

																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">
                                                                     {{  __('langs.name') }}
                                                                       @if(app()->isLocale('ar'))
                                                                        (عربي)
                                                                        @endif

                                                                        @if(app()->isLocale('en'))
                                                                        (ar)
                                                                        @endif
                                                                     </a>
																<span class="text-muted font-weight-bold">

                                                                {{  $product->name }}


																</span>
															</div>
															<!--end::Text-->
															<!--begin::label-->
															<!-- <span class="font-weight-bolder label label-xl label-light-info label-inline py-5 min-w-45px">



															</span> -->
															<!--end::label-->
														</div>
														<!--end::Item-->

														</div>


                                                        <div class="row">

                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-9 col-md-12">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-45 symbol-light mr-4">
                                                                <span class="symbol-label">
                                                                    <span class="svg-icon svg-icon-2x svg-icon-dark-50">

                                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Settings-1.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
                                                                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
                                                                            </g>
                                                                        </svg><!--end::Svg Icon-->

                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Text-->
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">
                                                                    {{  __('langs.name') }}
                                                                       @if(app()->isLocale('ar'))
                                                                        (إنكليزي)
                                                                        @endif

                                                                        @if(app()->isLocale('en'))
                                                                        (en)
                                                                        @endif

                                                                 </a>
                                                                <span class="text-muted font-weight-bold">

                                                                {{  $product->name_en }}

                                                                </span>
                                                            </div>
                                                            <!--end::Text-->
                                                            <!--begin::label-->
                                                            <!-- <span class="font-weight-bolder label label-xl label-light-info label-inline py-5 min-w-45px">



                                                            </span> -->
                                                            <!--end::label-->
                                                            </div>
                                                            <!--end::Item-->

                                                            </div>



														<div class="row">

														<!--begin::Item-->
														<div class="d-flex align-items-center pb-9 col-md-12">
															<!--begin::Symbol-->
															<div class="symbol symbol-45 symbol-light mr-4">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
																				<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
																				<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
																				<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">  {{  __('langs.sku') }}</a>
																<span class="text-muted font-weight-bold">{{$product->sku}}</span>
															</div>
															<!--end::Text-->
															<!--begin::label-->
															<!-- <span class="font-weight-bolder label label-xl label-light-success label-inline px-3 py-5 min-w-45px">
																<i class="la la-phone"></i>
															</span> -->
															<!--end::label-->
														</div>
														<!--end::Item-->

														</div>

														<div class="row">

														<!--begin::Item-->
														<div class="d-flex align-items-center pb-9 col-md-12">
															<!--begin::Symbol-->
															<div class="symbol symbol-45 symbol-light mr-4">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-2x svg-icon-dark-50">

																		<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"/>
																			<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																			<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																		</g>
																	</svg><!--end::Svg Icon-->

																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">  {{  __('langs.price') }}</a>
																<span class="text-muted font-weight-bold">{{$product->price}}</span>
															</div>
															<!--end::Text-->
															<!--begin::label-->
															<!-- <span class="font-weight-bolder label label-xl label-light-danger label-inline px-3 py-5 min-w-45px">

															  <i class="far fa-calendar-alt"></i>

															</span> -->
															<!--end::label-->
														</div>
														<!--end::Item-->

														</div>



														<div class="row">
														<!--begin::Item-->
														<div class="d-flex align-items-center pb-9 col-md-12">
															<!--begin::Symbol-->
															<div class="symbol symbol-45 symbol-light mr-4">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
																				<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">  {{  __('langs.quantity') }} </a>
																<span class="text-muted font-weight-bold">

																	{{$product->quantity}}

																</span>
															</div>
															<!--end::Text-->
															<!--begin::label-->
															<!-- <span class="font-weight-bolder label label-xl label-light-info label-inline py-5 min-w-45px">



															</span> -->
															<!--end::label-->
														</div>
														<!--end::Item-->

													</div>

													<div class="row">

													<!--begin::Item-->
													<div class="d-flex align-items-center pb-9 col-md-12">
															<!--begin::Symbol-->
															<div class="symbol symbol-45 symbol-light mr-4">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																		  	<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Box1.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"/>
																					<polygon fill="#000000" opacity="0.3" points="6 3 18 3 20 6.5 4 6.5"/>
																					<path d="M6,5 L18,5 C19.1045695,5 20,5.8954305 20,7 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,7 C4,5.8954305 4.8954305,5 6,5 Z M9,9 C8.44771525,9 8,9.44771525 8,10 C8,10.5522847 8.44771525,11 9,11 L15,11 C15.5522847,11 16,10.5522847 16,10 C16,9.44771525 15.5522847,9 15,9 L9,9 Z" fill="#000000"/>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column flex-grow-1">
																<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">  {{  __('langs.min_stock') }} </a>
																<span class="text-muted font-weight-bold">

																{{$product->min_stock }}

																</span>
															</div>
															<!--end::Text-->
															<!--begin::label-->
															<!-- <span class="font-weight-bolder label label-xl label-light-info label-inline py-5 min-w-45px">



															</span> -->
															<!--end::label-->
														</div>
														<!--end::Item-->



													</div>







													</div>
													<!--end::Body-->
												</div>
												<!--eng::Container-->
												<!--begin::Footer-->
												<div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
													<!--<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">تعديل البروفايل</button>-->
												</div>
												<!--end::Footer-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Nav Panel Widget 2-->
								</div>


                                <div class="col-lg-4 col-xxl-4 order-1 order-xxl-2">

                                  <!--begin::List Widget 4-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0">

													<h3 class="card-title font-weight-bolder text-dark"> {{  __('langs.colors') }} </h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">

													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">

                                            @foreach($product->colors as $color)
											<span class="text-muted font-weight-bold">
												<span class="label label-lg label-light-info label-inline" style="background: {{$color->color}};border-radius:100%;width:20px;height:20px "></span>
											</span>
                                            @endforeach



                                            <br/>
                                            <br/>
                                            <br/>


                                            <h3 class="card-title font-weight-bolder text-dark"> {{  __('langs.categories') }} </h3>

                                            @foreach($product->category_product as $category)
                                            <span class="text-muted font-weight-bold">
                                                <span class="label label-lg label-light-info label-inline">{{$category->category()->first()->name}}</span>
                                            </span>
                                            @endforeach

											</div>

											<!--end::Body-->
										</div>
										<!--end:List Widget 4-->

                                      <br/>
                                      <br/>



									</div>

								 <!--end::Card-->


                                 <div class="col-lg-4 col-xxl-4 order-1 order-xxl-2">
										<!--begin::List Widget 4-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title font-weight-bolder text-dark">{{ __('langs.other_infos') }}</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">

													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">

                                            @foreach($product->other_infos as $info)
                                            <!--begin::Item-->
												<div class="d-flex align-items-center">
													<!--begin::Bullet-->
													<span class="bullet bullet-bar bg-success align-self-stretch"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<label class="checkbox checkbox-lg checkbox-light-success checkbox-inline flex-shrink-0 m-0 mx-4">
														<input type="checkbox" name="select" value="1" />
														<span></span>
													</label>
													<!--end::Checkbox-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{$info->title}}</a>
														<span class="text-muted font-weight-bold">   {{$info->description}} </span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->

													<!--end::Dropdown-->
												</div>
												<!--end:Item-->

                                                @endforeach


											</div>
											<!--end::Body-->
										</div>
										<!--end:List Widget 4-->
									</div>




                                    </div>


                                <div class="row">

                                    <div class="col-xl-12">
                                    <!--begin::Nav Panel Widget 2-->
                                    <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex justify-content-between flex-column pt-4 h-100">
                                                <!--begin::Container-->
                                                <div class="pb-5">
                                                    <!--begin::Header-->
                                                    <div class="d-flex flex-column flex-center">
                                                        <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder"> {{__('langs.images')}} </a>
                                                    </div>
                                                    <!--end::Header-->
                                                    <!--begin::Body-->
                                                    <div class="pt-1">
                                                        <!--begin::Text-->
                                                         @foreach($product->images as $image)
                                                            <span class="rem_img" id="{{$image->id}}">

                                                                 <img src="{{url('/image/product/'.$image->img)}}" style="width:100px;height:100px;margin-right:10px;border-radius:5px;border:blue solid 0.5px" class=" align-self-end" alt="" />

                                                         </span>
                                                         @endforeach
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--eng::Container-->
                                                <!--begin::Footer-->
                                                <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
                                                    <!--<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">تعديل البروفايل</button>-->
                                                </div>
                                                <!--end::Footer-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Nav Panel Widget 2-->
                                </div>



							</div>

                            <div class="row">

                                    <div class="col-xl-12">
                                    <!--begin::Nav Panel Widget 2-->
                                    <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex justify-content-between flex-column pt-4 h-100">
                                                <!--begin::Container-->
                                                <div class="pb-5">
                                                    <!--begin::Header-->
                                                    <div class="d-flex flex-column flex-center">
                                                        <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder"> {{__('langs.similars')}} </a>
                                                    </div>
                                                    <!--end::Header-->
                                                    <!--begin::Body-->
                                                    <div class="pt-1">
                                                        <!--begin::Text-->
                                                         @foreach($product->similars as $similar)
                                                            <span class="rem_img" style="float:right">

															@if(app()->isLocale('ar'))
																<span class="btn btn-light-primary font-weight-bold mr-2">
																	{{$similar->similar()->first()->name}}
																</span>
															@endif
															@if(app()->isLocale('en'))
																<span class="btn btn-light-primary font-weight-bold mr-2">
																	{{$similar->similar()->first()->name_en}}
																</span>
															@endif

                                                         </span>
                                                         @endforeach
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--eng::Container-->
                                                <!--begin::Footer-->
                                                <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
                                                    <!--<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">تعديل البروفايل</button>-->
                                                </div>
                                                <!--end::Footer-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Nav Panel Widget 2-->
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
	<!--begin::Page Vendors(used by this page)-->
	<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(used by this page)-->
	<script src="{{asset('assets/js/pages/crud/datatables/basic/headers.js')}}"></script>
	<!--end::Page Scripts-->

	<script>

	$(document).ready( function (){
		$('#kt_datatable1').dataTable();
	});

	</script>

</body>
<!--end::Body-->
</html>
