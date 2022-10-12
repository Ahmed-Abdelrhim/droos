<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physics With Aladdin</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        body {
            background-color: var(--light-bg);
            padding-right: 30rem;
        }

        body.active {
            padding-right: 0;
        }

        .side-bar {
            position: fixed;
            top: 0;
            right: 0;
            width: 30rem;
            background-color: var(--white);
            height: 100vh;
            border-right: var(--border);
            z-index: 1200;
            transition: .2s linear;
        }

        .side-bar #close-btn {
            text-align: left;
            padding: 2rem;
            display: none;
        }

        .side-bar #close-btn i {
            text-align: left;
            font-size: 2.5rem;
            background: var(--red);
            border-radius: .5rem;
            color: var(--white);
            cursor: pointer;
            height: 4.5rem;
            width: 4.5rem;
            line-height: 4.5rem;
            text-align: center;
        }

        .side-bar #close-btn i:hover {
            background-color: var(--black);
        }

        .side-bar .profile {
            padding: 3rem 2rem;
            text-align: center;
        }

        .side-bar .profile .image {
            height: 10rem;
            width: 10rem;
            border-radius: 50%;
            object-fit: contain;
            margin-bottom: 1rem;
        }

        .side-bar .profile .name {
            font-size: 2rem;
            color: var(--black);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .side-bar .profile .role {
            font-size: 1.8rem;
            color: var(--light-color);
        }

        .side-bar .navbar a {
            display: block;
            padding: 2rem;
            font-size: 2rem;
        }

        .side-bar .navbar a i {
            margin-left: 1.5rem;
            color: var(--main-color);
            transition: .2s linear;
        }

        .side-bar .navbar a span {
            color: var(--light-color);
        }

        .side-bar .navbar a:hover {
            background-color: var(--light-bg);
        }

        .side-bar .navbar a:hover i {
            margin-right: 2.5rem;
        }

        .side-bar.active {
            right: -30rem;
        }

        .side-bar #close-btn {
            text-align: left;
            padding: 2rem;
            display: none;
        }

        .side-bar #close-btn i {
            text-align: left;
            font-size: 2.5rem;
            background: var(--red);
            border-radius: .5rem;
            color: var(--white);
            cursor: pointer;
            height: 4.5rem;
            width: 4.5rem;
            line-height: 4.5rem;
            text-align: center;
        }

        .side-bar #close-btn i:hover {
            background-color: var(--black);
        }

        .tutor {
            font-size: 1.8rem;
            color: var(--light-color);
            display: flex;
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
            height: 500px;
            border-radius: 5px;
        }

        @media (max-width: 767px) {
            .thumb #video {
                width: 100%;
            }
        }

        @media (max-width: 1200px) {
            body {
                padding-right: 0;
            }

            .side-bar {
                right: -30rem;
                transition: .2s linear;
            }

            .side-bar #close-btn {
                display: block;
            }

            .side-bar.active {
                right: 0;
                box-shadow: 0 0 0 100vw rgba(0, 0, 0, .8);
                border-right: 0;
            }
        }

        .card-container .card .card-content form input {
            display: inline-block;
            font-size: 1.5em;
            margin-top: 15px;
            padding: 8px 15px;
            background-color: #f3f4f6;
            color: #06285f;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 600;
        }

        .container-line {
            border: 5px solid var(--black);
            width: 100%;
            height: 500px;
            border-radius: 100% 100% 0 0;
            margin: auto;
        }

        .upperpart {
            position: relative;
            width: 200px;
            height: 400px;
            border-top: 16px solid var(--main-color);
            margin: auto;
            margin-top: 15%;
        }

        .upperpart img {
            width: 150px;
            position: absolute;
            left: 13%;
            top: -144px;
        }

        .linee {
            width: 3px;
            height: 200px;
            background: var(--main-color);
            margin: auto;
        }

        .balle {
            width: 50px;
            height: 50px;
            background: var(--main-color);
            border-radius: 100%;
        }

        .first,
        .second,
        .third,
        .fourth,
        .fifth {
            width: 50px;
            height: 250px;
            float: left;
        }

        .first {
            -webkit-animation: move 3s linear infinite;
        }

        .fifth {
            -webkit-animation: moveback 3s linear infinite;
        }

        @media (max-width: 768px) {
            .upperpart {
                margin-top: 40%;
            }
        }

        @-webkit-keyframes moveback {
            0% {
                transform: rotate(0deg);
                transform-origin: top;
            }
            25% {
                transform: rotate(0deg);
                transform-origin: top;
            }
            50% {
                transform: rotate(-30deg);
                transform-origin: top;
            }
            75% {
                transform: rotate(0deg);
                transform-origin: top;
            }
            100% {
                transform: rotate(0deg);
                transform-origin: top;
            }
        }

        .column .tutor .detales span {
            display: block;
            margin: 15px auto;
        }

        .column .tutor .detales span i {
            margin-left: 10px;
        }

        .select-box {
            display: flex;
            width: 100%;
            flex-direction: column;
            font-size: 24px;
            margin-bottom: 3%;
            margin-top: 35px;
            transition: all .25s ease;
        }

        /* Style the sidenav links and the dropdown button */
        .dropdown-btn {
            padding: 16px 16px 20px 16px;
            text-decoration: none;
            font-size: 30px;
            display: block;
            width: 100%;
            text-align: right;
            cursor: pointer;
            outline: none;
            margin-bottom: 12px;
            background: rgb(136 19 55);
            border-radius: 8px;
            color: #f5f6fa;
            position: relative;
        }

        .dropdown-btn:hover {
            background: #0005;
        }

        .dropdown-btn:hover i {
            transform: rotateX(180deg);
            top: 60%;
        }

        .dropdown-btn .maine {
            margin-left: 15px;
            color: var(--main-color);
            transition: .2s linear;
        }

        /* On mouse-over */
        .dropdown-btn:hover {
            color: var(--black);
            transition: .2s linear;
        }

        /* On mouse-over */
        .dropdown-btn .arrow {
            position: absolute;
            left: 2%;
            top: 30%;
        }

        /* Add an active class to the active dropdown button */
        .active {
            /* background-color: var(--main-color); */
            color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            transform: translateY(-1em);
            transition: all 0.5s smooth;
        }

        .dropdown-container a {
            display: block;
            background: #414b57;
            color: #f5f6fa;
            width: 100%;
            transition: all .25s ease;
            padding: 12px 24px;
        }

        .dropdown-container a:hover {
            background: #9ca3af;
        }

        .dropdown-container a i {
            margin-left: 15px;
            color: #bb86fc;
            transition: .2s linear;
        }

        .dropdown-container a:hover i {
            margin-right: 2.5rem;
        }

        .dropdown-container::-webkit-scrollbar {
            width: 8px;
            background: #0d141f;
            border-radius: 0 8px 8px 0;
        }

        .dropdown-container::-webkit-scrollbar-thumb {
            background: #525861;
            border-radius: 0 8px 8px 0;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: left;
            padding-left: 8px;
        }
    </style>
</head>
<body oncontextmenu="return false">
<header class="header">
    <!-- <img id="back-ground" src="{{asset('images/back-ground.png')}}"> -->
    <section class="flex">
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="profile">
            <img class="image"  src="@if(Auth::check() && Auth::user()->avatar != null)
                  {{asset('images/studentImages/'.Auth::user()->avatar)}}
                  @else
                  {{asset('images//pic-6.jpg')}}
                  @endif" alt="tutor">
            <h3 class="name">
                @if(Auth::check())
                    {{Auth::user()->name}}
                @else
                     <span style="margin-left: 5px;">Student</span>
                @endif
            </h3>
            @if(Auth::check() )
                <form method="GET" action="{{route('view.student.profile')}}">
                    @csrf
                    <button class="btn" type="submit">view profile</button>
                </form>
                <form method="POST" action="{{route('student.logout')}}">
                    @csrf
                    <button class="btn" type="submit">log out</button>
                </form>
            @else
                    <a href="{{route('student.login')}}" class="option-btn">login</a>
                    <a href="{{route('student.register')}}" class="option-btn">register</a>
            @endif
        </div>
        {{--
        <div style="color: white">
           --}}
        {{--
        <h2 style="margin-left: -300px; width: fit-content" >--}}
        {{--                @if(Auth::check())--}}
        {{--                    @if(Auth::user()->academic_year == 1)--}}
        {{--                        الصف الأول الثانوي--}}
        {{--                    @endif--}}
        {{--                    @if(Auth::user()->academic_year == 2)--}}
        {{--                        الصف الثاني الثانوي--}}
        {{--                    @endif--}}
        {{--                    @if(Auth::user()->academic_year == 3)--}}
        {{--                        الصف الثالث الثانوي--}}
        {{--                    @endif--}}
        {{--                @endif--}}
        {{--
     </h2>
     --}}
        {{--
     </div>
     --}}
        <div class="tutor">
            <div class="info">
                <h3 >
                    @if(Auth::check())
                        <span style="margin-left: 10px; width: fit-content; display:block;">Welcome_
                     @if(Auth::user()->academic_year == 1)
                                الصف الأول الثانوي
                            @endif
                            @if(Auth::user()->academic_year == 2)
                                الصف الثاني الثانوي
                            @endif
                            @if(Auth::user()->academic_year == 3)
                                الصف الثالث الثانوي
                            @endif
                     </span>
                        {{Auth::user()->name}}
                    @else
                        Student
                    @endif
                </h3>
            </div>
            <img src="@if(Auth::check() && Auth::user()->avatar != null)
                  {{asset('images/studentImages/'.Auth::user()->avatar)}}
                  @else
                  {{asset('images//pic-6.jpg')}}
                  @endif" alt="tutor">
        </div>
        {{--
        <h2 style="margin-left: 10px;">--}}
        {{--            @if(Auth::check())--}}
        {{--                @if(Auth::user()->academic_year == 1)--}}
        {{--                    الصف الأول الثانوي--}}
        {{--                @endif--}}
        {{--                @if(Auth::user()->academic_year == 2)--}}
        {{--                    الصف الثاني الثانوي--}}
        {{--                @endif--}}
        {{--                @if(Auth::user()->academic_year == 3)--}}
        {{--                    الصف الثالث الثانوي--}}
        {{--                @endif--}}
        {{--            @endif--}}
        {{--
     </h2>
     --}}
    </section>
</header>
<div class="side-bar">
    <div id="close-btn">
        <i class="fas fa-times"></i>
    </div>
    <div class="logo">
        <a href="{{route('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
    </div>
    <nav class="navbar">
        <a href="{{route('home')}}"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
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
               "><i class="fas fa-graduation-cap"></i><span>جميع الكورسات</span></a>
        <a href="
               @if(Auth::check())
               @if(Auth::user()->academic_year == 1) {{route('my.courses.1st')}}
               @endif
               @if(Auth::user()->academic_year == 2) {{route('my.courses.2nd')}}
               @endif
               @if(Auth::user()->academic_year == 3) {{route('my.courses.3rd')}}
               @endif
               @else #
               @endif
               "><i class="fas fa-graduation-cap"></i><span>كورساتي </span></a>
        <a href="{{route('about')}}"><i class="fas fa-question"></i><span>من نحن</span></a>
        <a href="{{route('features')}}"><i class="fa-solid fa-gift"></i><span>المميزات </span></a>
        <a href="{{route('contact')}}"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
        <a href="{{route('inbox')}}"><i class="fas fa-headset"></i><span>inbox </span></a>
        <a href="{{route('opinion')}}"><i class="fas fa-headset"></i><span>اراء طلابنا</span></a>
    </nav>
</div>
@yield('content')
<!-- Start Footer -->
    <footer class="footer">
        <div class="container">
            <div class="box">
                <a href="{{route('home')}}" class="logo"><img src="{{asset('images/logo.png')}}"></a>
                <ul class="social">
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=100068906257005" class="facebook"
                           target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://web.facebook.com/profile.php?id=100009262544420" class="twitter"
                           target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCXrIOiXRybTNagbllgISrDQ" class="youtube"
                           target="_blank">
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
                    <li><a href="{{route('about')}}">من نحن</a></li>
                    <li><a href="{{route('contact')}}">تواصل معنا</a></li>
                    <li><a href="{{route('home')}}">الكورسات</a></li>
                </ul>
            </div>
            <div class="box">
                <div class="line">
                    <i class="fas fa-map-marker-alt fa-fw"></i>
                    <div class="info">مصر</div>
                </div>
                <div class="line">
                    <i class="far fa-clock fa-fw"></i>
                    <div class="info">24/7</div>
                </div>
                <div class="line">
                    <i class="fas fa-phone-volume fa-fw"></i>
                    <div class="info">01149596478</div>
                </div>
            </div>
            <div class="box footer-gallery">
                <img src="{{asset('images/thumb-9.png')}}" alt=""/>
                <img src="{{asset('images/thumb-8.png')}}" alt=""/>
                <img src="{{asset('images/year-2.jpeg')}}" alt=""/>
                <img src="{{asset('images/ph-1.jpg')}}" alt=""/>
                <img src="{{asset('images/thumb-5.png')}}" alt=""/>
                <img src="{{asset('images/thumb-4.png')}}" alt=""/>
            </div>
            <!-- <div class="box">
                <p class="text">
                    للتواصل مع مطوري الموقع يرجي الاتصال علي الارقام التالية
                </p>
                <div class="line">
                    <i class="fas fa-phone-volume fa-fw"></i>
                    <div class="info">01152067271</div>
                    <i class="fas fa-phone-volume fa-fw"></i>
                    <div class="info">01014012312</div>
                </div>
            </div> -->
        </div>
        <p class="copyright">Developed By <a href="https://www.facebook.com/ahmed.abdalraheem.739" class="fas fa-heart"
                                             target="_blank"></a>
            By
            <a href="https://www.facebook.com/ahmed.abdalraheem.739" target="_blank">Ahmed Abdelrhim</a> ,
            <a href="https://www.facebook.com/anas.rabea.35" target="_blank">Anas Rabea</a>
        </p>
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

    const enableDarkMode = () => {
        toggleBtn.classList.replace('fa-sun', 'fa-moon');
        body.classList.add('dark');
        localStorage.setItem('dark-mode', 'enabled');
    }

    const disableDarkMode = () => {
        toggleBtn.classList.replace('fa-moon', 'fa-sun');
        body.classList.remove('dark');
        localStorage.setItem('dark-mode', 'disabled');
    }

    if (darkMode === 'enabled') {
        enableDarkMode();
    }

    toggleBtn.onclick = (e) => {
        darkMode = localStorage.getItem('dark-mode');
        if (darkMode === 'disabled') {
            enableDarkMode();
        } else {
            disableDarkMode();
        }
    }
    let sideBar = document.querySelector('.side-bar');
    document.querySelector('#menu-btn').onclick = () => {
        sideBar.classList.toggle('active');
        body.classList.toggle('active');
    }

    document.querySelector('#close-btn').onclick = () => {
        sideBar.classList.remove('active');
        body.classList.remove('active');
    }


    let profile = document.querySelector('.header .flex .profile');

    document.querySelector('#user-btn').onclick = () => {
        profile.classList.toggle('active');
        search.classList.remove('active');
    }
    window.onscroll = () => {
        profile.classList.remove('active');
        if (window.innerWidth < 1200) {
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

    function submitForm(form) {
        swal({
            title: "هل انت متأكد من شراء الكورس",
            // text: "لتأكيد الاشتراك",
            text: "قم بتحويل الفلوس بفودافون كاش علي الأرقام: 01025642978",
            text: "ارسل رسالة الدفع و ايميلك في المنصة علي واتس  : 01149596478",
            icon: "warning",
            buttons: true,
        })
            .then(function (isOkay) {
                if (isOkay) {
                    form.submit();
                }
            });
        return false;
    }


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
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

    // remove "Inspect Element"
document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}

</script>
{{--Custom JavaScript--}}
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
@stack('javascript')
@yield('script')
</body>
</html>
