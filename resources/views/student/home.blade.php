@extends('layouts.design')
@section('content')
    <header class="header">
        <!-- <img id="back-ground" src="{{asset('storage/images/back-ground.png')}}"> -->
        <section class="flex">
            <div class="icons">
                <div id="menu-bars" class="fas fa-bars"></div>
                <div id="toggle-btn" class="fas fa-sun"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>
            <nav class="navbar">
                <a href="{{route('home')}}" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a>
                <a href="{{route('about')}}" class="active"><i class="fas fa-question"></i><span>من نحن</span></a>
                <a href="{{route('home')}}" class="active"><i
                        class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
                <a href="{{route('contact')}}" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
                <a href="{{route('admin.login.form')}}" class="active"><i class="fa-solid fa-database"></i><span>Control Panel</span></a>
            </nav>
            <div class="profile">
                <img src="{{asset('storage/images/pic-1.jpg')}}" class="image" alt="">
                <h3 class="name">Welcome</h3>
                <p class="role">student</p>
                <div class="flex-btn">
                    <a href="{{route('login')}}" class="option-btn">login</a>
                    <a href="{{route('student.register')}}" class="option-btn">register</a>
                </div>
            </div>
            <a href="{{route('home')}}" class="logo"><img src="{{asset('storage/images/msbah.png')}}"></a>
        </section>
    </header>
    <!-- START BANNER -->
    <section class="section" id="home">
        <div class="row">
{{--            <img src="{{asset('storage/images/aladdin.png')}}" alt="image"--}}
{{--                 style="width: 350px; height: 430px; margin-top: -60px;">--}}
            <img src="{{asset('storage/images/logo.png')}}" alt="image" style="width: 60%; margin-right: 60px;">

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
        <div class="slider-area" id="slider-area">

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
        <div class="fas fa-cog nut1"></div>
        <div class="fas fa-cog nut2"></div>
        <a href="#cards" class="go-down">
            <i class="fas fa-angle-double-down fa-2x"></i>
        </a>
    </section>
    <!-- END BANNER -->
    <h2 class="main-title">الصفوف الدراسية</h2>
    <div class="card-container" id="cards">
        <div class="card">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div class="card-content">
                {{--            <img src="{{asset('storage/images/ph-15.jpeg')}}">--}}
                <img src="{{asset('storage/images/ph-15.jpg')}}">
                <h2>01</h2>
                <h3>الصف الدراسي الأول</h3>
                <p>جميع كورسات الصف الأول الثانوي</p>
                <a href="{{route('courses.1st.students')}}">ابدا التعلم</a>
            </div>
        </div>
        <div class="card">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div class="card-content">
                <img src="{{asset('storage/images/ph-18.jpg')}}">
                <h2>02</h2>
                <h3>الصف الدراسي الثاني</h3>
                <p>جميع كورسات الصف الثاني الثانوي</p>
                <a href="{{route('courses.2nd.students')}}">ابدا التعلم</a>
            </div>
        </div>
        <div class="card">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div class="card-content">
                <img src="{{asset('storage/images/ph-17.jpg')}}">
                <h2>03</h2>
                <h3>الصف الدراسي الثالث</h3>
                <p>جميع كورسات الصف الثالث الثانوي</p>
                <a href="{{route('courses.3rd.students')}}">ابدا التعلم</a>
            </div>
        </div>
    </div>
    <div class="container-line">
        <div class="upperpart">
            <img src="{{asset('storage/images/pngwing.png')}}">
            <div class="first">
                <div class="linee"></div>
                <div class="balle"></div>
            </div>
            <div class="second">
                <div class="linee"></div>
                <div class="balle"></div>
            </div>
            <div class="third">
                <div class="linee"></div>
                <div class="balle"></div>
            </div>
            <div class="fifth">
                <div class="linee"></div>
                <div class="balle"></div>
            </div>
        </div>
    </div>
    <div class="spikes"></div>
    <!-- Start Features -->
    <div class="features" id="features">
        <div class="container">
            <div class="box quality">
                <div class="img-holder"><img src="{{asset('storage/images/fet-2.svg')}}"></div>
                <h2>Quality</h2>
                <p>شاهد دروسك اكثر من مرة</p>
                <a href="{{route('about')}}">More</a>
            </div>
            <div class="box time">
                <div class="img-holder"><img src="{{asset('storage/images/fet-1.svg')}}"></div>
                <h2>Time</h2>
                <p>وفر وقت المواصلات و السنتر</p>
                <a href="{{route('features')}}">More</a>
            </div>
            <div class="box passion">
                <div class="img-holder"><img src="{{asset('storage/images/fet-3.svg')}}"></div>
                <h2>Passion</h2>
                <p>احضر امتحانات دورية </p>
                <a href="{{route('about')}}">More</a>
            </div>
        </div>
    </div>
    <!-- End Features -->
    <!-- Start Footer -->
    <footer class="footer">
        <div class="container">
            <div class="box">
                <a href="{{route('home')}}" class="logo"><img src="{{asset('storage/images/logo.png')}}"></a>
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
                <img src="{{asset('storage/images/thumb-9.png')}}" alt=""/>
                <img src="{{asset('storage/images/thumb-8.png')}}" alt=""/>
                <img src="{{asset('storage/images/year-2.jpeg')}}" alt=""/>
                <img src="{{asset('storage/images/ph-1.jpg')}}" alt=""/>
                <img src="{{asset('storage/images/thumb-5.png')}}" alt=""/>
                <img src="{{asset('storage/images/thumb-4.png')}}" alt=""/>
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
        <p class="copyright">Developed  <a href="https://www.facebook.com/ahmed.abdalraheem.739" class="fas fa-heart"
                                             target="_blank"></a>
            By
            <a href="https://www.facebook.com/ahmed.abdalraheem.739" target="_blank">
                <p>Ahmed Abdelrhim</p>
                <p><a href="tel:01152067271" style="text-decoration: none; color: #8e44ad;">01152067271</a></p>
            </a>
        <br>
            <a href="https://www.facebook.com/anas.rabea.35" target="_blank">
                <p>Anas Rabea</p>
                <p><a href="tel:01014012312" style="text-decoration: none; color: #8e44ad;">01014012312</a></p>
            </a>
        </p>
        &copy; copyright @ 2022 | all rights reserved!
    </footer>
    <!-- scroll top button  -->
    <a href="#" class="top">
        <img src="{{asset('storage/images/scroll-top-img.png')}}">
    </a>
    <!-- End Footer -->
@endsection
