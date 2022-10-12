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

    <h2 class="main-title" style="margin: 0 auto 0;"> اراء طلابنا </h2>
<section class="courses">

   <div class="box-container">

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.07.jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.08 (1).jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.08.jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.09.jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.10 (1).jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.10 (2).jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.10 (3).jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.10.jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.10.jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.12.jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.11 (3).jpeg')}}" alt="">
         </div>
      </div>

      <div class="box">
         <div class="thumb">
            <img style="height: fit-content;" src="{{asset('images/WhatsApp Image 2022-10-12 at 20.45.12 (1).jpeg')}}" alt="">
         </div>
      </div>

</section>

@endsection
