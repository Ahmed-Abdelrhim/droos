@extends('layouts.student')
@section('content')

    <section class="playlist-details">

        <div class="row">

            <div class="column">
                <div class="thumb">
                    <img src="{{asset('images/courses_third_year/'.$course->cover)}}" alt="not-found">
                    <span>videos : {{count($course['lectures'])}} </span>
                </div>
            </div>
            <div class="column">

                <div class="details">
                    <h3>{{$course->name}}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum minus reiciendis, error sunt
                        veritatis exercitationem deserunt velit doloribus itaque voluptate.</p>
                </div>
                <div class="tutor">
                    <img src="{{asset('images/courses_third_year/'.$course->cover)}}" alt="not-found">
                    <div class="detales">
                        <span> <i class="fas fa-book"></i> + 299   سؤال </span>
                        <span> <i class="fas fa-clock"></i> + 15   ساعة </span>
                    </div>
                </div>
                <a href="#" class="inline-btn"><i style="margin-left:15px;" class="fa-brands fa-youtube"></i>مشاهدة
                    الفديوهات</a>
            </div>
        </div>
    </section>

    <section class="playlist-details">

        <h2 class="heading">محتوى الكورس</h2>

        {{--First Week--}}

        <div class="select-box">
        <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الاول
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">محتوى الاسبوع الاول</span>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#">
                <i class="fa-solid fa-video"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-book-open"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>ppppppppppp</span></a>

        </div>

        {{--Second Week--}}
        <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الثاني
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
                محتوى الاسبوع الثاني</span>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#">
                <i class="fa-solid fa-video"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-book-open"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>ppppppppppp</span></a>

        </div>

        {{--Third Week--}}
        <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الثالث
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
                محتوى الاسبوع الثالث</span>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#">
                <i class="fa-solid fa-video"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-book-open"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>ppppppppppp</span></a>

        </div>

        {{--Fourth Week--}}
        <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الرابع
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
                محتوى الاسبوع الرابع</span>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#">
                <i class="fa-solid fa-video"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-book-open"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>ppppppppppp</span></a>

            <a href="#">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>ppppppppppp</span></a>

        </div>

            <!-- <div class="options-container">
                @foreach($course['lectures'] as $lec)
                    @if($lec->week == 1)
                        <div class="option">
                            <a href="{{route('view.enrolled.lecture.3rd',$lec->id)}}"><i class="fa-solid fa-video"></i><span>{{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-book"></i><span>واجب : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-book-open"></i><span>حل واجب : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-chalkboard-user"></i><span> كويز : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-chalkboard-user"></i><span> حل كويز : {{$lec->name}}</span></a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="selected"><i class="fa-solid fa-arrows-to-circle"></i>
                الاسبوع الاول
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">محتوى الاسبوع الاول</span>
            </div> -->
        </div>
<!--
        {{--Second Week--}}

        <div class="select-box">
            <div class="options-container">
                @foreach($course['lectures'] as $lec)
                    @if( $lec->week == 2)
                        <div class="option">
                            <a><i class="fa-solid fa-video"></i><span>{{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-book"></i><span>واجب : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-book-open"></i><span>حل واجب : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-chalkboard-user"></i><span> كويز : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-chalkboard-user"></i><span> حل كويز : {{$lec->name}}</span></a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="selected"><i class="fa-solid fa-arrows-to-circle"></i>
                الاسبوع الثاني
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">محتوى الاسبوع الثاني</span>
            </div>
        </div>

        {{--Third Week--}}

        <div class="select-box">
            <div class="options-container">
                @foreach($course['lectures'] as $lec)
                    @if( $lec->week == 3)
                        <div class="option">
                            <a><i class="fa-solid fa-video"></i><span>{{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-book"></i><span>واجب : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-book-open"></i><span>حل واجب : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-chalkboard-user"></i><span> كويز : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-chalkboard-user"></i><span> حل كويز : {{$lec->name}}</span></a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="selected"><i class="fa-solid fa-arrows-to-circle"></i>
                الاسبوع الثالث
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">محتوى الاسبوع الثالث</span>
            </div>
        </div>

        {{--Fourth Week--}}

        <div class="select-box">
            <div class="options-container">
                @foreach($course['lectures'] as $lec)
                    @if($lec->week == 4)
                        <div class="option">
                            <a><i class="fa-solid fa-video"></i><span>{{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-book"></i><span>واجب : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-book-open"></i><span>حل واجب : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-chalkboard-user"></i><span> كويز : {{$lec->name}}</span></a>
                        </div>

                        <div class="option">
                            <a><i class="fa-solid fa-chalkboard-user"></i><span> حل كويز : {{$lec->name}}</span></a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="selected"><i class="fa-solid fa-arrows-to-circle"></i>
                الاسبوع الرابع
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">محتوى الاسبوع ارابع</span>
            </div> -->
        </div>


    </section>
@endsection

@section('script')
    <script>
        var message = "This function has been disabled!";

        ///////////////////////////////////

        function clickIE4() {
            if (event.button == 2) {
                alert(message);
                return false;
            }
        }

        function clickNS4(e) {
            if (document.layers || document.getElementById && !document.all) {
                if (e.which == 2 || e.which == 3) {
                    alert(message);
                    return false;
                }
            }
        }

        if (document.layers) {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = clickNS4;
        } else if (document.all && !document.getElementById) {
            document.onmousedown = clickIE4;
        }

        document.oncontextmenu = new Function("alert(message);return false")

    </script>


@endsection
