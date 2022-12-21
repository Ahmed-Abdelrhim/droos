@extends('layouts.admin')
@section('content')
<section class="courses">

<h1 class="heading">كورسات الصف الثاني الثانوي</h1>

<div class="box-container">


    <div class="card-container" id="cards">
        @foreach($courses as $course)
            <div class="card">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="card-content">
                    <img src="{{asset('storage/courses_second_year/'.$course->cover)}}">
                    <h2>02</h2>
                    <h3>الصف الثاني الثانوي</h3>
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

</div>

</section>

@endsection
