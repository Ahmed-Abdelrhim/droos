@extends('layouts.student')
@section('content')
<section class="courses">
   <h1 class="heading">شراء الكورس </h1>
    <h1 class="heading"> لشراء الكورس <span style="font-size: 18px;">قم بتحويل الفلوس بفودافون كاش علي الأرقام: 01025642978</span>  </h1>

    @if(Session::get('success'))
        <div class="row mr-2 ml-2">
            <button class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
        </div>
    @endif


    <div class="card-container" id="cards">

            <div class="card">

                <div class="card-content">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <img src="{{asset('storage/courses_third_year/'.$course->cover)}}" alt="">
                    <h2>03</h2>
                    <h3>الصف الثالث الثانوي</h3>
                    <p style="margin-top: 5px"> شراء {{$course->name}}</p>
                    @if($course->discount != null)
                        <p style="margin-top: 5px">خصم : {{$course->discount}}%</p>
                    @endif
                    <p style="margin-top: 5px">السعر : {{$course->price}}</p>
                    @livewire('subscribe-third-year', ['course_id' => $course->id , 'course' => $course])


                </div>
            </div>
    </div>



</section>



@endsection

