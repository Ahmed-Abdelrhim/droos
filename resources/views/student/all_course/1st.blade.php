@extends('layouts.student')
@section('content')



<section class="courses">
<h1 class="heading">كورسات الصف الأول الثانوي</h1>
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
                    <img src="{{asset('storage/courses_first_year/'.$course->cover)}}">
                    <h2>01</h2>
                    <h3>الصف الأول الثانوي</h3>
                    <p style="margin-top: 5px">{{$course->name}}</p>
                    @if($course->discount != null)
                        <p style="margin-top: 5px">خصم : {{$course->discount}}% </p>
                    @endif
                    <p style="margin-top: 5px">السعر : {{$course->price}}</p>
                    @if(isset($serials) && count($serials) > 0)
                        @if(in_array($course->serial_number,$serials))
                            <a > عرض الكورس</a>
                        @else
                            <a href="{{route('to.subscribe.1st',$course->id)}}">اشترك الأن</a>
                        @endif
                    @else
                        <a href="{{route('to.subscribe.1st',$course->id)}}">اشترك الأن</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>



</section>

@endsection
