@extends('layouts.student')
@section('content')
    <section class="playlist-details">
        <div class="row">
            <div class="column">
                <div class="thumb">
                    <img src="{{asset('images/courses_second_year/'.$course->cover)}}" alt="not-found">
                    <span>videos : {{count($course['lectures'])}} </span>
                </div>
            </div>
            <div class="column">
                <div class="details">
                    <h3>{{$course->name}}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum minus reiciendis, error sunt
                        veritatis exercitationem deserunt velit doloribus itaque voluptate.
                    </p>
                </div>
                <div class="tutor">
                    <img src="{{asset('images/courses_second_year/'.$course->cover)}}" alt="not-found">
                    <div class="detales">
                        <span> <i class="fas fa-book"></i> + 299   سؤال </span>
                        <span> <i class="fas fa-clock"></i> + 15   ساعة </span>
                    </div>
                </div>
                <a href="https://www.youtube.com/channel/UCXrIOiXRybTNagbllgISrDQ" class="inline-btn"><i
                        style="margin-left:15px;" class="fa-brands fa-youtube"></i>مشاهدة
                    الفديوهات</a>
            </div>
        </div>
    </section>
    <section class="playlist-details">
        <h2 class="heading"><span>محتوى</span>  الكورس</h2>
        <div class="select-box">
            <!-- first week -->
            <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الاول
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">محتوى الاسبوع الاول</span>
                <i class="fa fa-caret-down arrow"></i>
            </button>
            <div class="dropdown-container">
                @foreach($course['lectures'] as $key => $lec )
                    @if( $lec->week == 1)
                        <a href="{{route('view.enrolled.lecture.2nd',$lec->id)}}">
                            <i class="fa-solid fa-video"></i>
                            <span>{{$lec->name}}</span>
                        </a>
                        <a href="{{route('view.homework.link.2nd',$week1[$key]->id)}}">
                            <i class="fa-solid fa-book-open"></i>
                            <span>واجب : {{$lec->name}}</span></a>

                        <a href="{{route('view.quiz.link.2nd',$week1[$key]->id)}}">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <span> كويز : {{$lec->name}}</span></a>

                    @endif
                @endforeach
            </div>
            <!-- Second Week -->
            <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الثاني
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
      محتوى الاسبوع الثاني</span>
                <i class="fa fa-caret-down arrow"></i>
            </button>
            <div class="dropdown-container">
                @foreach($course['lectures'] as $key => $lec )
                    @if( $lec->week == 2)
                        <a href="{{route('view.enrolled.lecture.2nd',$lec->id)}}">
                            <i class="fa-solid fa-video"></i>
                            <span>{{$lec->name}}</span>
                        </a>
                        <a href="{{route('view.homework.link.2nd',$week2[$key]->id)}}">
                            <i class="fa-solid fa-book-open"></i>
                            <span>واجب : {{$lec->name}}</span></a>

                        <a href="{{route('view.quiz.link.2nd',$week2[$key]->id)}}">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <span> كويز : {{$lec->name}}</span></a>

                    @endif
                @endforeach
            </div>
            <!-- Third Week -->
            <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الثالث
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
      محتوى الاسبوع الثالث</span>
                <i class="fa fa-caret-down arrow"></i>
            </button>
            <div class="dropdown-container">
                @foreach($course['lectures'] as $key => $lec )
                    @if( $lec->week == 3)
                        <a href="{{route('view.enrolled.lecture.2nd',$lec->id)}}">
                            <i class="fa-solid fa-video"></i>
                            <span>{{$lec->name}}</span>
                        </a>
                        <a href="{{route('view.homework.link.2nd',$week3[$key]->id)}}">
                            <i class="fa-solid fa-book-open"></i>
                            <span>واجب : {{$lec->name}}</span></a>

                        <a href="{{route('view.quiz.link.2nd',$week3[$key]->id)}}">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <span> كويز : {{$lec->name}}</span></a>

                    @endif
                @endforeach
            </div>
            <!-- Fourth Week -->
            <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الرابع
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
      محتوى الاسبوع الرابع</span>
                <i class="fa fa-caret-down arrow"></i>
            </button>
            <div class="dropdown-container">
                @foreach($course['lectures'] as $key => $lec )
                    @if( $lec->week == 4)
                        <a href="{{route('view.enrolled.lecture.2nd',$lec->id)}}">
                            <i class="fa-solid fa-video"></i>
                            <span>{{$lec->name}}</span>
                        </a>
                        <a href="{{route('view.homework.link.2nd',$week4[$key]->id)}}">
                            <i class="fa-solid fa-book-open"></i>
                            <span>واجب : {{$lec->name}}</span></a>
{{--                        <a href="#">--}}
{{--                            <i class="fa-solid fa-chalkboard-user"></i>--}}
{{--                            <span>حل واجب : {{$lec->name}}</span></a>--}}
                        <a href="{{route('view.quiz.link.2nd',$week4[$key]->id)}}">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <span> كويز : {{$lec->name}}</span></a>


{{--                        <a href="#">--}}
{{--                            <i class="fa-solid fa-chalkboard-user"></i>--}}
{{--                            <span> حل كويز : {{$lec->name}}</span></a>--}}
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var message = "This function has been disabled!";

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
