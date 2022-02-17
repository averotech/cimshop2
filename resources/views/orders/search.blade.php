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

                <a href="{{url('editOrder/'.$order->id)}}" class="btn btn-sm btn-clean btn-icon" title="{{  __('langs.edit') }}">
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

                                    {!! Form::open(['url' => route('admin.order.delete',['id' => $order->id]) , 'files' => true,'method'=>'delete']) !!}

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

