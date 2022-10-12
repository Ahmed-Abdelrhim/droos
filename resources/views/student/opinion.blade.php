@extends('layouts.design')
@section('content')
    <header class="header">
        <!-- <img id="back-ground" src="{{asset('images/back-ground.png')}}"> -->
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
            </nav>
            <a href="{{route('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
        </section>
    </header>

    <h2 class="main-title">صفحة بيضاء اي خدمة</h2>

@endsection
