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
            <a href="{{asset('home')}}" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a>
            <a href="{{asset('about')}}" class="active"><i class="fas fa-question"></i><span>من نحن</span></a>
            <a href="{{asset('courses')}}" class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
            <a href="{{asset('contact')}}" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
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
        <a href="{{asset('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
    </section>

</header>

<h2 class="main-title">الصفوف الدراسية</h2>
<div class="card-container" id="cards">
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
<div class="spikes"></div>










<!-- Start Footer -->
<footer class="footer">
   <div class="container">
      <div class="box">
         <a href="home.html" class="logo"><img src="images/logo.png"></a>
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
         <img src="images/thumb-9.png" alt="" />
         <img src="images/thumb-8.png" alt="" />
         <img src="images/thumb-7.png" alt="" />
         <img src="images/thumb-6.png" alt="" />
         <img src="images/thumb-5.png" alt="" />
         <img src="images/thumb-4.png" alt="" />
      </div>
   </div>
   <p class="copyright">Developed By <a href="#" class="fas fa-heart"></a> By Anas , Ahmed</p>
   &copy; copyright @ 2022 | all rights reserved!
</footer>

<!-- scroll top button  -->
<a href="#" class="top">
   <img src="images/scroll-top-img.png">
</a>
<!-- End Footer -->

@endsection
