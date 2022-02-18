@extends('site.layouts.app')
@push('page-title',trans('site.cart'))
@section('content')
    <cart-index inline-template v-cloak>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="headTitle d-flex justify-content-between">
                        <h1 class="tDefualt Fn-Bd"> {{ trans('site.cart') }} </h1>
                    </div>
                </div>
            </div>
{{--            <div v-if="cart.length<=0"  class="alert alert-success alert-dismissible">--}}
{{--                <strong></strong> {{ trans('site.please_chose_product') }}--}}
{{--            </div>--}}
            <div class="row CartPage ps-3 ">
                <div class="col-12 ps-0" >
                    <div class="boxDefualt p-4 ">
                        <div class="row bg-light p-3" >
                            <div class="col-lg-5 d-sm-none d-none d-md-block   ">
                                <div class="head">{{ trans('site.product') }}</div>
                            </div>
                            <div class="col-lg-3 d-sm-none d-none d-md-block   ">
                                <div class="head">{{ trans('site.amount') }}</div>
                            </div>
                            <div class="col-lg-2 d-sm-none d-none d-md-block   ">
                                <div class="head">{{ trans('site.price') }}</div>
                            </div>
                            <div class="col-lg-2 d-sm-none d-none d-md-block   ">
                                <div class="head">{{ trans('site.option') }}</div>
                            </div>
                        </div>
                        <div class="row prodDetails pt-3" v-for="(row, index) in cart" :key="index">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 d-flex align-items-center  pt-2">
                                <div class="productInCart d-flex justify-content-start flex-wrap">
                                    <div class="imgPrd">
                                        <img :src="row.img">
                                    </div>
                                    <div class="brife">
                                        <h3 >@{{row.productName}}</h3>
                                        @if(app()->getLocale()==='en')
                                            <p>@{{ row.description_en }} </p>
                                        @else
                                            <p>@{{ row.description }} </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  d-flex align-items-center pt-2">
                                <div class="number">
                                    <button type="button" @click="decrement(index)" class=" btn-minus"><i class="fa fa-minus"></i></button>
{{--                                    <span class="minus"></span>--}}
                                    <input type="text" v-model="row.qty" value="1"/>
{{--                                    <span class="plus">+</span>--}}
                                    <button type="button"  @click="increment(index)" class="btn-plus"><i class="fa fa-plus"></i></button>

                                </div>
                            </div>
                            <div class="col-lg-2  col-md-2 col-sm-12 col-xs-12  d-flex align-items-center  pt-2">
                                <h2 class="pricePrd"> $@{{ row.price }}</h2>
                            </div>
                            <div class="col-lg-2  col-md-2 col-sm-12 col-xs-12  d-flex align-items-center  pt-2">
                                <button @click="deleteProduct(index)" class="btn btn-defualt-outline">{{ trans('site.remove') }}</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="subscribe">
                                    <div class="title">{{ trans('site.enter_a_promo_code') }}</div>
                                    <div class="input-group mb-3">
                                        <input type="text"  v-model="coupon" class="form-control" placeholder="Promo Code" aria-label="Promo Code" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button :disabled="form.disabledButton" @click="applyCoupon" class="btn" type="button">{{ trans('site.get_coupon') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row add-note" v-if="cart.length>0">
                            <div class="col-12">
                                <h1> {{ trans('site.add_note') }}: </h1>
                                <textarea v-model="note" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row add-note">
                            <div class="col-12">
                                <div class="totalPrice d-flex justify-content-between align-items-center">
                                    <h1 class="">{{ trans('site.total_price') }} </h1>
                                    <h2 class="">$@{{ totalPrice }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-3  col-sm-12 col-xs-12">
                                <a class=" btn btn-defualt-outline" href="{{route('site.shop.index')}}">{{ trans('site.back_to_shop') }}</a>
                            </div>
                            <div class="col-md-3  col-sm-12 col-xs-12">
                                <button @click="checkout" class=" btn btn-defualt" type="button">{{ trans('site.check_out') }}</button>
                            </div>
                        </div>
                    {{--data-bs-toggle="modal" data-bs-target="#CheckOut"--}}
                    </div>
                </div>
            </div>

            <div class="modal fade" id="paymentModal" v-if="cart.length>0"tabindex="-1" aria-labelledby="CheckOutLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="CheckOutLabel">{{ trans('site.check_put') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label ">{{ trans('site.name') }}</label>
                                <input type="text" v-model="name" required class="form-control" id="exampleFormControlInput1" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">{{ trans('site.email_address') }}</label>
                                <input type="email" v-model="email" required class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">{{ trans('site.phone') }}</label>
                                <input type="tel" v-model="phone" required class="form-control" id="exampleFormControlInput1" placeholder="Phone">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">{{ trans('site.address') }}</label>
                                <input type="text" v-model="address" required class="form-control" id="exampleFormControlInput1" placeholder="Your Adress">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" @click="submitCheckOut" :disabled="form.disabledButton" class="btn btn-defualt">{{ trans('site.check_out') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </cart-index>

@endsection
@push('css')
    <style>

    </style>
@endpush
