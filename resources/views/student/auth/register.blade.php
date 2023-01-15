<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>{{__('Register') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- CSS Libraries -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/ph.ico') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
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
            <a href="#" class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
            <a href="{{route('contact')}}" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
        </nav>


        <div class="profile">
            <img src="{{asset('storage/images/pic-1.jpg')}}" class="image" alt="">
            <h3 class="name">Welcome</h3>
            <p class="role">studen</p>
            <div class="flex-btn">
                <a href="{{route('login')}}" class="option-btn">login</a>
                <a href="{{route('student.register')}}" class="option-btn">register</a>
            </div>
        </div>

        <a href="{{asset('home')}}" class="logo"><img src="{{asset('storage/images/msbah.png')}}"></a>
    </section>
</header>


<div id="app ">
    <section class="section">
        <div class="container mt-5 ">
            <div class="row ">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mx-auto">
                    <div class="row">
                        <h5 class="mx-auto">Register To Play With Physics</h5>
                    </div>
                    <div class="login-brand">
                        <img src="{{asset('assets/reg.png')}}" alt="logo" width="100">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header ">
                            <h4 class="mx-auto">{{ __('Register') }}</h4>
                        </div>

                        @error('errors')
                        <div class="row mr-2 ml-2 mb-3 col-7 mx-auto">
                            <a href="#" class="btn btn-danger mb-2"
                               id="type-error">{{$message}}
                            </a>
                            <span class="invalid-feedback mb-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        </div>
                        @enderror

                        <div class="card-body">
                            <form method="POST" action="{{ route('login.student') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email , Phone</label><span class="text-danger"> *</span>
                                    <input id="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"/>
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




<script src="{{asset('js/script.js')}}"></script>

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
{{--                <a href="#" class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>--}}
{{--                <a href="{{route('contact')}}" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>--}}
{{--            </nav>--}}


{{--            <div class="profile">--}}
{{--                <img src="{{asset('storage/images/pic-1.jpg')}}" class="image" alt="">--}}
{{--                <h3 class="name">Welcome</h3>--}}
{{--                <p class="role">studen</p>--}}
{{--                <div class="flex-btn">--}}
{{--                    <a href="{{route('login')}}" class="option-btn">login</a>--}}
{{--                    <a href="{{route('student.register')}}" class="option-btn">register</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <a href="{{asset('home')}}" class="logo"><img src="{{asset('storage/images/msbah.png')}}"></a>--}}
{{--        </section>--}}
{{--    </header>--}}


{{--    <livewire:register />--}}
{{--@endsection--}}
