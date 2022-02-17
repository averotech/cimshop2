<div class="container">
    <div class="owl-carousel owl-theme owl-carousel-home">
        @foreach($sliders as $slider)
            @if($slider->image)
                <div class="item-carouselk ">
                    <div class="img"><img src="{{$slider->image_url}}"></div>
                    <div class="txt">
                        @if(app()->getLocale()=='en')
                            <div class="titleCarousel">{{$slider->title_en}}</div>
                        @else
                            <div class="titleCarousel">{{$slider->title}}</div>
                        @endif
                        <div class="descCarousel">
                            @if(app()->getLocale()=='en')
                                {{$slider->description_en}}
                            @else
                                {{$slider->description}}
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            @if($slider->video)
                <div class="item-carouselk ">
                    <video width="100%" height="100%" controls>
                        <source src="{{$slider->video_url}}" type="video/mp4">
                    </video>
                </div>
            @endif
        @endforeach
    </div>
</div>
