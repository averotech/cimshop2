<div class="col-lg-3 col-md-4 col-sm-6  col-xs-12 searchBoxs">
    <div class="Box">
        <h1 class="title"> Search</h1>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fal fa-search"></i></span>
            <input type="text" v-model="filter.text" class="form-control" placeholder="Seach here" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <button type="button" @click="fetchData" class="btn btn-defualt"> Search </button>
    </div>
    <div class="Box">
        <h1 class="title"> Product</h1>
        <ul class="m-0 p-0 links">
            <li class="active"><a href="javascript:;" @click="onCategory()">All</a></li>
            @foreach($categories as $category)
            <li><a href="javascript:;" @click="onCategory({{$category->id}})">{{$category->show_name}}</a></li>
            @endforeach

        </ul>
    </div>
    <div class="Box">
        <h1 class="title">Price</h1>
{{--        <div class="row">--}}
{{--            <div class="col-sm-12 mt-2 mb-2"><div id="slider-range"></div></div>--}}
{{--        </div>--}}
{{--        <div class=" slider-labels d-flex justify-content-between">--}}
{{--            <div class="  caption"><strong></strong> <span id="slider-range-value1"></span></div>--}}
{{--            <div class="  text-right caption"><strong></strong> <span id="slider-range-value2"></span></div>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-sm-12">
                <el-slider
                    v-model="filter.price"
                    range
                    :max="100000">
                </el-slider>
{{--                <form>--}}
{{--                    <input type="hidden" v-model="filter.price" name="min-value" value="">--}}
{{--                    <input type="hidden" name="max-value" value="">--}}
{{--                </form>--}}
            </div>
        </div>
        <button @click="fetchData" type="button" class=" btn btn-defualt"> Search </button>
    </div>
</div>
{{--<div class="col-md-3 col-12">--}}
{{--    <div class="product-accordion product-accordion-shope">--}}
{{--        <div class="form-card" id="myDIV">--}}
{{--            <div id="accordion" class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card active-accordion wow fadeInUp" data-wow-duration="1.8s">--}}
{{--                        <div class="card-header" id="headingTwo">--}}
{{--                            <h5 class="mb-0">--}}
{{--                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">{{ trans('site.collection') }}</button>--}}
{{--                            </h5>--}}
{{--                        </div>--}}
{{--                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">--}}
{{--                            <div class="card-body dir-collection">--}}
{{--                                <a href="javascript:;" @click="onCategory()" style="color: gray;"><strong>{{ trans('site.all') }}</strong></a><br>--}}
{{--                                @foreach($categories as $category)--}}
{{--                                    <a href="javascript:;" @click="onCategory({{$category->id}})" style="color: gray;"> {{$category->show_name}}</a><br>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card wow fadeInUp" data-wow-duration="2">--}}
{{--                        <div class="card-header" id="headingFour"><h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">{{ trans('site.price') }}</button></h5></div>--}}
{{--                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">--}}
{{--                            <div class="card-body">--}}
{{--                                <p>--}}
{{--                                    <label for="amount">Price range:</label>--}}
{{--                                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">--}}
{{--                                </p>--}}

{{--                                <div id="slider-range" ref="slider_range"></div>--}}
{{--                                <input type="hidden" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">--}}

{{--                                <p>--}}
{{--                                <input type="range" @change="onPrice" v-model="filter.price" min="1" max="10000" value="1" class="slider w-100" id="myRange" /></p>--}}
{{--                                <div class="lable-slider">--}}
{{--                                    <span>$1</span>--}}
{{--                                    <span>$100000</span>--}}
{{--                                </div>--}}
{{--                                <p>{{ trans('site.price') }}: <span id="demo"> $@{{filter.price}}</span></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



