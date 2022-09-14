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
                <a href="{{route('student.login')}}" class="option-btn">login</a>
                <a href="{{route('student.register')}}" class="option-btn">register</a>
            </div>
        </div>
        <img id="logo-background" src="{{asset('images/splash.png')}}">
        <a href="home.html" class="logo"><img src="{{asset('images/logo.png')}}"></a>
    </section>

</header>


<!-- START BANNER -->
    <section class="section slide1 p-0" id="home">
        <div class="slider-area" id="slider-area">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 image-order">
                    <div class="slider-image imgbox">
                        <img src="{{asset('images/logo.png')}}" alt="image">
                    </div>
                </div>
                <div class="col-12 col-lg-6 text-md-center text-lg-left content">
                    <div class="slider-content heading">
                        <h1 class="main-font text-uppercase"><span class="slider-text px-2">م/علاء الدين</h1>
                        <p class="main-text">
                            منصة
                            <span class="st-span">باشمهندس علاء الدين </span>
                            لشرح منهج الفزياء
                            <span class="nd-span">للثانوية العامة</span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Circle-One -->
            <div class="circle-one">
                 <span data-tootik="About" data-tootik-conf="right dark square shadow">
                    <a href="#about">
                        <span class="animated-circle position-relative"></span>
                    </a>
                 </span>
            </div>
            <!-- Circle-Two -->
            <div class="circle-two">
                 <span data-tootik="Timeline" data-tootik-conf="left dark square shadow">
                    <a href="#timeline">
                        <span class="animated-circle position-relative"></span>
                    </a>
                 </span>
            </div>
            <!-- Circle-Three -->
            <div class="circle-three">
              <span data-tootik="Portfolio" data-tootik-conf="top dark square shadow">
                    <a href="#portfolio">
                        <span class="animated-circle position-relative"></span>
                    </a>
              </span>
            </div>
            <!-- Circle-Four -->
            <div class="circle-four">
                  <span data-tootik="Testimonials" data-tootik-conf="bottom dark square shadow">
                    <a href="#testimonial">
                        <span class="animated-circle position-relative"></span>
                    </a>
                  </span>
            </div>
            <!-- Circle-Five -->
            <div class="circle-five">
                  <span data-tootik="Contact" data-tootik-conf="bottom dark square shadow">
                        <a href="#contact">
                            <span class="animated-circle position-relative"></span>
                        </a>
                  </span>
            </div>
        </div>
    </section>
<!-- END BANNER -->



<div class="card-container">
    <div class="card">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="card-content">
            <img src="{{asset('images/year-1.jpeg')}}">
            <h2>01</h2>
            <h3>الصف الدراسي الأول</h3>
            <p>جميع كورسات الصف الأول الثانوي</p>
            <a href="#">ابدا التعلم</a>
        </div>
    </div>
    <div class="card">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="card-content">
            <img src="{{asset('images/year-2.jpeg')}}">
            <h2>02</h2>
            <h3>الصف الدراسي الثاني</h3>
            <p>جميع كورسات الصف الثاني الثانوي</p>
            <a href="#">ابدا التعلم</a>
        </div>
    </div>
    <div class="card">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="card-content">
            <img src="{{asset('images/year-3.jpeg')}}">
            <h2>03</h2>
            <h3>الصف الدراسي الثالث</h3>
            <p>جميع كورسات الصف الثالث الثانوي</p>
            <a href="#">ابدا التعلم</a>
        </div>
    </div>
</div>



<!-- Start Footer -->
<footer class="footer">
    <div class="container">
        <div class="box">
            <a href="home.html" class="logo"><img src="{{asset('images/logo.png')}}"></a>
            <ul class="social">
                <li>
                    <a href="#" class="facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="youtube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
            </ul>
            <p class="text">
                منصة علاء الدين لشرح منهج الفزياء للثانوية العامة
            </p>
        </div>
        <div class="box">
            <ul class="links">
                <li><a href="home.html">الرئيسية</a></li>
                <li><a href="about.html">من نحن</a></li>
                <li><a href="contact.html">تواصل معنا</a></li>
                <li><a href="courses.html">الكورسات</a></li>
            </ul>
        </div>
        <div class="box">
            <div class="line">
                <i class="fas fa-map-marker-alt fa-fw"></i>
                <div class="info">مصر </div>
            </div>
            <div class="line">
                <i class="far fa-clock fa-fw"></i>
                <div class="info">24/7</div>
            </div>
            <div class="line">
                <i class="fas fa-phone-volume fa-fw"></i>
                <div class="info">
                    <span>+201149596478</span>
                </div>
            </div>
        </div>
        <div class="box footer-gallery">
            <img src="{{asset('images/thumb-9.png')}}" alt="" />
            <img src="{{asset('images/thumb-8.png')}}" alt="" />
            <img src="{{asset('images/thumb-7.png')}}" alt="" />
            <img src="{{asset('images/thumb-6.png')}}" alt="" />
            <img src="{{asset('images/thumb-5.png')}}" alt="" />
            <img src="{{asset('images/thumb-4.png')}}" alt="" />
        </div>
    </div>
    <p class="copyright">Developed By <a href="#" class="fas fa-heart"></a> By Anas , Ahmed</p>
    &copy; copyright @ 2022 | all rights reserved!
</footer>

<!-- scroll top button  -->
<a href="#" class="top">
    <img src="{{asset('images/scroll-top-img.png')}}">
</a>
<!-- End Footer -->

@endsection


