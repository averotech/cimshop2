<div class="container d-section ">
    <div class="row">
        <div class="col-12 p-0 m-0 ">
            <h1 class=" tDefualt Fn-Bd">Advertise with us</h1>
        </div>
    </div>
    <div class="row">
        @if(count($adverts) > 0)
            <div class="col-lg-4 col-md-4   col-sm-12 col-xs-12 m-p-0 m-0">
                <div class="advsBox d-flex justify-content-center align-items-center">
                    <span>{{$adverts[0]->show_title}}   </span>
                </div>
            </div>
        @endisset
        @isset($adverts[1])

            <div class="col-lg-4 col-md-4   col-sm-12 col-xs-12 m-p-0 m-0">
                <div class="advsBox d-flex justify-content-center align-items-center">
                    <span>{{$adverts[1]->show_title}}</span>
                </div>
            </div>
            </a>
        @endisset
        @isset($adverts[2])
            <div class="col-lg-4 col-md-4   col-sm-12 col-xs-12 m-p-0 m-0">
                <div class="advsBox d-flex justify-content-center align-items-center">
                    <span>{{$adverts[2]->show_title}}</span>
                </div>
            </div>
        @endisset
    </div>
</div>
