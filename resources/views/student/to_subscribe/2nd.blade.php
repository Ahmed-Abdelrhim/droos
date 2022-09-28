@extends('layouts.student')
@section('content')


<section class="courses">

   <h1 class="heading"> لشراء الكورس <span style="font-size: 18px;">قم بتحويل الفلوس بفودافون كاش علي الأرقام: 01025642978</span>  </h1>

    <div class="card-container" id="cards">
        @if(\Session::get('success'))
            <div class="row mr-2 ml-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{\Session::get('success')}}
                </button>
            </div>
        @endif
            <div class="card">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="card-content">
                    <img src="{{asset('images/courses_second_year/'.$course->cover)}}">
                    <h2>02</h2>
                    <h3>الصف الثاني الثانوي</h3>
                    <p style="margin-top: 5px"> شراء {{$course->name}}</p>
                    <p style="margin-top: 5px">السعر : {{$course->price}}</p>
                    <form action="{{route('subscribe.2nd',$course->id)}}" onsubmit="return submitForm(this);">
                        <input type="submit" style="cursor: pointer"/>
                    </form>
                </div>
            </div>
    </div>



</section>



@endsection

