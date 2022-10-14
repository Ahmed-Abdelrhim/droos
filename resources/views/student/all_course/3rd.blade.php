@extends('layouts.student')
@section('content')
    <section class="courses">
        <h1 class="heading">كورسات الصف الثالث الثانوي</h1>
        @if(\Session::get('success'))
            <div class="row mr-2 ml-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{\Session::get('success')}}
                </button>
            </div>
        @endif
        <div class="box-container">
            <div class="card-container" id="cards">
                @foreach($courses as $course)
                    <div class="card">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="card-content">
                            <img src="{{asset('storage/images/courses_third_year/'.$course->cover)}}">
                            <h2>03</h2>
                            <h3>الصف الثالث الثانوي</h3>
                            <p style="margin-top: 5px">{{$course->name}}</p>
                            <p style="margin-top: 5px">السعر : {{$course->price}}</p>
                            @if(isset($serials))
                                @if(in_array($course->serial_number,$serials))
                                    <a href="{{route('my.courses.3rd')}}">عرض الكورس</a>
                                @else
                                    <a href="{{route('to.subscribe.3rd',$course->id)}}">اشترك الأن</a>
                                @endif
                            @else
                                <a href="{{route('to.subscribe.3rd',$course->id)}}">اشترك الأن</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
