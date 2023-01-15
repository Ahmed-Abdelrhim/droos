<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{__('Login') }}</title>
    <!-- General CSS Files -->
    {{--    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/dist/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- CSS Libraries -->
{{--    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/visitor.ico') }}">--}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/ph.ico') }}">
{{--    <img  src="{{ asset('assets/physics.jpg') }}" alt="physics">--}}
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{asset('assets/phy.png')}}" alt="logo" width="100">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ __('Login') }}</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email , Phone</label><span class="text-danger"> *</span>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}"/>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">{{ __('Password') }}</label><span
                                            class="text-danger"> *</span>
                                    </div>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"/>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Play With Physics
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>


{{--@extends('layouts.design')--}}
{{--@section('content')--}}
{{--    <header class="header">--}}
{{--        <section class="flex">--}}

{{--            <div class="icons">--}}
{{--                <div id="menu-bars" class="fas fa-bars"></div>--}}
{{--                <div id="toggle-btn" class="fas fa-sun"></div>--}}
{{--                <div id="user-btn" class="fas fa-user"></div>--}}
{{--            </div>--}}

{{--            <nav class="navbar">--}}
{{--                <a href="{{route('home')}}" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a>--}}
{{--                <a href="{{route('about')}}" class="active"><i class="fas fa-question"></i><span>من نحن</span></a>--}}
{{--                --}}{{--                <a href="#" class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>--}}
{{--                <a href="{{route('contact')}}" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>--}}
{{--            </nav>--}}

{{--            <div class="profile">--}}
{{--                <img src="{{asset('storage/images/pic-1.jpg')}}" class="image" alt="">--}}
{{--                <h3 class="name">Welcome</h3>--}}
{{--                <p class="role">studen</p>--}}
{{--                <div class="flex-btn">--}}
{{--                    <a href="{{route('student.register')}}" class="option-btn">login</a>--}}
{{--                    <a href="{{route('student.register')}}" class="option-btn">register</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <a href="{{route('home')}}" class="logo"><img src="{{asset('storage/images/msbah.png')}}"></a>--}}
{{--        </section>--}}

{{--    </header>--}}
{{--    <section class="form-container">--}}

{{--        <form action="{{route('login.student')}}" method="POST" enctype="multipart/form-data">--}}
{{--            --}}{{--@csrf--}}
{{--            {{ csrf_field() }}--}}
{{--            @error('errors')--}}
{{--            <div class="row mr-2 ml-2">--}}
{{--                <a href="#" class="btn btn-lg btn-block btn-outline-danger mb-2"--}}
{{--                   id="type-error">{{$message}}--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            @enderror--}}

{{--            --}}{{-- Mac Address Message --}}
{{--            @if (Session::has('mac'))--}}
{{--                <div class="row mr-2 ml-2">--}}
{{--                    <a href="#" style="background-color: #dc3545;" class="btn btn-lg btn-block btn-outline-success mb-2"--}}
{{--                       id="type-error">{{Session::get('mac')}}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <h3>تسجيل الدخول</h3>--}}
{{--            <p>الأيميل , رقم الهاتف <span>*</span></p>--}}
{{--            <input name="email" placeholder="ادخل الأيميل" required maxlength="50" class="box"--}}
{{--                   value="{{old('email')}}">--}}

{{--            <p>الباسورد <span>*</span></p>--}}
{{--            <input type="password" name="password" placeholder=" ادخل الباسورد " required maxlength="20"--}}
{{--                   class="box">--}}

{{--            <button type="submit" class="btn">دخول</button>--}}
{{--            <p id="emailHelp" class="form-text text-muted mt-2">ليس لديك حساب ؟ <a--}}
{{--                    href="{{route('student.register')}}">سجل الاّن</a></p>--}}

{{--        </form>--}}

{{--    </section>--}}


{{--    <!-- Start Footer -->--}}
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
{{--        <p class="copyright">Developed By <a href="https://www.facebook.com/ahmed.abdalraheem.739" class="fas fa-heart"--}}
{{--                                             target="_blank"></a>--}}
{{--            By--}}
{{--            <a href="https://www.facebook.com/ahmed.abdalraheem.739" target="_blank">Ahmed Abdelrhim</a> ,--}}
{{--            <a href="https://www.facebook.com/anas.rabea.35" target="_blank">Anas Rabea</a>--}}
{{--        </p>--}}
{{--        &copy; copyright @ 2022 | all rights reserved!--}}
{{--    </footer>--}}

{{--    <!-- scroll top button  -->--}}
{{--    <a href="#" class="top">--}}
{{--        <img src="{{asset('storage/images/scroll-top-img.png')}}">--}}
{{--    </a>--}}
{{--    <!-- End Footer -->--}}


{{--    <!-- custom js file link  -->--}}
{{--    <script src="{{asset('js/script.js')}}"></script>--}}

{{--@endsection--}}
