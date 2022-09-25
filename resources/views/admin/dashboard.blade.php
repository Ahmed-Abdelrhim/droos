@extends('layouts.admin')
@section('content')
    <section class="courses">

        <h1 class="heading">Admin Dashboard</h1>

        <div class="box-container">

            <div class="box">
                <h3 class="title"><i class="fas fa-question"></i>جميع الطلاب </h3>
                <a href="#" class="inline-btn">1000</a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fas fa-question"></i>الطلاب المشتركين</h3>
                <a href="#" class="inline-btn">635</a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fas fa-question"></i> الطلاب في قائمة الانتظار</h3>
                <a href="#" class="inline-btn">54</a>
            </div>
        </div>

    </section>
<<<<<<< HEAD
</header>

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="logo">
      <a href="{{asset('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
   </div>

    <nav class="navbar">
        <a href="{{route('dashboard')}}"><i class="fas fa-home"></i><span> لوحة التحكم </span></a>
        <button class="dropdown-btn">جميع الطلاب
            <i class="fa fa-caret-down"></i>
        </button>
    <div class="dropdown-container">
        <a href="{{route('all.students.1st')}}"><i class="fas fa-question"></i><span>جميع طلاب الأول الثانوي</span></a>
        <a href="{{route('all.students.2nd')}}"><i class="fas fa-question"></i><span>جميع طلاب الثاني الثانوي</span></a>
        <a href="{{route('all.students.3rd')}}"><i class="fas fa-question"></i><span>جميع طلاب الثالث الثانوي</span></a>
    </div>

        <button class="dropdown-btn"> قائمة الانتظار
            <i class="fa fa-caret-down"></i>
        </button>
    <div class="dropdown-container">
        <a href="{{route('waiting.list.1st')}}"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الاول</span></a>
        <a href="{{route('waiting.list.2nd')}}"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الثاني</span></a>
        <a href="{{route('waiting.list.3rd')}}"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الثالث</span></a>
    </div>

        <button class="dropdown-btn"> قائمة المشتركين
            <i class="fa fa-caret-down"></i>
        </button>
    <div class="dropdown-container">
        <a href="#"><i class="fas fa-question"></i><span>قائمة المشتركين الصف الاول</span></a>
        <a href="#"><i class="fas fa-question"></i><span>قائمة المشتركين الصف الثاني</span></a>
        <a href="#"><i class="fas fa-question"></i><span>قائمة المشتركين الصف الثالث</span></a>
    </div>

        <button class="dropdown-btn"> test
            <i class="fa fa-caret-down"></i>
        </button>
    <div class="dropdown-container">
        <a href="#"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الاول</span></a>
        <a href="#"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الثاني</span></a>
        <a href="#"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الثالث</span></a>
    </div>

    </nav>
</div>

<section class="courses">

   <h1 class="heading">Admin Dashboard</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title"><i class="fas fa-question"></i>جميع الطلاب </h3>
         <a href="#" class="inline-btn">1000</a>
      </div>

      <div class="box">
         <h3 class="title"><i class="fas fa-question"></i>الطلاب المشتركين</h3>
         <a href="#" class="inline-btn">635</a>
      </div>

      <div class="box">
         <h3 class="title"><i class="fas fa-question"></i> الطلاب في قائمة الانتظار</h3>
         <a href="#" class="inline-btn">54</a>
      </div>

</section>




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

//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>


=======
>>>>>>> a7281f572c70d3378c0c4f5fef68296ca15a4e3c
@endsection


{{--@section('content')--}}
{{--<style>--}}

{{--body{--}}
{{--   background-color: var(--light-bg);--}}
{{--   padding-right: 30rem;--}}
{{--}--}}

{{--body.active{--}}
{{--   padding-right: 0;--}}
{{--}--}}


{{--.side-bar{--}}
{{--   position: fixed;--}}
{{--   top: 0; right: 0;--}}
{{--   width: 30rem;--}}
{{--   background-color: var(--white);--}}
{{--   height: 100vh;--}}
{{--   border-right: var(--border);--}}
{{--   z-index: 1200;--}}
{{--   transition: .2s linear;--}}
{{--}--}}

{{--.side-bar #close-btn{--}}
{{--   text-align: left;--}}
{{--   padding: 2rem;--}}
{{--   display: none;--}}
{{--}--}}

{{--.side-bar #close-btn i{--}}
{{--   text-align: left;--}}
{{--   font-size: 2.5rem;--}}
{{--   background:var(--red);--}}
{{--   border-radius: .5rem;--}}
{{--   color:var(--white);--}}
{{--   cursor: pointer;--}}
{{--   height: 4.5rem;--}}
{{--   width: 4.5rem;--}}
{{--   line-height: 4.5rem;--}}
{{--   text-align: center;--}}
{{--}--}}

{{--.side-bar #close-btn i:hover{--}}
{{--   background-color: var(--black);--}}
{{--}--}}

{{--.side-bar .profile{--}}
{{--   padding:3rem 2rem;--}}
{{--   text-align: center;--}}
{{--}--}}

{{--.side-bar .profile .image{--}}
{{--   height: 10rem;--}}
{{--   width: 10rem;--}}
{{--   border-radius: 50%;--}}
{{--   object-fit: contain;--}}
{{--   margin-bottom: 1rem;--}}
{{--}--}}

{{--.side-bar .profile .name{--}}
{{--   font-size: 2rem;--}}
{{--   color:var(--black);--}}
{{--   overflow: hidden;--}}
{{--   text-overflow: ellipsis;--}}
{{--   white-space: nowrap;--}}
{{--}--}}

{{--.side-bar .profile .role{--}}
{{--   font-size: 1.8rem;--}}
{{--   color: var(--light-color);--}}
{{--}--}}

{{--.side-bar .navbar a{--}}
{{--   display: block;--}}
{{--   padding: 2rem;--}}
{{--   font-size: 2rem;--}}
{{--}--}}

{{--.side-bar .navbar a i{--}}
{{--   margin-left: 1.5rem;--}}
{{--   color:var(--main-color);--}}
{{--   transition: .2s linear;--}}
{{--}--}}

{{--.side-bar .navbar a span{--}}
{{--   color:var(--light-color);--}}
{{--}--}}

{{--.side-bar .navbar a:hover{--}}
{{--   background-color: var(--light-bg);--}}
{{--}--}}

{{--.side-bar .navbar a:hover i{--}}
{{--   margin-right: 2.5rem;--}}
{{--}--}}

{{--.side-bar.active{--}}
{{--   right: -30rem;--}}
{{--}--}}


{{--.side-bar #close-btn{--}}
{{--   text-align: left;--}}
{{--   padding: 2rem;--}}
{{--   display: none;--}}
{{--}--}}

{{--.side-bar #close-btn i{--}}
{{--   text-align: left;--}}
{{--   font-size: 2.5rem;--}}
{{--   background:var(--red);--}}
{{--   border-radius: .5rem;--}}
{{--   color:var(--white);--}}
{{--   cursor: pointer;--}}
{{--   height: 4.5rem;--}}
{{--   width: 4.5rem;--}}
{{--   line-height: 4.5rem;--}}
{{--   text-align: center;--}}
{{--}--}}

{{--.side-bar #close-btn i:hover{--}}
{{--   background-color: var(--black);--}}
{{--}--}}


{{--.tutor {--}}
{{--    font-size: 1.8rem;--}}
{{--    color: var(--light-color);--}}
{{--    display:flex;--}}
{{--}--}}

{{--.tutor img {--}}
{{--    height: 5rem;--}}
{{--    width: 5rem;--}}
{{--    border-radius: 50%;--}}
{{--    object-fit: cover;--}}
{{--}--}}

{{--.tutor h3 {--}}
{{--    font-size: 1.8rem;--}}
{{--    color: var(--black);--}}
{{--    margin-bottom: .2rem;--}}
{{--}--}}

{{--.tutor span {--}}
{{--    font-size: 1.3rem;--}}
{{--    color: var(--light-color);--}}
{{--}--}}

{{--.logo img {--}}
{{--    height: 8rem;--}}
{{--    width: 15rem;--}}
{{--}--}}

{{--.thumb #video {--}}
{{--    width: 100%;--}}
{{--    height:500px;--}}
{{--    border-radius: 5px;--}}
{{--}--}}

{{--@media (max-width: 767px){--}}
{{--    .thumb #video {--}}
{{--        width: 100%;--}}
{{--    }--}}
{{--}--}}

{{--@media (max-width:1200px){--}}

{{--   body{--}}
{{--      padding-right: 0;--}}
{{--   }--}}

{{--   .side-bar{--}}
{{--      right: -30rem;--}}
{{--      transition: .2s linear;--}}
{{--   }--}}

{{--   .side-bar #close-btn{--}}
{{--      display: block;--}}
{{--   }--}}

{{--   .side-bar.active{--}}
{{--      right: 0;--}}
{{--      box-shadow: 0 0 0 100vw rgba(0,0,0,.8);--}}
{{--      border-right: 0;--}}
{{--   }--}}

{{--}--}}


{{--/* Style the sidenav links and the dropdown button */--}}
{{--.dropdown-btn {--}}
{{--  padding: 6px 8px 6px 16px;--}}
{{--  text-decoration: none;--}}
{{--  font-size: 24px;--}}
{{--  color: #818181;--}}
{{--  display: block;--}}
{{--  border: none;--}}
{{--  background: none;--}}
{{--  width:100%;--}}
{{--  text-align: right;--}}
{{--  cursor: pointer;--}}
{{--  outline: none;--}}
{{--}--}}

{{--/* On mouse-over */--}}
{{--.dropdown-btn:hover {--}}
{{--  color: #f1f1f1;--}}
{{--}--}}


{{--/* Add an active class to the active dropdown button */--}}
{{--.active {--}}
{{--  background-color: var(--main-color);--}}
{{--  color: white;--}}
{{--}--}}

{{--/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */--}}
{{--.dropdown-container {--}}
{{--  display: none;--}}
{{--  background-color: #000;--}}
{{--  padding-right: 8px;--}}
{{--}--}}

{{--/* Optional: Style the caret down icon */--}}
{{--.fa-caret-down {--}}
{{--  float: left;--}}
{{--  padding-left: 8px;--}}
{{--}--}}
{{--</style>--}}

{{--<header class="header">--}}
{{--    <!-- <img id="back-ground" src="{{asset('images/back-ground.png')}}"> -->--}}
{{--    <section class="flex">--}}
{{--            <div class="icons">--}}
{{--                <div id="menu-btn" class="fas fa-bars"></div>--}}
{{--                <div id="toggle-btn" class="fas fa-sun"></div>--}}
{{--                <div id="user-btn" class="fas fa-user"></div>--}}
{{--            </div>--}}
{{--            <div class="profile">--}}
{{--                <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">--}}
{{--                <h3 class="name">{{Auth::guard('admin')->user()->name}}</h3>--}}
{{--                <p class="role">Admin</p>--}}
{{--                <a href="{{route('teacher.profile')}}" class="btn">view profile</a>--}}
{{--                <a href="" class="btn">logout</a>--}}
{{--            </div>--}}
{{--            <div class="tutor">--}}
{{--                <div class="info">--}}
{{--                    <span>Welcome</span>--}}
{{--                    <h3>{{Auth::guard('admin')->user()->name}}</h3>--}}
{{--                </div>--}}
{{--                <img src="{{asset('images//pic-6.jpg')}}" alt="tutor">--}}
{{--            </div>--}}
{{--    </section>--}}
{{--</header>--}}

{{--<div class="side-bar">--}}

{{--   <div id="close-btn">--}}
{{--      <i class="fas fa-times"></i>--}}
{{--   </div>--}}

{{--   <div class="logo">--}}
{{--      <a href="{{asset('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>--}}
{{--   </div>--}}

{{--    <nav class="navbar">--}}
{{--        <a href="{{route('dashboard')}}"><i class="fas fa-home"></i><span> لوحة التحكم </span></a>--}}
{{--        <button class="dropdown-btn">جميع الطلاب--}}
{{--            <i class="fa fa-caret-down"></i>--}}
{{--        </button>--}}
{{--    <div class="dropdown-container">--}}
{{--        <a href="{{route('all.students.1st')}}"><i class="fas fa-question"></i><span>جميع طلاب الأول الثانوي</span></a>--}}
{{--        <a href="{{route('all.students.2nd')}}"><i class="fas fa-question"></i><span>جميع طلاب الثاني الثانوي</span></a>--}}
{{--        <a href="{{route('all.students.3rd')}}"><i class="fas fa-question"></i><span>جميع طلاب الثالث الثانوي</span></a>--}}
{{--    </div>--}}

{{--        <button class="dropdown-btn"> قائمة الانتظار--}}
{{--            <i class="fa fa-caret-down"></i>--}}
{{--        </button>--}}
{{--    <div class="dropdown-container">--}}
{{--        <a href="{{route('waiting.list.1st')}}"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الاول</span></a>--}}
{{--        <a href="{{route('waiting.list.2nd')}}"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الثاني</span></a>--}}
{{--        <a href="{{route('waiting.list.3rd')}}"><i class="fas fa-question"></i><span>قائمة الانتظار الصف الثالث</span></a>--}}
{{--    </div>--}}

{{--        <button class="dropdown-btn"> قائمة المشتركين--}}
{{--            <i class="fa fa-caret-down"></i>--}}
{{--        </button>--}}
{{--    <div class="dropdown-container">--}}
{{--        <a href="{{route('subscribed.1st.year')}}"><i class="fas fa-question"></i><span>قائمة المشتركين الصف الاول</span></a>--}}
{{--        <a href="{{route('subscribed.2nd.year')}}"><i class="fas fa-question"></i><span>قائمة المشتركين الصف الثاني</span></a>--}}
{{--        <a href="{{route('subscribed.3rd.year')}}"><i class="fas fa-question"></i><span>قائمة المشتركين الصف الثالث</span></a>--}}
{{--    </div>--}}

{{--        <button class="dropdown-btn"> الكورسات--}}
{{--            <i class="fa fa-caret-down"></i>--}}
{{--        </button>--}}
{{--    <div class="dropdown-container">--}}
{{--        <a href="#"><i class="fas fa-question"></i><span>كورسات الصف الاول</span></a>--}}
{{--        <a href="#"><i class="fas fa-question"></i><span>كورسات الصف الثاني</span></a>--}}
{{--        <a href="#"><i class="fas fa-question"></i><span>كورسات الصف الثالث</span></a>--}}
{{--    </div>--}}

{{--    </nav>--}}
{{--</div>--}}





{{--<!-- Start Footer -->--}}
{{--<footer class="footer">--}}
{{--    <div class="container">--}}
{{--        <div class="box">--}}
{{--            <a href="home.html" class="logo"><img src="{{asset('images/logo.png')}}"></a>--}}
{{--            <ul class="social">--}}
{{--                <li>--}}
{{--                    <a href="#" class="facebook">--}}
{{--                        <i class="fab fa-facebook-f"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#" class="twitter">--}}
{{--                        <i class="fab fa-twitter"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#" class="youtube">--}}
{{--                        <i class="fab fa-youtube"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <p class="text">--}}
{{--                منصة علاء الدين لشرح منهج الفزياء للثانوية العامة--}}
{{--            </p>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <ul class="links">--}}
{{--                <li><a href="home.html">الرئيسية</a></li>--}}
{{--                <li><a href="about.html">من نحن</a></li>--}}
{{--                <li><a href="contact.html">تواصل معنا</a></li>--}}
{{--                <li><a href="courses.html">الكورسات</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="line">--}}
{{--                <i class="fas fa-map-marker-alt fa-fw"></i>--}}
{{--                <div class="info">مصر </div>--}}
{{--            </div>--}}
{{--            <div class="line">--}}
{{--                <i class="far fa-clock fa-fw"></i>--}}
{{--                <div class="info">24/7</div>--}}
{{--            </div>--}}
{{--            <div class="line">--}}
{{--                <i class="fas fa-phone-volume fa-fw"></i>--}}
{{--                <div class="info">+201149596478</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="box footer-gallery">--}}
{{--            <img src="{{asset('images/thumb-7.png')}}" alt="" />--}}
{{--            <img src="{{asset('images/thumb-8.png')}}" alt="" />--}}
{{--            <img src="{{asset('images/year-2.jpeg')}}" alt="" />--}}
{{--            <img src="{{asset('images/ph-1.jpg')}}" alt="" />--}}
{{--            <img src="{{asset('images/thumb-5.png')}}" alt="" />--}}
{{--            <img src="{{asset('images/thumb-4.png')}}" alt="" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <p class="copyright">Developed By <a href="#" class="fas fa-heart"></a> By Anas , Ahmed</p>--}}
{{--    &copy; copyright @ 2022 | all rights reserved!--}}
{{--</footer>>--}}

{{--<!-- scroll top button  -->--}}
{{--<a href="#" class="top">--}}
{{--    <img src="{{asset('images/scroll-top-img.png')}}">--}}
{{--</a>--}}
{{--<!-- End Footer -->--}}

{{--<script>--}}
{{--let toggleBtn = document.getElementById('toggle-btn');--}}
{{--let body = document.body;--}}
{{--let darkMode = localStorage.getItem('dark-mode');--}}

{{--const enableDarkMode = () =>{--}}
{{--   toggleBtn.classList.replace('fa-sun', 'fa-moon');--}}
{{--   body.classList.add('dark');--}}
{{--   localStorage.setItem('dark-mode', 'enabled');--}}
{{--}--}}

{{--const disableDarkMode = () =>{--}}
{{--   toggleBtn.classList.replace('fa-moon', 'fa-sun');--}}
{{--   body.classList.remove('dark');--}}
{{--   localStorage.setItem('dark-mode', 'disabled');--}}
{{--}--}}

{{--if(darkMode === 'enabled'){--}}
{{--   enableDarkMode();--}}
{{--}--}}

{{--toggleBtn.onclick = (e) =>{--}}
{{--   darkMode = localStorage.getItem('dark-mode');--}}
{{--   if(darkMode === 'disabled'){--}}
{{--      enableDarkMode();--}}
{{--   }else{--}}
{{--      disableDarkMode();--}}
{{--   }--}}
{{--}--}}
{{--let sideBar = document.querySelector('.side-bar');--}}
{{--document.querySelector('#menu-btn').onclick = () =>{--}}
{{--   sideBar.classList.toggle('active');--}}
{{--   body.classList.toggle('active');--}}
{{--}--}}

{{--document.querySelector('#close-btn').onclick = () =>{--}}
{{--   sideBar.classList.remove('active');--}}
{{--   body.classList.remove('active');--}}
{{--}--}}


{{--let profile = document.querySelector('.header .flex .profile');--}}

{{--document.querySelector('#user-btn').onclick = () =>{--}}
{{--    profile.classList.toggle('active');--}}
{{--    search.classList.remove('active');--}}
{{--}--}}
{{--window.onscroll = () =>{--}}
{{--    profile.classList.remove('active');--}}
{{--   if(window.innerWidth < 1200){--}}
{{--      sideBar.classList.remove('active');--}}
{{--      body.classList.remove('active');--}}
{{--   }--}}
{{--}--}}


{{--// scroll to top--}}
{{--let up = document.querySelector(".top");--}}

{{--window.onscroll = function () {--}}
{{--    console.log(window.scrollY);--}}
{{--    if (window.scrollY >= 300) {--}}
{{--        up.style.display = "block";--}}
{{--    } else {--}}
{{--        up.style.display = "none";--}}
{{--    }--}}
{{--   //  this.scrollY >= 1000 ? span.classList.add("show") : span.classList.remove("show");--}}
{{--};--}}

{{--up.onclick = function () {--}}
{{--    window.scrollTo({--}}
{{--    top: 0,--}}
{{--    behavior: "smooth",--}}
{{--    });--}}
{{--};--}}

{{--//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */--}}
{{--var dropdown = document.getElementsByClassName("dropdown-btn");--}}
{{--var i;--}}

{{--for (i = 0; i < dropdown.length; i++) {--}}
{{--  dropdown[i].addEventListener("click", function() {--}}
{{--    this.classList.toggle("active");--}}
{{--    var dropdownContent = this.nextElementSibling;--}}
{{--    if (dropdownContent.style.display === "block") {--}}
{{--      dropdownContent.style.display = "none";--}}
{{--    } else {--}}
{{--      dropdownContent.style.display = "block";--}}
{{--    }--}}
{{--  });--}}
{{--}--}}
{{--</script>--}}

{{--@endsection--}}


