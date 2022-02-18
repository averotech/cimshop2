@extends('site.layouts.app')

@push('page-title',trans('site.about_us'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headTitle d-flex justify-content-between">
                    <h1 class=" tDefualt Fn-Bd"> {{ trans('site.about_us') }} </h1>
                </div>
            </div>
        </div>
        <div class="row AboutPage   ">
            <div class="col-12  ">
                <div class="boxDefualt  p-5 ">
                    <div class="row  ">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pe-lg-5  pe-md-5">
                            <div class="title"><h1>{{ trans('site.our_story') }}</h1></div>
                            <p>{{$settings['show_about']}}</p>
                            <div class="addressIco"><i class="fal fa-map-marker-alt"></i> {{$settings['address']}}</div>
                            <div class="addressIco"><i class="fal fa-envelope"></i>{{$settings['email']}}</div>
                            <div class="addressIco"><i class="fal fa-globe"></i>{{$settings['website']}}</div>
                            <a class="btn btn-defualt" href="{{ route('site.contact_us.index') }}"> {{ trans('site.contact_us') }}</a>
                        </div>
                        @if(count($images) >=1)
                        <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                            @foreach($images as $index => $image)
                                @if($index===2)
                                    @break
                                @endif
                                <div class="img img{{$image->id}}">
                                    <img src="{{$image->img_url}}">
                                </div>
                            @endforeach
                        </div>
                        @endif
                        @if(count($images) >=2)
                        <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                            @foreach($images as $index => $image)
                                @if($index==0||$index==1)
                                    @continue
                                @endif
                                <div class="img img{{$image->id}}">
                                    <img src="{{$image->img_url}}">
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="{{ asset('assets/css/popup-lightbox.css') }}" rel="stylesheet">
@endpush
@push('_js')
    <script src="{{ asset('assets/js/jquery.popup.lightbox.js') }}"></script>
@endpush
