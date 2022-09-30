@extends('layouts.student')
@section('content')

    <section class="playlist-details">

        <h2 class="heading">فيديو تعريفي </h2>

        <div class="row">

            <div class="column">
                <div class="thumb">
{{--                    <video src="{{asset('images/vid-1.mp4')}}" controls poster="{{asset('images/post-1-1.png')}}"--}}
{{--                           id="video">--}}
{{--                        --}}
{{--                    </video>--}}

                    <video src="{{asset('images/demo_first_year/'.$demo->demo)}}" controls poster="{{asset('images/post-1-1.png')}}"
                           id="video">
                    </video>

                </div>
            </div>
        </div>

    </section>

    <div class="container-line">
        <div class="upperpart">
            <img src="{{asset('images/pngwing.png')}}">
            <div class="first">
                <div class="linee"></div>
                <div class="balle"></div>
            </div>
            <div class="second">
                <div class="linee"></div>
                <div class="balle"></div>
            </div>
            <div class="third">
                <div class="linee"></div>
                <div class="balle"></div>
            </div>
            <div class="fifth">
                <div class="linee"></div>
                <div class="balle"></div>
            </div>
        </div>
    </div>

    <div class="fas fa-cog nut3"></div>
    <div class="fas fa-cog nut4"></div>

    <div class="features" id="features">
        <div class="container">
            <div class="box quality">
                <div class="img-holder"><img src="{{asset('images/fet-2.svg')}}"></div>
                <h2>Quality</h2>
                <p>شاهد دروسك اكثر من مرة</p>
                <a href="#">More</a>
            </div>
            <div class="box time">
                <div class="img-holder"><img src="{{asset('images/fet-1.svg')}}"></div>
                <h2>Time</h2>
                <p>وفر وقت المواصلات و السنتر</p>
                <a href="#">More</a>
            </div>
            <div class="box passion">
                <div class="img-holder"><img src="{{asset('images/fet-3.svg')}}"></div>
                <h2>Passion</h2>
                <p>احضر امتحانات دورية </p>
                <a href="#">More</a>
            </div>
        </div>
    </div>
    <!-- End Features -->

@endsection


