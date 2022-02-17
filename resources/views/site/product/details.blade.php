@extends('site.layouts.app')
@push('page-title',$product->show_name)
@section('content')
    <product-detilas :product="{{ json_encode($product) }}" inline-template v-cloak>
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
                                    <h4> Description </h4>
                                    <p>{{$product->show_description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-3  px-4 col-lg-3 col-md-5  col-sm-12 col-xs-12">
                            <h1> {{$product->name}} </h1>
                            <div class="Det">
                                <h4> {{$product->sku}}: SKU </h4>
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
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary" for="btnradio1">XL</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio2">XXL</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio3">XXXL</label>
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
                                <button @click="addToCart" class="btn btn-defualt-outline showCart"> Add to Cart</button>
{{--                                <button class="btn btn-defualt-outline addFavorate"><i class="fal fa-heart"></i></button>--}}
{{--                            </div>--}}
                            <a href="{{ route('site.cart.index') }}" class="btn btn-defualt"> Buy Now</a>
                        </div>
                        <div class="p-3 px-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Product Info</button>
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
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Shipping Info</button>
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
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Refund & Return Policy</button>
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
                    <h1 class=" tDefualt Fn-Bd ">Releated Product</h1>
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
                                    @if($product->size)
                                        <div class="prDet d-flex justify-content-between">
                                            <span class="detAttr"> Size</span>
                                            <span class="detValue"> {{$product->product->show_size}}</span>
                                        </div>
                                    @endif
                                    <div class="prDet d-flex justify-content-between">
                                        <span class="detAttr"> Price</span>
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
    {{--    --}}
    {{--    <product-detilas :product="{{ json_encode($product) }}" inline-template v-cloak>--}}
    {{--        <section id="product" class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-12 product-header">--}}
    {{--                    <p>{{ trans('site.home') }} / {{ trans('site.shop') }}/ {{ $product->show_name }}</p>--}}
    {{--                    <div class="d-flex">--}}
    {{--                        <a href="{{route('site.product.details',[$product->id - 1])}}" class="btn"><i class="fas fa-chevron-{{ app()->getLocale() == 'en' ? 'left' :'right' }}"></i>{{ trans('site.perv') }}</a>|--}}
    {{--                        <a href="{{route('site.product.details',[$product->id + 1])}}" class="btn" >{{ trans('site.next') }}<i class="fas fa-chevron-{{ app()->getLocale() == 'en' ? 'right' :'left' }}"></i></a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6 col-12">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="owl-carousel owl-theme wow fadeInUp" data-wow-duration="1.4s" id="Product-image-carousel">--}}
    {{--                            @foreach($product->images as $image)--}}
    {{--                            <div class="div-part-content p-2 item product-carousel wow fadeInUp" data-wow-duration="1.8s">--}}
    {{--                                <img src="{{ $image->img_url }}" alt="product" class="img-fluid" />--}}
    {{--                            </div>--}}
    {{--                           @endforeach--}}
    {{--    --}}{{--                        <div class="div-part-content item p-2 product-carousel wow fadeInUp" data-wow-duration="1.8s">--}}
    {{--    --}}{{--                            <img src="{{ asset('site/images/product.PNG') }}" alt="product" class="img-fluid" />--}}
    {{--    --}}{{--                        </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <p>{{ $product->show_description }}</p>--}}
    {{--                </div>--}}

    {{--                    <div class="col-md-6 col-12 product-details">--}}
    {{--                        <h1>{{ $product->show_name }}</h1>--}}
    {{--                        <p>{{ $product->sku }} :SKU--}}
    {{--                            <br/>--}}
    {{--                            <br/>--}}
    {{--                            ${{ $product->price }}--}}
    {{--                        </p>--}}
    {{--                        @if(count($product->colors) > 0)--}}
    {{--                            <div class="colors mb-4">--}}
    {{--                                <p class="mb-2">Color</p>--}}
    {{--                                <div class="d-flex">--}}
    {{--                                    @foreach($product->colors as $color)--}}
    {{--                                        <a @click="changeColor({{$color}})" id="color_{{$color->id}}" class="inactive">--}}
    {{--                                            <span class="color1" style="background-color: {{$color->color}}"></span>--}}
    {{--                                        </a>--}}
    {{--                                    @endforeach--}}
    {{--                                </div>--}}

    {{--                            </div>--}}
    {{--                        @endif--}}
    {{--                        <div>--}}
    {{--                            <label for="Quantity"></label>--}}
    {{--                            <input type="number" id="Quantity" v-model="qty" name="Quantity" value="1" min="1" />--}}
    {{--                        </div>--}}
    {{--                        <div class="Cart mt-2">--}}
    {{--                            <button class="btn w-100 mr-1 btn-product" @click="addToCart">{{ trans('site.add_to_cart') }}</button>--}}
    {{--                            --}}{{--                    <button class="btn">--}}
    {{--                            --}}{{--                        <i class="far fa-heart"></i>--}}
    {{--                            --}}{{--                    </button>--}}
    {{--                        </div>--}}
    {{--                        <a href="{{ route('site.cart.index') }}" class="btn w-100 buy-btn" >{{ trans('site.buy_now') }}</a>--}}
    {{--                        @if(count($product->other_infos) > 0)--}}
    {{--                            <div class="product-accordion">--}}
    {{--                                <div class="form-card" id="myDIV">--}}
    {{--                                    <div id="accordion" class="row">--}}
    {{--                                        <div class="col-md-12">--}}
    {{--                                            @foreach($product->other_infos as $info)--}}
    {{--                                                <div class="card wow fadeInUp" data-wow-duration="1.4s">--}}
    {{--                                                    <div class="card-header" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$info->id}}" aria-expanded="false" aria-controls="collapse{{$info->id}}">{{$info->show_title}}</button></h5></div>--}}
    {{--                                                    <div id="collapse{{$info->id}}" class="collapse" aria-labelledby="heading{{$info->id}}" data-parent="#accordion"><div class="card-body"><p>{{ $product->show_description }}</p></div></div>--}}
    {{--                                                </div>--}}
    {{--                                            @endforeach--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        @endif--}}
    {{--                    </div>--}}

    {{--            </div>--}}

    {{--            <div class="modal fade" id="cartModal">--}}
    {{--                <div class="modal-dialog">--}}
    {{--                    <div class="modal-content">--}}
    {{--                        <!-- Modal Header -->--}}
    {{--                        <div class="modal-header">--}}
    {{--                            <button type="button" class="close" data-dismiss="modal">--}}
    {{--                                <i class="fa fa-chevron-right" aria-hidden="true"></i>--}}
    {{--                            </button>--}}

    {{--                            <h4 class="modal-title">{{ trans('site.cart') }} </h4>--}}
    {{--                        </div>--}}
    {{--                        <!-- Modal body -->--}}
    {{--                        <div class="modal-body" v-if="cart.length>0">--}}
    {{--                            <div class="d-flex cart-card py-2" v-for="(row, index) in cart" :key="index">--}}
    {{--                                <div class="cart-img-wrap">--}}
    {{--                                    <img :src="row.img" alt="product">--}}
    {{--                                </div>--}}
    {{--                                <span :style="{ background: row.color }" style="height: 25px;width: 25px;"></span>--}}
    {{--                                <div class="product-desc">--}}
    {{--                                    <h4>@{{row.productName}}</h4>--}}
    {{--                                    <p>$@{{ row.price }}</p>--}}
    {{--                                    <div class="inputPluse">--}}
    {{--                                        <input type="text" v-model="row.qty" disabled>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                        <p class="mt-auto p-3 OpenSans-Bold">--}}
    {{--                            {{ trans('site.subtotal') }}--}}
    {{--                            <br>--}}
    {{--                            $@{{ subtotal }}--}}
    {{--                        </p>--}}
    {{--                        <!-- Modal footer -->--}}
    {{--                        <div class="modal-footer">--}}
    {{--                            <a href="{{route('site.cart.index')}}" class="btn btn-view-cart">{{ trans('site.view_cart') }}</a>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </section>--}}
    {{--    </product-detilas>--}}
    {{--    @if(count($product->similars) > 0)--}}
    {{--        <section id="products" class="mt-5 py-2 container">--}}
    {{--            <h4 class="text-center">{{ trans('site.related_products') }}</h4>--}}
    {{--            <div class="row">--}}
    {{--                <div class="owl-carousel owl-theme wow fadeInUp" data-wow-duration="1.4s" id="Product-carousel">--}}
    {{--                    @foreach($product->similars as $product)--}}
    {{--                        <div class="div-part-content item product-carousel wow fadeInUp" data-wow-duration="1.8s">--}}
    {{--                            <a href="{{ route('site.product.details',['id' => $product->product->id]) }}" class="text-right">--}}
    {{--                                <img src="{{ $product->product->mainImage->img_url }}" alt="drug" />--}}
    {{--                                <h6 class="text-center">{{ $product->product->show_name }}</h6>--}}
    {{--                                <p class="text-center">${{$product->product->price}}</p>--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    {{--    @endif--}}
@endsection
@push('css')

@endpush
@push('js')

@endpush
