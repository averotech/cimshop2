<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-7 col-xs-12">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="logo">
                <div class="infoIco">
                    <i class="fal fa-envelope"></i>{{$settings['email']}}
                </div>
                <div class="infoIco">
                    <i class="fal fa-globe"></i>{{$settings['website']}}
                </div>
                <div class="infoIco">
                    <i class="fal fa-phone"></i>{{$settings['phone']}}
                </div>
                <ul class="social-links d-flex justify-content-start m-0 p-0">
                    @isset($settings['facebook_link'])
                        <li><a href="{{$settings['facebook_link']}}"> <i class="fab fa-facebook"> </i> </a></li>
                    @endisset
                    @isset($settings['instagram_link'])
                        <li><a href="{{$settings['instagram_link']}}"> <i class="fab fa-instagram"> </i> </a></li>
                    @endisset
                    @isset($settings['twitter_link'])
                        <li><a href="{{$settings['twitter_link']}}"> <i class="fab fa-twitter"> </i> </a></li>
                    @endisset
                    @isset($settings['whatsapp_link'])
                        <li><a href="{{$settings['whatsapp_link']}}"> <i class="fab fa-whatsapp"> </i> </a></li>
                    @endisset
                </ul>

                <mailing-list-component :title="'{{ trans('site.join_our_mailing_list') }}'"
                                        :placeholder="'{{ trans('site.enter_your_email_here') }}'"
                                        :button="'{{ trans('site.subscribe_here') }}'"></mailing-list-component>

            </div>
            <div class="col-md-2 col-sm-5 col-xs-12">
                <div class="title">Quick Link</div>
                <ul class="m-0 p-0 links">
                    <li><a href="{{ route('site.index') }}">Home</a></li>
                    <li><a href="{{ route('site.shop.index') }}">Shop</a></li>
                    <li><a href="{{route('site.cart.index')}}">Cart</a></li>
                    <li><a href="{{route('site.faq.index')}}">FAQ</a></li>
                    <li><a href="{{ route('site.about_us.index') }}">Abouts us</a></li>
                    <li><a href="{{ route('site.contact_us.index') }}">Contact us</a></li>
                </ul>
            </div>
            @isset($settings['video_url'])
                <div class="col-md-3 col-sm-12 col-xs-12 ">
                    <div class="title">Video</div>
                    <div class="bgVid">
                        <video width="100%" height="100%" controls>
                            <source src="{{$settings['video_url'] }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            @endisset
            @isset($settings['google_map'])
                <div class="col-md-4 col-sm-12 col-xs-12 ">
                    <div class="title">Our Location</div>
                    <div class="mapLocation">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe height="250" width="100%" id="gmap_canvas" src="{{$settings['google_map']}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>
    <div class="bottomFooter text-center ">
        <span> Copyright  © cimshop [ {{date('Y')}} ] </span>
    </div>
</footer>


