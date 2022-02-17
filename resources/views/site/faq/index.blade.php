@extends('site.layouts.app')
@push('page-title',trans('site.faqs'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headTitle d-flex justify-content-between">
                    <h1 class=" tDefualt Fn-Bd"> {{ trans('site.FAQ') }} </h1>
                </div>
            </div>
        </div>

        <div class="row AboutPage ps-3 ">
            <div class="col-12 ps-0">
                <div class="boxDefualt p-4 ">
                    <div class="row pt-3">

                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                @foreach($faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                                {{$faq->show_question}}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>{{$faq->show_answer}}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('css')
    @if(app()->getLocale() == 'ar')
        <style>
            .text-dir {
                text-align: right;
            }
        </style>
    @else
        <style>
            .text-dir {
                text-align: left;
            }
        </style>
    @endif
@endpush
