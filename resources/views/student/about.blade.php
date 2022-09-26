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



<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut dolorum quasi illo? Distinctio expedita commodi, nemo a quam error repellendus sint, fugiat quis numquam eum eveniet sequi aspernatur quaerat tenetur.</p>
         <a href="courses.html" class="inline-btn">our courses</a>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+10k</h3>
            <p>online courses</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+40k</h3>
            <p>brilliant students</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+2k</h3>
            <p>expert tutors</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <p>job placement</p>
         </div>
      </div>

   </div>

</section>






<!-- Start Footer -->
<footer class="footer">
    <div class="container">
        <div class="box">
            <a href="{{route('home')}}" class="logo"><img src="{{asset('images/logo.png')}}"></a>
            <ul class="social">
                <li>
                    <a href="https://web.facebook.com/profile.php?id=100009262544420" class="facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="https://web.facebook.com/profile.php?id=100009262544420" class="twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://web.facebook.com/profile.php?id=100009262544420" class="youtube">
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
                <li><a href="{{route('home')}}">الرئيسية</a></li>
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
                <div class="info">+201149596478</div>
            </div>
        </div>
        <div class="box footer-gallery">
            <img src="{{asset('images/thumb-9.png')}}" alt="" />
            <img src="{{asset('images/thumb-8.png')}}" alt="" />
            <img src="{{asset('images/year-2.jpeg')}}" alt="" />
            <img src="{{asset('images/ph-1.jpg')}}" alt="" />
            <img src="{{asset('images/thumb-5.png')}}" alt="" />
            <img src="{{asset('images/thumb-4.png')}}" alt="" />
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
