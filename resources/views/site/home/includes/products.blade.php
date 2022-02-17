{{--<section id="products" class="mt-5 container">--}}
{{--    <div class="row rm-margin">--}}
{{--        @if(count($products) > 0)--}}
{{--            @foreach($products as $product)--}}
{{--                <div class="div-part-content col-md-3 col-12  wow fadeInUp" data-wow-duration="1.8s">--}}
{{--                    <a href="{{ route('site.product.details',['id' => $product->id]) }}" class="text-right">--}}
{{--                        <img src="{{ $product->mainImage->img_url }}" alt="drug">--}}
{{--                        <h6 class="text-center product-name"> {{ $product->show_name }}</h6>--}}
{{--                        <p class="text-center">${{$product->price}}</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</section>--}}

@if(count($products) > 0)
    <div class="container  d-section">
        <div class="row">
            <div class="col-12 p-0 m-0 ">
                <h1 class=" tDefualt Fn-Bd">Our Product</h1>
            </div>
        </div>
        <div class="row p-0 m-0">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4   col-sm-6 col-xs-12 m-p-0 m-0">

                    <div class="boxProduct">
                        <div class="img"><img src="{{$product->mainImage->img_url}}" alt=""></div>
                        <a href="{{ route('site.product.details',['id' => $product->id]) }}" >
                            <div class="prName">{{ $product->name }}</div>
                        </a>

                        @if($product->size)
                            <div class="prDet d-flex justify-content-between">
                                <span class="detAttr"> Size</span>
                                <span class="detValue"> {{$product->show_size}}</span>
                            </div>
                        @endif
                        <div class="prDet d-flex justify-content-between">
                            <span class="detAttr"> Price</span>
                            <span class="detValue Price">
                            @if($product->price_after_discount)
                                <span class="lastPrice"> ${{$product->price}} </span>
                                ${{$product->price_after_discount}}
                                @else
                                ${{$product->price}}
                            @endif
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
