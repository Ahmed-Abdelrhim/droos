@extends('layouts.student')
@section('content')
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

@endsection
