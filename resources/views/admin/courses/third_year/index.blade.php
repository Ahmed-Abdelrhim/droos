@extends('layouts.admin')
@section('content')
<section class="courses">

<h1 class="heading">كورسات الصف الأول الثانوي</h1>

<div class="box-container">
    <div class="card-container" id="cards">
        @foreach($courses as $course)
            <div class="card">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="card-content">
                    <img src="{{asset('images/courses_third_year/'.$course->cover)}}">
                    <h2>03</h2>
                    <h3>الصف الثالث الثانوي</h3>
                    <p style="margin-top: 5px">{{$course->name}}</p>
                    <p style="margin-top: 5px">السعر : {{$course->price}}</p>
                    <a href="{{route('edit.course.3rd',$course->id)}}" class="btn btn-primary" >edit course</a>
                    <form action="{{route('delete.course.3rd',$course->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-danger">delete course</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

   <div class="more-btn">
      <a href="courses.html" class="inline-option-btn">view all courses</a>
   </div>

</section>

@endsection
