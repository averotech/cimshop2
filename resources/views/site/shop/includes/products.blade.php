<div class="col-lg-9 col-md-8 col-sm-6 col-xs-12" v-if="products.length>0">
    <div class="row p-0 m-0">
        <div v-for="product in products" class="col-lg-4 col-md-6   col-sm-12 col-xs-12 m-p-0 m-0">
            <a :href="`{{route('site.product.index')}}/details/${product.id}`" style="text-decoration: none;">
                <div class="boxProduct">
                    <div class="img" v-if="product.main_image">
                        <img :src="product.main_image.img_url" alt="">
                    </div>
                    <div class="prName">@{{ product.show_name }}</div>
{{--                    <div v-if="product.size" class="prDet d-flex justify-content-between">--}}
{{--                        <span class="detAttr"> Size</span>--}}
{{--                        <span class="detValue"> @{{ product.size }}</span>--}}
{{--                    </div>--}}
                    <div class="prDet d-flex justify-content-between">
                        <span class="detAttr"> Price</span>
                        <span class="detValue Price">
                            <template v-if="product.price_after_discount">
                                 <span class="lastPrice"> $@{{product.price}} </span>
                                $@{{product.price_after_discount}}
                            </template>
                               <template v-else>
                                   $@{{product.price}}
                               </template>
                            </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div v-else class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
    <div class="alert alert-warning" style="text-align:center;">{{ trans('site.no_products') }}</div>
</div>

