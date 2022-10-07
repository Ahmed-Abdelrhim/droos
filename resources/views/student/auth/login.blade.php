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
                <a href="{{route('home')}}" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a>
                <a href="{{route('about')}}" class="active"><i class="fas fa-question"></i><span>من نحن</span></a>
                {{--                <a href="#" class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>--}}
                <a href="{{route('contact')}}" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
            </nav>

            <div class="profile">
                <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">
                <h3 class="name">Welcome</h3>
                <p class="role">studen</p>
                <div class="flex-btn">
                    <a href="{{route('student.register')}}" class="option-btn">login</a>
                    <a href="{{route('student.register')}}" class="option-btn">register</a>
                </div>
            </div>

            <a href="{{route('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
        </section>

    </header>
    <section class="form-container">

        <form action="{{route('login.student')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @error('errors')
            <div class="row mr-2 ml-2">
                <a  href="#" class="btn btn-lg btn-block btn-outline-danger mb-2"
                        id="type-error">{{$message}}
                </a>
            </div>
            @enderror

            {{-- Mac Address Message --}}
            @if (Session::has('mac'))
                <div class="row mr-2 ml-2">
                    <a href="#" style="background-color: #dc3545;" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">{{Session::get('mac')}}
                    </a>
                </div>
            @endif

            <h3>تسجيل الدخول</h3>
            <p>الأيميل <span>*</span></p>
            <input type="email" name="email" placeholder="ادخل الأيميل" required maxlength="50" class="box"
                   value="{{old('email')}}">

            <p>الباسورد <span>*</span></p>
            <input type="password" name="password" placeholder=" ادخل الباسورد " required maxlength="20"
                   class="box">

            <button type="submit" class="btn">دخول</button>
            <p id="emailHelp" class="form-text text-muted mt-2">ليس لديك حساب ؟ <a
                    href="{{route('student.register')}}">سجل الاّن</a></p>

        </form>

    </section>


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


    <!-- custom js file link  -->
    <script src="{{asset('js/script.js')}}"></script>

@endsection
