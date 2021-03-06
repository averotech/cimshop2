@extends('site.layouts.app')
@push('page-title',trans('site.contact_us'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headTitle d-flex justify-content-between">
                    <h1 class=" tDefualt Fn-Bd"> {{ trans('site.contact_us') }} </h1>
                </div>
            </div>
        </div>
        <div class="row ContactPage ps-3 ">
            <div class="col-12 ps-0">
                <div class="boxDefualt p-4 ">
                    <div class="row">
                        @isset($items[0])
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 boxContatcUs p-lg-3  p-md-3 ">
                            <div class="bg">
                                <div class="ico"><i class="fal fa-shopping-bag"></i></div>
                                <h3 class="text-center">{{$items[0]->show_title}} </h3>
                                <p class="text-center">{!! $items[0]->show_description !!}</p>
                            </div>
                        </div>
                        @endisset
                        @isset($items[1])
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 boxContatcUs p-lg-3  p-md-3  ">
                            <div class="bg">
                                <div class="ico"><i class="fal fa-comment-alt-check"></i></div>

                                <h3 class="text-center">{{$items[1]->show_title}}</h3>
                                <p class="text-center">{!! $items[1]->show_description !!}</p>
                            </div>
                        </div>
                        @endisset
                        @isset($items[2])
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 boxContatcUs p-lg-3  p-md-3  ">
                            <div class="bg">
                                <div class="ico"><i class="fal fa-clock"></i></div>
                                <h3 class="text-center">{{$items[2]->show_title}}</h3>
                                <p class="text-center">{!! $items[2]->show_description !!}</p>
                            </div>
                        </div>
                        @endisset
                    </div>
                    <div class="row formContact">
                        <contact-us-form inline-template>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12  p-4 pt-0">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label ">{{ trans('site.name') }}</label>
                                    <input type="text" v-model="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                                    <span class="error" v-if="form.validation&&form.validation.name">@{{ form.validation.name[0]}} <br></span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{ trans('site.email_address') }}</label>
                                    <input type="email" v-model="email"  class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    <span class="error" v-if="form.validation&&form.validation.email">@{{ form.validation.email[0]}} <br></span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{ trans('site.subject') }}</label>
                                    <input type="text" v-model="subject" class="form-control" id="exampleFormControlInput1" placeholder="Your Adress">
                                    <span class="error" v-if="form.validation&&form.validation.subject">@{{ form.validation.subject[0]}} <br></span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{ trans('site.message') }}</label>
                                    <textarea v-model="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <span class="error" v-if="form.validation&&form.validation.message">@{{ form.validation.message[0]}}<br></span>
                                </div>
                                <button @click="sendMessage" :disabled="form.disabledButton" class=" btn btn-defualt" type="button">{{ trans('site.contact_us') }}</button>
                            </div>
                        </contact-us-form>
                        <div class=" col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe width="100%" height="500" id="gmap_canvas" src="{{$settings['google_map']}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            height: 500px;
                                            width: 100%;
                                        }
                                    </style>
                                    <style>.gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            height: 500px;
                                            width: 100%;
                                        }</style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
