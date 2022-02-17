    @include('template.includes.header')

	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="">
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


									<div class="row">

										<span class="btn btn-light-success font-weight-bold mr-2">
											{{ __('langs.product_count') }} : {{$products_count}}
										</span>
										<span class="btn btn-light-primary font-weight-bold mr-2">
											{{ __('langs.order_count') }} : {{$orders_count}}
										</span>
										<span class="btn btn-light-info font-weight-bold mr-2">
											{{ __('langs.msgs_count') }} : 	{{$msgs_count}}
										</span>

									</div>



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
											<h3 class="card-label"> {{  __('langs.orders') }}
											<span class="d-block text-muted pt-2 font-size-sm"><!--advance header options--></span></h3>
										</div>
{{--										<div class="card-toolbar">--}}

{{--												<div class="form-group row">--}}
{{--													<div class="col-lg-12">--}}

{{--														<select class="form-control order_type" name= "order_type">--}}

{{--															<option value="pending">{{  __('langs.pending') }} </option>--}}
{{--															<option value="confirmed">{{  __('langs.confirmed') }} </option>--}}
{{--															<option value="preparing">{{  __('langs.preparing') }} </option>--}}
{{--															<option value="awaiting_shipment">{{  __('langs.awaiting_shipment') }} </option>--}}
{{--															<option value="shipped">{{  __('langs.shipped') }} </option>--}}
{{--															<option value="delivered">{{  __('langs.delivered') }} </option>--}}
{{--															<option value="cancelled">{{  __('langs.cancelled') }} </option>--}}

{{--														</select>--}}

{{--													</div>--}}

{{--                                                </div>--}}

{{--										</div>--}}
									</div>
									<div class="card-body table_div">
										<!--begin: Datatable-->
										<table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
											<thead>
												<tr>
													<th>{{  __('langs.id') }}  </th>
													<th>  {{  __('langs.name') }}   </th>
													<th>
														 {{  __('langs.phone') }}
													</th>
													<th> {{  __('langs.email') }}  </th>
													<th> {{  __('langs.status') }}  </th>

                                                    <th >{{  __('langs.tools') }}  </th>
												</tr>
											</thead>
											<tbody>
                                                  @foreach($orders as $order)
												<tr>
													<td>{{$order->id}}</td>
													<td>
														{{$order->name}}
                                                    </td>
													<td>
													{{$order->phone}}
                                                    </td>
													<td>
													{{$order->email}}
                                                    </td>
													<td>
														@if($order->status == "pending")
														<span class="btn btn-light-primary font-weight-bold mr-2">
													    	{{  __('langs.pending') }}
														</span>
														@endif
														@if($order->status == "confirmed")
														<span class="btn btn-light-info font-weight-bold mr-2">
													    	{{  __('langs.confirmed') }}
														</span>
														@endif
														@if($order->status == "preparing")
														<span class="btn btn-light-success font-weight-bold mr-2">
													    	{{  __('langs.preparing') }}
														</span>
														@endif
														@if($order->status == "awaiting_shipment")
														<span class="btn btn-light-danger font-weight-bold mr-2">
													    	{{  __('langs.awaiting_shipment') }}
													    </span>
														@endif
														@if($order->status == "shipped")
														<span class="btn btn-light-info font-weight-bold mr-2">
													    	{{  __('langs.shipped') }}
														</span>
														@endif
														@if($order->status == "delivered")
														<span class="btn btn-light-success font-weight-bold mr-2">
													    	{{  __('langs.delivered') }}
													    </span>
														@endif
														@if($order->status == "cancelled")
														<span class="btn btn-light-danger font-weight-bold mr-2">
													    	{{  __('langs.cancelled') }}
													    </span>
														@endif
														</td>


													<td>

                                                        <a href="{{route('admin.order.edit',['id' => $order->id])}}" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.edit') }}">
                                                            <i class="la la-edit"></i>
                                                        </a>
                                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.delete') }}" data-toggle="modal" data-target="#exampleModalCenter{{$order->id}}">
                                                            <i class="la la-trash"></i>
                                                        </a>

                                                        <!-- Modal-->
                                                        <div class="modal fade" id="exampleModalCenter{{$order->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">  {{  __('langs.confirm_title') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">


																	{{  __('langs.confirm_msg') }}  {{$order->id}} ؟

                                                                    </div>
                                                                    <div class="modal-footer">

                                                                           {!! Form::open(['url' => route('admin.order.delete',['id'=>$order->id]) , 'files' => true,'method'=>'delete']) !!}

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
        <script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('assets/admin/js/scripts.bundle.js') }}"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Vendors(used by this page)-->
        <script src="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="{{ asset('assets/admin/js/pages/crud/datatables/basic/headers.js') }}"></script>
		<!--end::Page Scripts-->


		<script>

			$(document).ready(function(){

				$(document).on('change','.order_type',function(){
						// console.log(' CHANGE .....');

						var order_type = $(this).val();
						var div = $(this).parent().parent().parent().parent().parent().find('.table_div');
						console.log(' ----- :',div);


					var op = " ";
					$.ajax({
						type:'get',
						url:'{!! URL::to("findOrders") !!}',
						data:{'order_type':order_type},
						dataType: "json",
						success:function(data){
								console.log('Success');
								console.log(data);
								console.log(data.length);

							var table = `<table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
												<thead>
													<tr>
														<th>{{  __('langs.id') }}  </th>
														<th>  {{  __('langs.name') }}   </th>
														<th>
																{{  __('langs.phone') }}
														</th>
														<th> {{  __('langs.email') }}  </th>
														<th> {{  __('langs.status') }}  </th>

														<th >{{  __('langs.tools') }}  </th>
													</tr>
												</thead>
												<tbody>`;


												for(var i=0;i<data.length;i++){

													table+=


													`<tr>
														<td>`+data[i].id+`</td>
														<td>`+data[i].name+
														`</td>
														<td>`+data[i].phone+
														`</td>
														<td>`+data[i].email+
														`</td>
														<td>`;

													if(data[i].status == "pending"){
														table+=
														`<span class="btn btn-light-primary font-weight-bold mr-2">
													    	{{  __('langs.pending') }}
														</span>`;
													}

													if(data[i].status == "confirmed"){
														table+=
														`<span class="btn btn-light-primary font-weight-bold mr-2">
													    	{{  __('langs.confirmed') }}
														</span>`;
													}


													if(data[i].status == "preparing"){
														table+=
														`<span class="btn btn-light-primary font-weight-bold mr-2">
													    	{{  __('langs.preparing') }}
														</span>`;
													}
													if(data[i].status == "awaiting_shipment"){
														table+=
														`<span class="btn btn-light-primary font-weight-bold mr-2">
													    	{{  __('langs.awaiting_shipment') }}
														</span>`;
													}

													if(data[i].status == "shipped"){
														table+=
														`<span class="btn btn-light-primary font-weight-bold mr-2">
													    	{{  __('langs.shipped') }}
														</span>`;
													}

													if(data[i].status == "delivered"){
														table+=
														`<span class="btn btn-light-primary font-weight-bold mr-2">
													    	{{  __('langs.delivered') }}
														</span>`;
													}

													if(data[i].status == "cancelled"){
														table+=
														`<span class="btn btn-light-primary font-weight-bold mr-2">
													    	{{  __('langs.cancelled') }}
														</span>`;
													}


												table+=`

														</td>

														<td>

															<a href="{{url('editOrder/'.`+data[i].id+`)}}" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.edit') }}">
																<i class="la la-edit"></i>
															</a>
															<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.delete') }}" data-toggle="modal" data-target="#exampleModalCenter{{`+data[i].id+`}}">
																<i class="la la-trash"></i>
															</a>

															<!-- Modal-->
															<div class="modal fade" id="exampleModalCenter{{`+data[i].id+`}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">  {{  __('langs.confirm_title') }}</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<i aria-hidden="true" class="ki ki-close"></i>
																			</button>
																		</div>
																		<div class="modal-body">


																		{{  __('langs.confirm_msg') }}  `+data[i].id+` ؟

																		</div>
																		<div class="modal-footer">

																				{!! Form::open(['url' => 'order/'.`+data[i].id+` , 'files' => true,'method'=>'delete']) !!}

																					{!! Form::submit( __('langs.yes') , ['class'=>' submit btn btn-primary font-weight-bold',

																										]) !!}


																					{!! Form::close() !!}

																			<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{__('langs.no')}}</button>
																		</div>
																	</div>
																</div>
															</div>

														</td>
													</tr>`

													;
												}

												table +=
									    	   `</tbody>
											</table>`
											;


							div.html(" ");
							div.append(table);
							console.log(table);
						},
						error:function(){
								console.log('Error');
						}
					});

				});
			});



		</script>



	</body>
	<!--end::Body-->
</html>
