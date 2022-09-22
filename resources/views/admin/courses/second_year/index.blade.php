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
                    <img src="{{asset('images/courses_second_year/'.$course->cover)}}">
                    <h2>01</h2>
                    <h3>الصف الأول الثانوي</h3>
                    <p style="margin-top: 5px">{{$course->name}}</p>
                    <p style="margin-top: 5px">السعر : {{$course->price}}</p>
                    <a href="{{route('edit.course.2nd',$course->id)}}" class="btn btn-primary" >edit course</a>
                    <form action="{{route('delete.course.2nd',$course->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-danger">delete course</button>
                    </form>

                </div>
            </div>
        @endforeach

    </div>
    <div class="spikes"></div>

@endsection
