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
         <a href="about.html" class="active"><i class="fas fa-question"></i><span>من نحن</span></a>
         <a href="courses.html" class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
         <a href="contact.html" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
      </nav>



      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name">Welcome</h3>
         <p class="role">studen</p>
         <div class="flex-btn">
            <a href="login.html" class="option-btn">login</a>
            <a href="register.html" class="option-btn">register</a>
         </div>
      </div>

      <a href="home.html" class="logo"><img src="./images/logo.png"></a>
   </section>

</header>


<section class="playlist-details">

   <h2 class="heading">كورس الشهر الأول 1ث</h2>

   <div class="row">

      <div class="column">
         <div class="thumb">
            <video src="images/vid-1.mp4" controls poster="images/post-1-1.png" id="video"></video>
         </div>
      </div>
      <div class="column">
         <div class="tutor">
            <img src="images/year-2.jpeg" alt="">
            <div class="info">
               <h3>الباب الاول</h3>
               <span>130.00جنيهًا</span>
            </div>
         </div>

         <div class="details">
            <h3>الفزياء الحديثة</h3>
            <p>كورس الباب الأول -  الفزياء الحديثة</p>
            <a href="teacher_profile.html" class="inline-btn">اشترك الآن !</a>
         </div>
      </div>
   </div>

</section>

<section class="playlist-videos">

   <h2 class="heading">playlist videos</h2>

   <div class="box-container">

      <a class="box" href="watch-video.html">
         <i class="fas fa-play"></i>
         <img src="images/post-1-1.png" alt="">
         <h3>complete HTML tutorial (part 01)</h3>
      </a>

      <a class="box" href="watch-video.html">
         <i class="fas fa-play"></i>
         <img src="images/post-1-2.png" alt="">
         <h3>complete HTML tutorial (part 02)</h3>
      </a>

      <a class="box" href="watch-video.html">
         <i class="fas fa-play"></i>
         <img src="images/post-1-3.png" alt="">
         <h3>complete HTML tutorial (part 03)</h3>
      </a>

      <a class="box" href="watch-video.html">
         <i class="fas fa-play"></i>
         <img src="images/post-1-4.png" alt="">
         <h3>complete HTML tutorial (part 04)</h3>
      </a>

      <a class="box" href="watch-video.html">
         <i class="fas fa-play"></i>
         <img src="images/post-1-5.png" alt="">
         <h3>complete HTML tutorial (part 05)</h3>
      </a>

      <a class="box" href="watch-video.html">
         <i class="fas fa-play"></i>
         <img src="images/post-1-6.png" alt="">
         <h3>complete HTML tutorial (part 06)</h3>
      </a>

   </div>

</section>













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
