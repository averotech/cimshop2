@extends('site.layouts.app')
@push('page-title',trans('site.shop'))
@section('content')
    <products-search :text="`{{ request('text-search') }}`" inline-template >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="headTitle d-flex justify-content-between flex-wrap" style="min-height:55px ;height:auto !important">
                        <h1 class=" tDefualt Fn-Bd">{{ trans('site.my_shop') }}</h1>
                        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-10">
                            <div class="input-group  ">
                                <label class="input-group-text  " for="inputGroupSelect01">{{ trans('site.store_by') }}:</label>
                                <select v-model="sort" @change="onSort" class="form-select" id="inputGroupSelect01">
                                    <option value="" disabled selected>{{ trans('site.store_by') }}</option>
                                    <option value="asc_price">{{ trans('site.az_based_on_price') }}</option>
                                    <option value="desc_price">{{trans('site.za_based_on_price')}}</option>
                                    <option value="asc_date">{{ trans('site.az_based_on_date') }}</option>
                                    <option value="desc_date">{{trans('site.za_based_on_date')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('site.shop.includes.filter')
                @include('site.shop.includes.products')
            </div>
        </div>
    </products-search>
@endsection
@push('css')
    <style>
        .el-slider__bar {
            background-color: #8cc63f!important;
        }
        .el-slider__button{
            border: 2px solid #8cc63f!important;
            background-color: #8cc63f!important;
        }
    </style>
@endpush
@push('_js')
@endpush
