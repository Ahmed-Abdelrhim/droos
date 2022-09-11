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


    <section class="playlist-details">

        <h1 class="heading">playlist details</h1>

        <div class="row">

            <div class="column">
                <form action="" method="post" class="save-playlist">
                    <button type="submit"><i class="far fa-bookmark"></i> <span>save playlist</span></button>
                </form>

                <div class="thumb">
                    <img src="{{asset('images/thumb-1.png')}}" alt="">
                    <span>10 videos</span>
                </div>
            </div>
            <div class="column">
                <div class="tutor">
                    <img src="{{asset('images/pic-2.jpg')}}" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>21-10-2022</span>
                    </div>
                </div>

                <div class="details">
                    <h3>complete HTML tutorial</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum minus reiciendis, error sunt veritatis exercitationem deserunt velit doloribus itaque voluptate.</p>
                    <a href="teacher_profile.html" class="inline-btn">view profile</a>
                </div>
            </div>
        </div>

    </section>

    <section class="playlist-videos">

        <h1 class="heading">playlist videos</h1>

        <div class="box-container">

            <a class="box" href="watch-video.html">
                <i class="fas fa-play"></i>
                <img src="{{asset('images/post-1-1.png')}}" alt="">
                <h3>complete HTML tutorial (part 01)</h3>
            </a>

            <a class="box" href="watch-video.html">
                <i class="fas fa-play"></i>
                <img src="{{asset('images/post-1-2.png')}}" alt="">
                <h3>complete HTML tutorial (part 02)</h3>
            </a>

            <a class="box" href="watch-video.html">
                <i class="fas fa-play"></i>
                <img src="{{asset('images/post-1-3.png')}}" alt="">
                <h3>complete HTML tutorial (part 03)</h3>
            </a>

            <a class="box" href="watch-video.html">
                <i class="fas fa-play"></i>
                <img src="{{asset('images/post-1-4.png')}}" alt="">
                <h3>complete HTML tutorial (part 04)</h3>
            </a>

            <a class="box" href="watch-video.html">
                <i class="fas fa-play"></i>
                <img src="{{asset('images/post-1-5.png')}}" alt="">
                <h3>complete HTML tutorial (part 05)</h3>
            </a>

            <a class="box" href="watch-video.html">
                <i class="fas fa-play"></i>
                <img src="{{asset('images/post-1-6.png')}}" alt="">
                <h3>complete HTML tutorial (part 06)</h3>
            </a>

        </div>

    </section>













    <footer class="footer">

        &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!

    </footer>



@endsection
