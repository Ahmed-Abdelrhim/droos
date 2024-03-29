@extends('layouts.design')
@section('content')

    <header class="header">

        <img id="back-ground" src="{{asset('storage/images/back-ground.png')}}">
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
                @else {{route('home')}}
                @endif
            " class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
                <a href="{{asset('contact')}}" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
            </nav>


            <div class="profile">
                <img class="image" src="@if(Auth::check())
                  {{asset('storage/images/studentImages/'.Auth::user()->avatar)}}
                  @else
                  {{asset('storage/images//pic-6.jpg')}}
                  @endif" alt="tutor">
                <h3 class="name">
                    @if(Auth::check())
                        {{Auth::user()->name}}
                    @else
                        Student
                    @endif
                </h3>
                <p class="role">student</p>
                @if(Auth::check())
                    <form method="GET" action="{{route('view.student.profile')}}">
                        @csrf
                        <button class="btn" type="submit">view profile</button>
                    </form>
                    <form method="POST" action="{{route('student.logout')}}">
                        @csrf
                        <button class="btn" type="submit">log out</button>
                    </form>
                @else
                    <a href="{{route('login')}}" class="option-btn">login</a>
                    <a href="{{route('student.register')}}" class="option-btn">register</a>
                @endif

                {{--                <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="image-not-found">--}}
                {{--                <h3 class="name">Welcome</h3>--}}
                {{--                <p class="role">student</p>--}}
                {{--                <div class="flex-btn">--}}
                {{--                    <a href="{{route('login')}}" class="option-btn">login</a>--}}
                {{--                    <a href="{{route('student.register')}}" class="option-btn">register</a>--}}
                {{--                </div>--}}
            </div>
            <!-- <img id="logo-background" src="{{asset('storage/images/splash.png')}}"> -->
            <a href="{{asset('home')}}" class="logo"><img src="{{asset('storage/images/msbah.png')}}"></a>
        </section>

    </header>



    <section class="about">

        <div class="row">

            <div class="image">
                <img src="{{asset('storage/images/about-img.svg')}}" alt="">
            </div>

            <div class="content">
                <h3>لماذا تختار منصتنا ؟ </h3>
                <p>
                    @if(isset($who_are_we))
                        @foreach($who_are_we as $text)
                            {{$text->text}}
                        @endforeach
                    @else
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut dolorum quasi illo? Distinctio
                        expedita commodi, nemo a quam error repellendus sint, fugiat quis numquam eum eveniet sequi
                        aspernatur quaerat tenetur.
                    @endif

                </p>

                <a href="{{route('home')}}" class="inline-btn">our courses</a>
            </div>

        </div>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-graduation-cap"></i>
                <div>
                    <h3>+50</h3>
                    <p>online courses</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-user-graduate"></i>
                <div>
                    <h3>+1k</h3>
                    <p>brilliant students</p>
                </div>
            </div>

            {{--            <div class="box">--}}
            {{--                <i class="fas fa-chalkboard-user"></i>--}}
            {{--                <div>--}}
            {{--                    <h3>+1k</h3>--}}
            {{--                    <p>expert tutors</p>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="box">
                <i class="fas fa-briefcase"></i>
                <div>
                    <h3>100%</h3>
                    <p>time quality</p>
                </div>
            </div>

        </div>

    </section>


    {{--    <section class="reviews">--}}

    {{--        <h2 class="heading"><i class="fa-regular fa-star" style="margin-left: 15px;"></i>اراء طلابنا</h2>--}}

    {{--        <div class="box-container">--}}

    {{--            <div class="box">--}}
    {{--                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam,--}}
    {{--                    dignissimos consectetur. Sed ullam iusto eveniet qui aut quibusdam vero voluptate libero facilis--}}
    {{--                    fuga. Eligendi eaque molestiae modi?</p>--}}
    {{--                <div class="student">--}}
    {{--                    <img src="images/pic-2.jpg" alt="">--}}
    {{--                    <div>--}}
    {{--                        <h3>john deo</h3>--}}
    {{--                        <div class="stars">--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star-half-alt"></i>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="box">--}}
    {{--                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam,--}}
    {{--                    dignissimos consectetur. Sed ullam iusto eveniet qui aut quibusdam vero voluptate libero facilis--}}
    {{--                    fuga. Eligendi eaque molestiae modi?</p>--}}
    {{--                <div class="student">--}}
    {{--                    <img src="images/pic-3.jpg" alt="">--}}
    {{--                    <div>--}}
    {{--                        <h3>john deo</h3>--}}
    {{--                        <div class="stars">--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star-half-alt"></i>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="box">--}}
    {{--                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam,--}}
    {{--                    dignissimos consectetur. Sed ullam iusto eveniet qui aut quibusdam vero voluptate libero facilis--}}
    {{--                    fuga. Eligendi eaque molestiae modi?</p>--}}
    {{--                <div class="student">--}}
    {{--                    <img src="images/pic-4.jpg" alt="">--}}
    {{--                    <div>--}}
    {{--                        <h3>john deo</h3>--}}
    {{--                        <div class="stars">--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star-half-alt"></i>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="box">--}}
    {{--                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam,--}}
    {{--                    dignissimos consectetur. Sed ullam iusto eveniet qui aut quibusdam vero voluptate libero facilis--}}
    {{--                    fuga. Eligendi eaque molestiae modi?</p>--}}
    {{--                <div class="student">--}}
    {{--                    <img src="images/pic-5.jpg" alt="">--}}
    {{--                    <div>--}}
    {{--                        <h3>john deo</h3>--}}
    {{--                        <div class="stars">--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star-half-alt"></i>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="box">--}}
    {{--                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam,--}}
    {{--                    dignissimos consectetur. Sed ullam iusto eveniet qui aut quibusdam vero voluptate libero facilis--}}
    {{--                    fuga. Eligendi eaque molestiae modi?</p>--}}
    {{--                <div class="student">--}}
    {{--                    <img src="images/pic-6.jpg" alt="">--}}
    {{--                    <div>--}}
    {{--                        <h3>john deo</h3>--}}
    {{--                        <div class="stars">--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star-half-alt"></i>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="box">--}}
    {{--                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam,--}}
    {{--                    dignissimos consectetur. Sed ullam iusto eveniet qui aut quibusdam vero voluptate libero facilis--}}
    {{--                    fuga. Eligendi eaque molestiae modi?</p>--}}
    {{--                <div class="student">--}}
    {{--                    <img src="images/pic-7.jpg" alt="">--}}
    {{--                    <div>--}}
    {{--                        <h3>john deo</h3>--}}
    {{--                        <div class="stars">--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star"></i>--}}
    {{--                            <i class="fas fa-star-half-alt"></i>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </section>--}}






    <!-- Start Footer -->
{{--    <footer class="footer">--}}
{{--        <div class="container">--}}
{{--            <div class="box">--}}
{{--                <a href="{{route('home')}}" class="logo"><img src="{{asset('storage/images/logo.png')}}"></a>--}}
{{--                <ul class="social">--}}
{{--                    <li>--}}
{{--                        <a href="https://www.facebook.com/profile.php?id=100068906257005" class="facebook"--}}
{{--                           target="_blank">--}}
{{--                            <i class="fab fa-facebook-f"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="https://web.facebook.com/profile.php?id=100009262544420" class="twitter"--}}
{{--                           target="_blank">--}}
{{--                            <i class="fab fa-twitter"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="https://www.youtube.com/channel/UCXrIOiXRybTNagbllgISrDQ" class="youtube"--}}
{{--                           target="_blank">--}}
{{--                            <i class="fab fa-youtube"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <p class="text">--}}
{{--                    منصة علاء الدين لشرح منهج الفزياء للثانوية العامة--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <div class="box">--}}
{{--                <ul class="links">--}}
{{--                    <li><a href="{{route('home')}}">الرئيسية</a></li>--}}
{{--                    <li><a href="{{route('about')}}">من نحن</a></li>--}}
{{--                    <li><a href="{{route('contact')}}">تواصل معنا</a></li>--}}
{{--                    <li><a href="{{route('home')}}">الكورسات</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="box">--}}
{{--                <div class="line">--}}
{{--                    <i class="fas fa-map-marker-alt fa-fw"></i>--}}
{{--                    <div class="info">مصر</div>--}}
{{--                </div>--}}
{{--                <div class="line">--}}
{{--                    <i class="far fa-clock fa-fw"></i>--}}
{{--                    <div class="info">24/7</div>--}}
{{--                </div>--}}
{{--                <div class="line">--}}
{{--                    <i class="fas fa-phone-volume fa-fw"></i>--}}
{{--                    <div class="info">01149596478</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="box footer-gallery">--}}
{{--                <img src="{{asset('storage/images/thumb-9.png')}}" alt=""/>--}}
{{--                <img src="{{asset('storage/images/thumb-8.png')}}" alt=""/>--}}
{{--                <img src="{{asset('storage/images/year-2.jpeg')}}" alt=""/>--}}
{{--                <img src="{{asset('storage/images/ph-1.jpg')}}" alt=""/>--}}
{{--                <img src="{{asset('storage/images/thumb-5.png')}}" alt=""/>--}}
{{--                <img src="{{asset('storage/images/thumb-4.png')}}" alt=""/>--}}
{{--            </div>--}}
{{--            <!-- <div class="box">--}}
{{--                <p class="text">--}}
{{--                    للتواصل مع مطوري الموقع يرجي الاتصال علي الارقام التالية--}}
{{--                </p>--}}
{{--                <div class="line">--}}
{{--                    <i class="fas fa-phone-volume fa-fw"></i>--}}
{{--                    <div class="info">01152067271</div>--}}
{{--                    <i class="fas fa-phone-volume fa-fw"></i>--}}
{{--                    <div class="info">01014012312</div>--}}
{{--                </div>--}}
{{--            </div> -->--}}
{{--        </div>--}}
{{--        <p class="copyright">Developed  <a href="https://www.facebook.com/ahmed.abdalraheem.739" class="fas fa-heart"--}}
{{--                                             target="_blank"></a>--}}
{{--            By--}}
{{--            <a href="https://www.facebook.com/ahmed.abdalraheem.739" target="_blank">--}}
{{--        <p>Ahmed Abdelrhim</p>--}}
{{--        <p><a href="tel:01152067271" style="text-decoration: none; color: #8e44ad;">01152067271</a></p>--}}
{{--        </a> ,--}}
{{--        <a href="https://www.facebook.com/anas.rabea.35" target="_blank">--}}
{{--            <p>Anas Rabea</p>--}}
{{--            <p><a href="tel:01014012312" style="text-decoration: none; color: #8e44ad;">01014012312</a></p>--}}
{{--        </a>--}}
{{--        </p>--}}
{{--        &copy; copyright @ 2022 | all rights reserved!--}}
{{--    </footer>--}}

    <!-- scroll top button  -->
    <a href="#" class="top">
        <img src="{{asset('storage/images/scroll-top-img.png')}}">
    </a>
    <!-- End Footer -->

@endsection
