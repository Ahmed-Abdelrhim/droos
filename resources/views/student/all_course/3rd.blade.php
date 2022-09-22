@extends('layouts.design')
@section('content')
    <div class="card-container" id="cards">
        @if(\Session::get('success'))
            <div class="row mr-2 ml-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{\Session::get('success')}}
                </button>
            </div>
        @endif
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
                    @if(isset($serials))
                        @if(in_array($course->serial_number,$serials))
                            <a>عرض الكورس</a>
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
    

@endsection
