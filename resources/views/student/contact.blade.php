@extends('layouts.design')
@section('content')
    <header class="header">

        <img id="back-ground" src="{{asset('images/back-ground.png')}}">
        <section class="flex">

            <div class="icons">
                <div id="menu-bars" class="fas fa-bars"></div>
                <div id="toggle-btn" class="fas fa-sun"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>


            <nav class="navbar">
                <a href="{{route('home')}}" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a>
                <a href="{{route('about')}}" class="active"><i class="fas fa-question"></i><span>من نحن</span></a>
                <a href="
                @if(Auth::check())
                @if(Auth::user()->academic_year == 1) {{url('courses/1st/year')}}
                @endif
                @if(Auth::user()->academic_year == 2) {{url('courses/2nd/year')}}
                @endif
                @if(Auth::user()->academic_year == 3) {{url('courses/3rd/year')}}
                @endif
                @else #
                @endif
                " class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
            </nav>


            <div class="profile">
                <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">
                <h3 class="name">Welcome</h3>
                <p class="role">student</p>
                <div class="flex-btn">
                    <a href="{{route('student.login')}}" class="option-btn">login</a>
                    <a href="{{route('student.register')}}" class="option-btn">register</a>
                </div>
            </div>
            <!-- <img id="logo-background" src="{{asset('images/splash.png')}}"> -->
            <a href="{{route('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
        </section>

    </header>
    <section class="contact">

        <div class="row">

            <div class="image">
                <img src="{{asset('images/contact-img.svg')}}" alt="not-found">
            </div>

            <form action="{{route('msg')}}" method="POST">
                {{-- Success Message --}}
                @if (\Session::has('success'))
                    <div class="row mr-2 ml-2">
                        <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                id="type-error">{{\Session::get('success')}}
                        </button>
                    </div>
                @endif

                {{-- Error Message --}}
{{--                @if (\Session::has('errors'))--}}
{{--                    <div class="row mr-2 ml-2">--}}
{{--                        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"--}}
{{--                                id="type-error">{{\Session::get('errors')}}--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                @endif--}}

                @csrf
                <h3>get in touch</h3>
                {{-- <input type="text" placeholder="enter your name" name="name" required maxlength="50" class="box">--}}
                {{-- <input type="email" placeholder="enter your email" name="email" required maxlength="50" class="box">--}}
                {{-- <input type="text" placeholder="enter your number" name="number" required maxlength="50" class="box">--}}
                <textarea name="msg" class="box" placeholder="enter your message" required maxlength="1000" cols="30"
                          rows="10"></textarea>
                @error('msg')
                <span class="text-danger" style="font-size: 20px; color: white">{{$message}}</span>
                @enderror
                <button type="submit" class="inline-btn">send message</button>
            </form>

        </div>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <a href="tel:01152067271">01152067271</a>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email address</h3>
                <a href="mailto:aabdelrhim974@gmail.com">aabdelrhim974@gmail.com</a>
                <a href="mailto:anas.rabea1000@gmail.com">anas.rabea1000@gmail.com</a>
            </div>

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>office address</h3>
                <a href="#">Cairo, Egypt</a>
            </div>

        </div>

    </section>
@endsection
