@extends('site.layouts.app')
@push('page-title',$product->show_name)
@section('content')
    <product-detilas :product="{{ json_encode($product) }}" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="headTitle d-flex justify-content-between">
                        <h1 class=" tDefualt Fn-Bd"><span> {{ trans('site.home') }} </span> /
                            <span> {{ trans('site.shop') }} </span> / <span> {{ $product->show_name }} </span></h1>
                    </div>
                </div>
            </div>
            <div class="row  product-details px-2">
                <div class="col-12 ps-0 boxDefualt">
                    <div class=" p-4 row ">
                        <div class="p-3  px-4 col-lg-5 col-md-7  col-sm-12 col-xs-12">
                            <div class="owl-carousel img-container owl-theme product-carousel">
                                @foreach($product->images as $image)
                                    <div class="imgSliderProduct ">
                                        <img src="{{ $image->img_url }}" alt="title product here">
                                    </div>
                                @endforeach
                            </div>
                            <div class="">
                                <div class="Det Desc">
                                    <h4> {{ trans('site.description') }} </h4>
                                    <p>{{$product->show_description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-3  px-4 col-lg-3 col-md-5  col-sm-12 col-xs-12">
                            <h1> {{$product->name}} </h1>
                            <div class="Det">
                                <h4> {{$product->sku}}: {{ trans('site.SKU') }} </h4>
                            </div>
                            <div class="Det d-flex justify-content-between">
                                <div class="">
                                    @if($product->price_after_discount)
                                        <span class="price mx-4 ms-0">${{$product->price_after_discount}}</span>
                                        <span class="lastPrice">${{$product->price}}</span>
                                    @else
                                        <span class="price mx-4 ms-0">${{$product->price}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="Det">
                                <h4> Size </h4>
                                <div class="btn-group btn-group-sm sizeBox" role="group" aria-label="Basic radio toggle button group">
                                    @foreach($product->sizes as $key=>$size)
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio{{$key}}" autocomplete="off" >
                                    <label class="btn btn-outline-primary" for="btnradio{{$key}}">{{$size->size->name . ' + $'. $size->price}}</label>
                                    @endforeach
{{--                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">--}}
{{--                                    <label class="btn btn-outline-primary" for="btnradio2">XXL</label>--}}
{{--                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">--}}
{{--                                    <label class="btn btn-outline-primary" for="btnradio3">XXXL</label>--}}
                                </div>
                            </div>
                            <div class="Det Amount">
                                <h4> Amount </h4>
                                <div class=" m-0 p-0">
                                    <!--div class="col-2 m-0 p-0"><button class="btn btn-defualt "><i class="fal fa-plus"></i></button></div>
                                    <div class="col-10  p-2"> <input type="text" class="text-center form-control" ></div>

                                    <div class="col-1 m-0 p-0 "><button class="btn btn-primary "><i class="fal fa-dash"></i></button></div-->
                                    <div class="number">
                                        <span class="minus" @click="minusQty">-</span>
                                        <input type="text" id="Quantity" v-model="qty" name="Quantity" value="1" min="1"/>
                                        <span class="plus" @click="plusQty">+</span>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="cartlikeBtn d-flex justify-content-center">--}}
                                <button @click="addToCart" class="btn btn-defualt-outline showCart">{{ trans('site.add_to_cart') }}</button>
{{--                                <button class="btn btn-defualt-outline addFavorate"><i class="fal fa-heart"></i></button>--}}
{{--                            </div>--}}
                            <a href="{{ route('site.cart.index') }}" class="btn btn-defualt">{{ trans('site.buy_now') }}</a>
                        </div>
                        <div class="p-3 px-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{{ trans('site.product_info') }}</button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if(app()->getLocale()==='en')
                                                {{$product->product_info_en}}
                                            @else
                                                {{$product->product_info}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">{{ trans('site.shipping_info') }}</button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if(app()->getLocale()==='en')
                                                {{$product->shipping_info_en}}
                                            @else
                                                {{$product->shipping_info}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">{{ trans('site.refund_return_policy') }}</button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if(app()->getLocale()==='en')
                                                {{$product->refund_and_return_policy_en}}
                                            @else
                                                {{$product->refund_and_return_policy}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row boxDefualt m-1 mt-5">
                <div class="col-lg-12 ps-4 pt-0">
                    <h1 class=" tDefualt Fn-Bd ">{{ trans('site.releated_product') }}</h1>
                </div>
                <div class="col-lg-12 ">
                    <div class=" owl-carousel owl-theme carouselProduct">
                        @if(count($product->similars) > 0)
                            @foreach($product->similars as $product)
                                <div class="boxProduct">
                                    {{--<span class="discount"> 20% off </span>--}}
                                    <div class="img">
                                        <img src="{{ $product->product->mainImage->img_url }}" alt="">
                                    </div>
                                    <div class="prName"><a href="{{ route('site.product.details',['id' => $product->product->id]) }}">{{ $product->product->show_name }}</a></div>
{{--                                    @if($product->size)--}}
{{--                                        <div class="prDet d-flex justify-content-between">--}}
{{--                                            <span class="detAttr">{{ trans('site.size') }}</span>--}}
{{--                                            <span class="detValue"> {{$product->product->show_size}}</span>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                    <div class="prDet d-flex justify-content-between">
                                        <span class="detAttr">{{ trans('site.price') }}</span>
                                        <span class="detValue Price">
                                        @if($product->product->price_after_discount)
                                                <span class="lastPrice"> ${{$product->product->price}} </span>
                                                ${{$product->product->price_after_discount}}
                                            @else
                                                ${{$product->product->price}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </product-detilas>
@endsection
@push('css')

@endpush
@push('js')

@endpush
