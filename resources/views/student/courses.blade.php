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
                <a href="login.html" class="option-btn">login</a>
                <a href="register.html" class="option-btn">register</a>
            </div>
        </div>

        <a href="home.html" class="logo"><img src="{{asset('images/logo.png')}}"></a>
    </section>

</header>




<section class="courses">

    <h2 class="heading">our courses</h2>

    <div class="box-container">

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-2.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-1.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete HTML tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-3.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-2.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete CSS tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-4.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-3.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete JS tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-5.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-4.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete Boostrap tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-6.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-5.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete JQuery tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-7.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-6.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete SASS tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-8.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-7.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete PHP tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-9.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-8.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete MySQL tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

        <div class="box">
            <div class="tutor">
                <img src="{{asset('images/pic-1.jpg')}}" alt="">
                <div class="info">
                    <h3>john deo</h3>
                    <span>21-10-2022</span>
                </div>
            </div>
            <div class="thumb">
                <img src="{{asset('images/thumb-9.png')}}" alt="">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete react tutorial</h3>
            <a href="playlist.html" class="inline-btn">view playlist</a>
        </div>

    </div>
</section>

<footer class="footer">
    &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!
</footer>

@endsection
