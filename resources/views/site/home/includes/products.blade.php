@if(count($products) > 0)
    <div class="container  d-section">
        <div class="row">
            <div class="col-12 p-0 m-0 ">
                <h1 class=" tDefualt Fn-Bd">{{ trans('site.our_product') }}</h1>
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

{{--                        @if($product->size)--}}
{{--                            <div class="prDet d-flex justify-content-between">--}}
{{--                                <span class="detAttr"> Size</span>--}}
{{--                                <span class="detValue"> {{$product->show_size}}</span>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <div class="prDet d-flex justify-content-between">
                            <span class="detAttr"> {{ trans('site.price') }}</span>
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
