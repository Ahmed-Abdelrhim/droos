@extends('layouts.design')
@section('content')
<style>

body{
   background-color: var(--light-bg);
   padding-left: 30rem;
}

body.active{
   padding-left: 0;
}


.side-bar{
   position: fixed;
   top: 0; left: 0;
   width: 30rem;
   background-color: var(--white);
   height: 100vh;
   border-right: var(--border);
   z-index: 1200;
}

.side-bar #close-btn{
   text-align: right;
   padding: 2rem;
   display: none;
}

.side-bar #close-btn i{
   text-align: right;
   font-size: 2.5rem;
   background:var(--red);
   border-radius: .5rem;
   color:var(--white);
   cursor: pointer;
   height: 4.5rem;
   width: 4.5rem;
   line-height: 4.5rem;
   text-align: center;
}

.side-bar #close-btn i:hover{
   background-color: var(--black);
}

.side-bar .profile{
   padding:3rem 2rem;
   text-align: center;
}

.side-bar .profile .image{
   height: 10rem;
   width: 10rem;
   border-radius: 50%;
   object-fit: contain;
   margin-bottom: 1rem;
}

.side-bar .profile .name{
   font-size: 2rem;
   color:var(--black);
   overflow: hidden;
   text-overflow: ellipsis;
   white-space: nowrap;
}

.side-bar .profile .role{
   font-size: 1.8rem;
   color: var(--light-color);
}

.side-bar .navbar a{
   display: block;
   padding: 2rem;
   font-size: 2rem;
}

.side-bar .navbar a i{
   margin-right: 1.5rem;
   color:var(--main-color);
   transition: .2s linear;
}

.side-bar .navbar a span{
   color:var(--light-color);
}

.side-bar .navbar a:hover{
   background-color: var(--light-bg);
}

.side-bar .navbar a:hover i{
   margin-right: 2.5rem;
}

.side-bar.active{
   left: -30rem;
}

</style>
<header class="header">

   <section class="flex">
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>
   </section>

</header>


<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">
      <h3 class="name">anas</h3>
      <p class="role">student</p>
      <a href="{{route('teacher.profile')}}" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="home.html"><i class="fas fa-home"></i><span>home</span></a>
      <a href="about.html"><i class="fas fa-question"></i><span>about</span></a>
      <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers.html"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact.html"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>

</div>


<section class="courses">

   <h1 class="heading">our courses</h1>

   <div class="box-container">

      <div class="box">
         <div class="tutor">
            <img src="images/pic-2.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-3.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-2.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete CSS tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-4.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-3.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JS tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-5.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-4.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete Boostrap tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-6.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-5.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JQuery tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-7.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-6.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete SASS tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

   </div>

   <div class="more-btn">
      <a href="courses.html" class="inline-option-btn">view all courses</a>
   </div>

</section>

<script>
    let body = document.body;
    let sideBar = document.querySelector('.side-bar');
    document.querySelector('#menu-btn').onclick = () =>{
        sideBar.classList.toggle('active');
        body.classList.toggle('active');
    }
</script>

@endsection
