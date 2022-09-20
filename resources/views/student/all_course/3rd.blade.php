@extends('layouts.design')
@section('content')
    <div class="card-container" id="cards">
        @foreach($courses as $course)
            <div class="card">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="card-content">
                    <img src="{{asset('images/courses_third_year/'.$course->cover)}}">
                    <h2>01</h2>
                    <h3>الصف الثالث الثانوي</h3>
                    <p style="margin-top: 5px">{{$course->name}}</p>
                    <p style="margin-top: 5px">السعر : {{$course->price}}</p>
                    <a href="#">اشترك الأن</a>
                </div>
            </div>
        @endforeach

    </div>
    <div class="spikes"></div>

@endsection
