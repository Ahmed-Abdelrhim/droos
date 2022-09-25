@extends('layouts.design')
@section('content')
<style>

body{
   background-color: var(--light-bg);
   padding-right: 30rem;
}

body.active{
   padding-right: 0;
}


.side-bar{
   position: fixed;
   top: 0; right: 0;
   width: 30rem;
   background-color: var(--white);
   height: 100vh;
   border-right: var(--border);
   z-index: 1200;
   transition: .2s linear;
}

.side-bar #close-btn{
   text-align: left;
   padding: 2rem;
   display: none;
}

.side-bar #close-btn i{
   text-align: left;
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
   margin-left: 1.5rem;
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
   right: -30rem;
}


.side-bar #close-btn{
   text-align: left;
   padding: 2rem;
   display: none;
}

.side-bar #close-btn i{
   text-align: left;
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


.tutor {
    font-size: 1.8rem;
    color: var(--light-color);
    display:flex;
}

.tutor img {
    height: 5rem;
    width: 5rem;
    border-radius: 50%;
    object-fit: cover;
}

.tutor h3 {
    font-size: 1.8rem;
    color: var(--black);
    margin-bottom: .2rem;
}

.tutor span {
    font-size: 1.3rem;
    color: var(--light-color);
}

.logo img {
    height: 8rem;
    width: 15rem;
}

.thumb #video {
    width: 100%;
    height:500px;
    border-radius: 5px;
}

@media (max-width: 767px){
    .thumb #video {
        width: 100%;
    }
}

@media (max-width:1200px){

   body{
      padding-right: 0;
   }

   .side-bar{
      right: -30rem;
      transition: .2s linear;
   }

   .side-bar #close-btn{
      display: block;
   }

   .side-bar.active{
      right: 0;
      box-shadow: 0 0 0 100vw rgba(0,0,0,.8);
      border-right: 0;
   }

}
</style>
<header class="header">
    <!-- <img id="back-ground" src="{{asset('images/back-ground.png')}}"> -->
    <section class="flex">
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="toggle-btn" class="fas fa-sun"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>
            <div class="profile">
                <img src="{{asset('images//pic-6.jpg')}}" alt="tutor">
                <h3 class="name"> {{Auth::user()->name}}</h3>
                <p class="role">student</p>
                <form method="POST" action="{{route('student.logout')}}">
                    @csrf
                    <button class="btn" type="submit">log out</button>
                </form>
            </div>
            <div class="tutor">
                <div class="info">
                    <span>Welcome</span>
                    <h3>{{Auth::user()->name}}</h3>
                </div>
                <img src="{{asset('images/studentImages/'.Auth::user()->avatar)}}" alt="tutor">
            </div>
    </section>
</header>


<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="logo">
      <a href="{{asset('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
   </div>

   <nav class="navbar">
      <a href="home.html"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
      <a href="{{route('courses.1st.students')}}"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
      <a href="teachers.html"><i class="fas fa-chalkboard-user"></i><span>المميزات</span></a>
      <a href="contact.html"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
      <a href="about.html"><i class="fas fa-question"></i><span>من نحن</span></a>
    </nav>

</div>

<section class="playlist-details">

   <h2 class="heading">فديو تعريفي </h2>

   <div class="row">

      <div class="column">
         <div class="thumb">
            <video src="{{asset('images/vid-1.mp4')}}" controls poster="{{asset('images/post-1-1.png')}}" id="video"></video>
         </div>
      </div>
   </div>

</section>


    <div class="features" id="features">
      <div class="container">
            <a href="{{asset('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
      </div>
    </div>
    <!-- End Features -->

    <div class="features" id="features">
      <div class="container">
        <div class="box quality">
          <div class="img-holder"><img src="{{asset('images/fet-2.svg')}}"></div>
          <h2>Quality</h2>
          <p>شاهد دروسك اكثر من مرة</p>
          <a href="#">More</a>
        </div>
        <div class="box time">
          <div class="img-holder"><img src="{{asset('images/fet-1.svg')}}"></div>
          <h2>Time</h2>
          <p>وفر وقت المواصلات و السنتر</p>
          <a href="#">More</a>
        </div>
        <div class="box passion">
          <div class="img-holder"><img src="{{asset('images/fet-3.svg')}}"></div>
          <h2>Passion</h2>
          <p>احضر امتحانات دورية </p>
          <a href="#">More</a>
        </div>
      </div>
    </div>
    <!-- End Features -->



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
<script>
let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () =>{
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enableDarkMode();
}

toggleBtn.onclick = (e) =>{
   darkMode = localStorage.getItem('dark-mode');
   if(darkMode === 'disabled'){
      enableDarkMode();
   }else{
      disableDarkMode();
   }
}
let sideBar = document.querySelector('.side-bar');
document.querySelector('#menu-btn').onclick = () =>{
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
}

document.querySelector('#close-btn').onclick = () =>{
   sideBar.classList.remove('active');
   body.classList.remove('active');
}


let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');
    search.classList.remove('active');
}
window.onscroll = () =>{
    profile.classList.remove('active');
   if(window.innerWidth < 1200){
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}

// scroll to top
let up = document.querySelector(".top");

window.onscroll = function () {
    console.log(window.scrollY);
    if (window.scrollY >= 300) {
        up.style.display = "block";
    } else {
        up.style.display = "none";
    }
   //  this.scrollY >= 1000 ? span.classList.add("show") : span.classList.remove("show");
};

up.onclick = function () {
    window.scrollTo({
    top: 0,
    behavior: "smooth",
    });
};

</script>
@endsection


