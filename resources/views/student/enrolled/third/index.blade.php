@extends('layouts.student')
@section('content')

    <section class="courses">
        <h1 class="heading">الكورسات المشتركة الصف الثالث الثانوي</h1>
        @if(\Session::get('success'))
            <div class="row mr-2 ml-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{\Session::get('success')}}
                </button>
            </div>
        @endif
        <div class="box-container">
            <div class="card-container" id="cards">
                @if(isset($courses) && count($courses) > 0)
                    @foreach($courses as $course)
                        <div class="card">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <div class="card-content">
                                <img src="{{asset('storage/courses_third_year/'.$course['course']->cover)}}">
                                <h2>03</h2>
                                <h3>الصف الثالث الثانوي</h3>
                                <p style="  margin-top: 5px">{{$course['course']->name}}</p>
                                <a href="{{route('view.course.weeks.3rd',$course['course']->id)}}">اذهب للكورس</a>

                            </div>
                        </div>
                    @endforeach
                @else
                    <button class="btn btn-primary">لا توجد اشتراكات حتي الأن</button>
                @endif
            </div>
        </div>
    </section>

@endsection
