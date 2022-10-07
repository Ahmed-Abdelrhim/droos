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
</head>
<body>
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
        overflow-y: scroll;
    }

    .side-bar::-webkit-scrollbar {
        width: 8px;
        background: #0d141f;
        border-radius: 0 8px 8px 0;
    }

    .side-bar::-webkit-scrollbar-thumb {
        background: #525861;
        border-radius: 0 8px 8px 0;
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

    .box i {
        margin-left: 10px;
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

    /* Style the sidenav links and the dropdown button */
    .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 24px;
        color: #818181;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: right;
        cursor: pointer;
        outline: none;
        margin-bottom: 5%;
        border-bottom: 2px solid var(--black);
    }

    /* On mouse-over */
    .dropdown-btn:hover {
        color: var(--black);
    }

    /* On mouse-over */
    .dropdown-btn i:hover {
        transform: rotateX(180deg);
        top: -6px;
    }

    /* Add an active class to the active dropdown button */
    .active {
        /* background-color: var(--main-color); */
        color: white;
    }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #000;
            padding-right: 8px;
            transform: translateY(-2em);
            transition: var(--main-transition);
        }

        .dropdown-container a {
            display: block;
            max-height: 240px;
            background: #414b57;
            color: #f5f6fa;
            width: 100%;
            transition: all 0.4s;
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
    /* Optional: Style the caret down icon */
    .fa-caret-down {
        float: left;
        padding-left: 8px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    thead {
        font-size: 25px;
        font-weight: bold;
    }

    tbody {
        font-size: 20px;
    }

    td, th {
        border: 1px solid #fff;
        text-align: right;
        padding: 10px;
    }

    tr:nth-child(even) {
        background-color: #5ac8fa;
    }

    tr:nth-child(odd) {
        background-color: #34aadc;
    }

    .custom-pagination {
        display: flex;
        justify-content: center;
        text-align: center;
        font-size: 24px;
        margin: 5% auto;
        color: #fff;
    }

    .custom-pagination a {
        color: var(--white);
        padding: 0px 16px;
        text-decoration: none;
        transition: background-color .3s;
    }

    .custom-pagination nav div {
        border: 1px solid #ddd;
    }

    .custom-pagination nav div:first-child {
        display: flex;
        justify-content: space-between;
    }

    .custom-pagination nav div a {
        background-color: #5ac8fa;
    }

    .custom-pagination svg {
        display: none !important;
    }
</style>
<header class="header">
    <section class="flex">
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="profile">
            <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">
            <h3 class="name">{{Auth::guard('admin')->user()->name}}</h3>
            <p class="role">Admin</p>
            <a href="{{route('teacher.profile')}}" class="btn">view profile</a>
            <form method="POST" action="{{route('admin.logout')}}" id="logout-form">
                @csrf
                <a class="btn" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"
                >logout</a>
            </form>
        </div>
        <div class="tutor">
            <div class="info">
                <span>Welcome</span>
                <h3>{{Auth::guard('admin')->user()->name}}</h3>
            </div>
            @if(Auth::guard('admin')->user()->avatar != null)
                <img src="{{asset('images/adminImages/'.Auth::guard('admin')->user()->avatar)}}" alt="tutor">
            @else
                <img src="{{asset('images/pic-6.jpg')}}" alt="tutor">
            @endif
        </div>
    </section>
</header>
<div class="side-bar">
    <div id="close-btn">
        <i class="fas fa-times"></i>
    </div>
    <div class="logo">
        <a href="{{route('dashboard')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
    </div>
    <nav class="navbar">
        <a href="{{route('dashboard')}}"><i class="fas fa-home"></i><span> لوحة التحكم </span></a>
        <a href="{{route('view.msg')}}"><i class="fas fa-envelope"></i><span>الرسائل</span></a>
        <a href="{{route('add.feature')}}"><i class="fa-solid fa-gift"></i><span>المميزات</span></a>
        <a href="{{route('who.are.we')}}"><i class="fa-solid fa-gift"></i><span>من نحن</span></a>
        <a href="{{route('demo.videos')}}"><i class="fa-solid fa-gift"></i><span>فيديوهات demo</span></a>
        <button class="dropdown-btn">جميع الطلاب
            <i class="fa fa-caret-down arrow"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{route('all.students.1st')}}"><i
                    class="fas fa-question"></i><span>جميع طلاب الأول الثانوي</span></a>
            <a href="{{route('all.students.2nd')}}"><i
                    class="fas fa-question"></i><span>جميع طلاب الثاني الثانوي</span></a>
            <a href="{{route('all.students.3rd')}}"><i
                    class="fas fa-question"></i><span>جميع طلاب الثالث الثانوي</span></a>
        </div>
        <button class="dropdown-btn"> قائمة الانتظار
            <i class="fa fa-caret-down arrow"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{route('waiting.list.1st')}}"><i
                    class="fas fa-question"></i><span>قائمة الانتظار الصف الاول</span></a>
            <a href="{{route('waiting.list.2nd')}}"><i
                    class="fas fa-question"></i><span>قائمة الانتظار الصف الثاني</span></a>
            <a href="{{route('waiting.list.3rd')}}"><i
                    class="fas fa-question"></i><span>قائمة الانتظار الصف الثالث</span></a>
        </div>
        <button class="dropdown-btn"> قائمة المشتركين
            <i class="fa fa-caret-down arrow"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{route('subscribed.1st.year')}}"><i
                    class="fas fa-question"></i><span>قائمة المشتركين الصف الاول</span></a>
            <a href="{{route('subscribed.2nd.year')}}"><i
                    class="fas fa-question"></i><span>قائمة المشتركين الصف الثاني</span></a>
            <a href="{{route('subscribed.3rd.year')}}"><i
                    class="fas fa-question"></i><span>قائمة المشتركين الصف الثالث</span></a>
        </div>
        <button class="dropdown-btn"> الكورسات
            <i class="fa fa-caret-down arrow"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{route('add.course')}}"><i class="fas fa-question"></i><span>أضافة كورس جديد</span></a>
            <a href="{{route('all.courses.1st')}}"><i class="fas fa-question"></i><span>كورسات الصف الاول</span></a>
            <a href="{{route('all.courses.2nd')}}"><i class="fas fa-question"></i><span>كورسات الصف الثاني</span></a>
            <a href="{{route('all.courses.3rd')}}"><i class="fas fa-question"></i><span>كورسات الصف الثالث</span></a>
        </div>
        <button class="dropdown-btn"> المحاضرات
            <i class="fa fa-caret-down arrow"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{route('add.new.lec')}}"><i class="fas fa-question"></i><span>أضافة محاضرة</span></a>
            <a href="{{route('get.lec.1st.year')}}"><i
                    class="fas fa-question"></i><span> محاضرات الصف الأول الثانوي</span></a>
            <a href="{{route('get.lec.2nd.year')}}"><i
                    class="fas fa-question"></i><span> محاضرات الصف الثاني الثانوي</span></a>
            <a href="{{route('get.lec.3rd.year')}}"><i
                    class="fas fa-question"></i><span>محاضرات الصف الثالث الثانوي</span></a>
        </div>


{{--        <button class="dropdown-btn"> الواجب--}}
{{--            <i class="fa fa-caret-down arrow"></i>--}}
{{--        </button>--}}
{{--        <div class="dropdown-container">--}}
{{--            <a href="{{route('add.new.homework')}}"><i class="fas fa-question"></i><span>أضافة واجب</span></a>--}}
{{--            <a href="{{route('get.homework.1st.year')}}"><i--}}
{{--                    class="fas fa-question"></i><span> واجب الصف الأول الثانوي</span></a>--}}
{{--            <a href="{{route('get.homework.2nd.year')}}"><i--}}
{{--                    class="fas fa-question"></i><span> واجب الصف الثاني الثانوي</span></a>--}}
{{--            <a href="{{route('get.homework.3rd.year')}}"><i--}}
{{--                    class="fas fa-question"></i><span>واجب الصف الثالث الثانوي</span></a>--}}
{{--        </div>--}}


{{--        <button class="dropdown-btn"> الكويزات--}}
{{--            <i class="fa fa-caret-down arrow"></i>--}}
{{--        </button>--}}
{{--        <div class="dropdown-container">--}}
{{--            <a href="{{route('add.new.quiz')}}"><i class="fas fa-question"></i><span>أضافة كويز</span></a>--}}
{{--            <a href="{{route('get.quiz.1st.year')}}"><i--}}
{{--                    class="fas fa-question"></i><span> كويز الصف الأول الثانوي</span></a>--}}
{{--            <a href="{{route('get.quiz.2nd.year')}}"><i--}}
{{--                    class="fas fa-question"></i><span> كويز الصف الثاني الثانوي</span></a>--}}
{{--            <a href="{{route('get.quiz.3rd.year')}}"><i--}}
{{--                    class="fas fa-question"></i><span>كويز الصف الثالث الثانوي</span></a>--}}
{{--        </div>--}}


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
</script>
<script src="{{asset('js/admin.js')}}"></script>
{{--<script src="{{asset('js/script.js')}}"></script>--}}
@stack('javascript')
@yield('script')
</body>
</html>
