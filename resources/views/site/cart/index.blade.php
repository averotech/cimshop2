@extends('site.layouts.app')
@push('page-title',trans('site.cart'))
@section('content')
    <cart-index inline-template v-cloak>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="headTitle d-flex justify-content-between">
                        <h1 class="tDefualt Fn-Bd"> Cart </h1>
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
                                <div class="head">Product</div>
                            </div>
                            <div class="col-lg-3 d-sm-none d-none d-md-block   ">
                                <div class="head">Amount</div>
                            </div>
                            <div class="col-lg-2 d-sm-none d-none d-md-block   ">
                                <div class="head">Price</div>
                            </div>
                            <div class="col-lg-2 d-sm-none d-none d-md-block   ">
                                <div class="head">Option</div>
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
                                <button @click="deleteProduct(index)" class="btn btn-defualt-outline"> Remove</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="subscribe">
                                    <div class="title">Enter A Promo Code </div>
                                    <div class="input-group mb-3">
                                        <input type="text"  v-model="coupon" class="form-control" placeholder="Promo Code" aria-label="Promo Code" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button :disabled="form.disabledButton" @click="applyCoupon" class="btn" type="button">Get Coupon</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row add-note" v-if="cart.length>0">
                            <div class="col-12">
                                <h1> Add Note: </h1>
                                <textarea v-model="note" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row add-note">
                            <div class="col-12">
                                <div class="totalPrice d-flex justify-content-between align-items-center">
                                    <h1 class="">Total Price </h1>
                                    <h2 class="">$@{{ totalPrice }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-3  col-sm-12 col-xs-12">
                                <a class=" btn btn-defualt-outline" href="{{route('site.shop.index')}}"> Back To Shop</a>
                            </div>
                            <div class="col-md-3  col-sm-12 col-xs-12">
                                <button @click="checkout" class=" btn btn-defualt" type="button"> Check Out</button>
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
                            <h5 class="modal-title" id="CheckOutLabel">Check put</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label ">Name</label>
                                <input type="text" v-model="name" required class="form-control" id="exampleFormControlInput1" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" v-model="email" required class="form-control" id="exampleFormControlInput1"
                                       placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                <input type="tel" v-model="phone" required class="form-control" id="exampleFormControlInput1" placeholder="Phone">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input type="text" v-model="address" required class="form-control" id="exampleFormControlInput1" placeholder="Your Adress">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" @click="submitCheckOut" :disabled="form.disabledButton" class="btn btn-defualt">Check Out</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </cart-index>

{{--    <section id="view-cart" class="container">--}}
{{--        <div v-if="cart.length<=0"  class="alert alert-success alert-dismissible">--}}
{{--            <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--            <strong></strong> {{ trans('site.please_chose_product') }}--}}
{{--        </div>--}}
{{--        <div class="row" v-if="cart.length>0">--}}
{{--            <div class="col-12 ">--}}
{{--                <h1>{{ trans('site.my_cart') }}</h1>--}}
{{--                <div class="toast show" data-autohide="false">--}}
{{--                    <div class="cart-row" v-for="(row, index) in cart" :key="index">--}}
{{--                        <div class="cart-card">--}}
{{--                            <div class="cart-img-wrap">--}}
{{--                                <img :src="row.img" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : ''}}">--}}
{{--                                <h4>@{{row.productName}}</h4>--}}
{{--                                <p>$@{{ row.price }}</p>--}}
{{--                                <div class="inputPluse">--}}
{{--                                    <button type="button" @click="decrement(index)" class=" btn-minus"><i class="fa fa-minus"></i></button>--}}
{{--                                    <input type="text" v-model="row.qty" value="1" disabled>--}}
{{--                                    <button type="button"  @click="increment(index)" class="btn-plus"><i class="fa fa-plus"></i></button>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <p>$@{{ row.subtotal }}--}}
{{--                            <button type="button" @click="deleteProduct(index)" class="ml-4 mb-1 close" data-dismiss="toast">&times;</button></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <form action="" v-if="cart.length>0&&discount<=0">--}}
{{--            <label for="promo"><i class="fas fa-tag"></i>{{ trans('site.enter_promo_code') }}</label>--}}
{{--            <div>--}}
{{--                <input type="text" id="promo" v-model="coupon" class="w-100" placeholder="{{ trans('site.enter_promo_code') }}">--}}
{{--                <input type="button" :disabled="form.disabledButton" @click="applyCoupon" value="{{ trans('site.apply') }}" class="btn-aplly">--}}
{{--            </div>--}}
{{--            <span class="error" v-if="form.validation&&form.validation.code">@{{ form.validation.code[0] }}</span>--}}
{{--        </form>--}}
{{--        <form action="" class="note-form" v-if="cart.length>0">--}}
{{--            <label for="note"><i class="far fa-clipboard"></i> {{ trans('site.add_a_note') }}</label>--}}
{{--            <textarea name="" id="" cols="30" rows="3" placeholder="{{ trans('site.write_note') }}"></textarea>--}}
{{--        </form>--}}
{{--        <div class="total-table" v-if="cart.length>0">--}}
{{--            <div>--}}
{{--                <p>{{ trans('site.subtotal') }}</p>--}}
{{--                <p>$@{{ subtotal }}</p>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <p>{{ trans('site.shipping') }}</p>--}}
{{--                <p>{{ trans('site.free') }}</p>--}}
{{--            </div>--}}

{{--            <div v-if="discount>0">--}}
{{--                <p>{{ trans('site.discount') }}</p>--}}
{{--                <p>%@{{ discount }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="total" v-if="cart.length>0">--}}
{{--            <div>--}}
{{--                <p>{{ trans('site.total') }}</p>--}}
{{--                <p>$@{{ totalPrice }}</p>--}}
{{--            </div>--}}
{{--            <button type="button" class="btn btn-checkout" @click="checkout"><i class="fas fa-lock px-1" ></i>{{ trans('site.checkout') }}</button>--}}
{{--        </div>--}}

{{--        <div class="modal fade" id="paymentModal" v-if="cart.length>0">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <!-- Modal Header -->--}}
{{--                    <div class="modal-header">--}}
{{--                        {{ trans('site.checkout') }}--}}
{{--                        <button type="button" class="close" data-dismiss="modal">&times;</button></div>--}}

{{--                    <!-- Modal body -->--}}
{{--                    <div class="modal-body">--}}
{{--                        <form style="display: flex; flex-direction: column">--}}
{{--                            <label for="name">Name</label>--}}
{{--                            <input type="text" id="name" v-model="name" required/>--}}
{{--                            <label for="email">Email</label>--}}
{{--                            <input type="email" id="email" v-model="email" required/>--}}
{{--                            <label for="phone">Phone</label>--}}
{{--                            <input type="text" id="phone" v-model="phone" required/>--}}
{{--                            <label for="address">Address</label>--}}
{{--                            <input type="text" id="address" v-model="address" required/>--}}
{{--                            <label for="note">note</label>--}}
{{--                            <input type="text" id="note" v-model="note" />--}}
{{--                            <button type="button" class="btn btn-final mt-3 w-100" @click="submitCheckOut" :disabled="form.disabledButton">{{ trans('site.submit') }}</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <!-- Modal footer -->--}}
{{--                    <div class="modal-footer"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection
@push('css')
    <style>

    </style>
@endpush
