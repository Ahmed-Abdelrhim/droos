@extends('layouts.student')
@section('content')
    <section class="playlist-details">
        <div class="row">
            <div class="column">
                <div class="thumb">
                    <img src="{{asset('storage/courses_first_year/'.$course->cover)}}" alt="not-found">
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
                    <img src="{{asset('storage/courses_first_year/'.$course->cover)}}" alt="not-found">
                    <div class="detales">
                        <span> <i class="fas fa-book"></i> + 299   سؤال </span>
                        <span> <i class="fas fa-clock"></i> + 15   ساعة </span>
                    </div>
                </div>
                <a href="https://www.youtube.com" class="inline-btn" target="_blank"><i
                        style="margin-left:15px;" class="fa-brands fa-youtube" ></i>مشاهدة
                    الفديوهات</a>
            </div>
        </div>
    </section>
    <section class="playlist-details">
        <h2 class="heading"><span>محتوى</span> الكورس</h2>
        <div class="select-box">
            <!-- START FIRST WEEK -->
            <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الاول
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">محتوى الاسبوع الاول</span>
                <i class="fa fa-caret-down arrow"></i>
            </button>
            <div class="dropdown-container">
                @if(isset($course['lectures']) && count($course['lectures']) > 0 )
                    @foreach($course['lectures'] as $key => $lec)
                        @if( $lec->week == 1)
                            <a href="{{route('view.enrolled.lecture.1st',$lec->id)}}">
                                <i class="fa-solid fa-video"></i>
                                <span>{{$lec->name}}</span>
                            </a>

                            @if($lec->homework != null)
                                <a href="{{route('view.homework.link.1st',$lec->id)}}">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span>واجب : {{$lec->name}}</span></a>
                            @else
                                <a href="#">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span>لا يوجد واجب حتي الأن</span></a>
                            @endif

                            @if($lec->quiz != null)
                                <a href="{{route('view.quiz.link.1st',$lec->id)}}">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span> كويز : {{$lec->name}}</span></a>
                            @else
                                <a href="#">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span>لا يوجد كويز حتي الأن</span></a>
                            @endif

                        @endif
                    @endforeach
                @else
                    <a href="#">
                        <i class="fa-solid fa-book-open"></i>
                        <span>لايوجد محتوي حتي الأن</span></a>
                @endif
            </div>
            <!-- END FIRST WEEK -->
            <!-- START SECOND WEEK -->
            <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الثاني
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
      محتوى الاسبوع الثاني</span>
                <i class="fa fa-caret-down arrow"></i>
            </button>
            <div class="dropdown-container">
                @if(isset($course['lectures']) && count($course['lectures']) > 0)
                    @foreach($course['lectures'] as $key => $lec)
                        @if( $lec->week == 2)
                            <a href="{{route('view.enrolled.lecture.1st',$lec->id)}}">
                                <i class="fa-solid fa-video"></i>
                                <span>{{$lec->name}}</span>
                            </a>

                            @if($lec->homework != null)
                                <a href="{{route('view.homework.link.1st',$lec->id)}}">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span>واجب : {{$lec->name}}</span></a>
                            @else
                                <a href="#">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span>لا يوجد واجب حتي الأن</span></a>
                            @endif

                            @if($lec->quiz != null)
                                <a href="{{route('view.quiz.link.1st',$lec->id)}}">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span> كويز : {{$lec->name}}</span></a>
                            @else
                                <a href="#">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span>لا يوجد كويز حتي الأن</span></a>
                            @endif

                        @endif
                    @endforeach
                @else
                    <a href="#">
                        <i class="fa-solid fa-book-open"></i>
                        <span>لايوجد محتوي حتي الأن</span></a>
                @endif
            </div>
            <!-- END SECOND WEEK -->
            <!-- START THIRD WEEK -->
            <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الثالث
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
      محتوى الاسبوع الثالث</span>
                <i class="fa fa-caret-down arrow"></i>
            </button>
            <div class="dropdown-container">
                @if(isset($course['lectures']) && count($course['lectures']) > 0)
                    @foreach($course['lectures'] as $key => $lec)
                        @if( $lec->week == 3)
                            <a href="{{route('view.enrolled.lecture.1st',$lec->id)}}">
                                <i class="fa-solid fa-video"></i>
                                <span>{{$lec->name}}</span>
                            </a>


                            @if($lec->homework != null)
                                <a href="{{route('view.homework.link.1st',$lec->id)}}">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span>واجب : {{$lec->name}}</span></a>
                            @else
                                <a href="#">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span>لا يوجد واجب حتي الأن</span></a>
                            @endif

                            @if($lec->quiz != null)
                                <a href="{{route('view.quiz.link.1st',$lec->id)}}">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span> كويز : {{$lec->name}}</span></a>
                            @else
                                <a href="#">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span>لا يوجد كويز حتي الأن</span></a>
                            @endif

                        @endif
                    @endforeach
                @else
                    <a href="#">
                        <i class="fa-solid fa-book-open"></i>
                        <span>لايوجد محتوي حتي الأن</span></a>
                @endif
            </div>
            <!-- END THIRD WEEK -->
            <!-- START Fourth WEEK -->
            <button class="dropdown-btn"><i class="fa-solid fa-arrows-to-circle maine"></i>الاسبوع الرابع
                <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">
      محتوى الاسبوع الرابع</span>
                <i class="fa fa-caret-down arrow"></i>
            </button>
            <div class="dropdown-container">
                @if(isset($course['lectures']) && count($course['lectures']) > 0)
                    @foreach($course['lectures'] as $key => $lec)
                        @if( $lec->week == 4)
                            <a href="{{route('view.enrolled.lecture.1st',$lec->id)}}">
                                <i class="fa-solid fa-video"></i>
                                <span>{{$lec->name}}</span>
                            </a>

                            @if($lec->homework != null)
                                <a href="{{route('view.homework.link.1st',$lec->id)}}">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span>واجب : {{$lec->name}}</span></a>
                            @else
                                <a href="#">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span>لا يوجد واجب حتي الأن</span></a>
                            @endif

                            @if($lec->quiz != null)
                                <a href="{{route('view.quiz.link.1st',$lec->id)}}">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span> كويز : {{$lec->name}}</span></a>
                            @else
                                <a href="#">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span>لا يوجد كويز حتي الأن</span></a>
                            @endif
                        @endif
                    @endforeach
                @else
                    <a href="#">
                        <i class="fa-solid fa-book-open"></i>
                        <span>لايوجد محتوي حتي الأن</span></a>
                @endif
            </div>
            <!-- END Fourth WEEK -->

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



{{--                        <a href="#">--}}
{{--                            <i class="fa-solid fa-chalkboard-user"></i>--}}
{{--                            <span>حل واجب : {{$lec->name}}</span></a>--}}

{{-- <a href="#">--}}
{{-- <i class="fa-solid fa-chalkboard-user"></i>--}}
{{-- <span> حل كويز : {{$lec->name}}</span></a>--}}
