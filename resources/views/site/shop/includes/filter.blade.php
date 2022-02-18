<div class="col-lg-3 col-md-4 col-sm-6  col-xs-12 searchBoxs">
    <div class="Box">
        <h1 class="title"> {{ trans('site.search') }}</h1>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fal fa-search"></i></span>
            <input type="text" v-model="filter.text" class="form-control" placeholder="{{ trans('site.search_here') }}" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <button type="button" @click="fetchData" class="btn btn-defualt"> {{ trans('site.search') }} </button>
    </div>
    <div class="Box">
        <h1 class="title"> {{ trans('site.product') }}</h1>
        <ul class="m-0 p-0 links">
            <li class="active"><a href="javascript:;" @click="onCategory()">{{ trans('site.all') }}</a></li>
            @foreach($categories as $category)
            <li><a href="javascript:;" @click="onCategory({{$category->id}})">{{$category->show_name}}</a></li>
            @endforeach

        </ul>
    </div>
    <div class="Box">
        <h1 class="title">{{ trans('site.price') }}</h1>
        <div class="row">
            <div class="col-sm-12">
                <el-slider
                    v-model="filter.price"
                    range
                    :max="100000">
                </el-slider>
            </div>
        </div>
        <button @click="fetchData" type="button" class=" btn btn-defualt"> {{ trans('site.search') }} </button>
    </div>
</div>
