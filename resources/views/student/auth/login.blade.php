@extends('layouts.design')
@section('content')
    <header class="header">
        <section class="flex">

            <div class="icons">
                <div id="menu-bars" class="fas fa-bars"></div>
                <div id="toggle-btn" class="fas fa-sun"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>

            <nav class="navbar">
                <a href="home.html" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a>
                <a href="about.html"><i class="fas fa-question"></i><span>من نحن</span></a>
                <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
                <a href="contact.html"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
            </nav>


            <div class="profile">
                <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">
                <h3 class="name">Welcome</h3>
                <p class="role">studen</p>
                <div class="flex-btn">
                    <a href="{{route('student.register')}}" class="option-btn">login</a>
                    <a href="{{route('student.register')}}" class="option-btn">register</a>
                </div>
            </div>

            <a href="{{route('home')}}" class="logo"><img src="{{asset('images/logo.png')}}"></a>
        </section>

    </header>
    <section class="form-container">

        <form action="{{route('login.student')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @error('email')
            <span class="text-danger" style="font-size: 20px">{{$message}}</span>
            @enderror
            <h3>login now</h3>
            <p>your email <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">

            <p>your password <span>*</span></p>
            <input type="password" name="password" placeholder="enter your password" required maxlength="20" class="box">
            <button type="submit" class="btn">Submit</button>
        </form>

    </section>
@endsection
