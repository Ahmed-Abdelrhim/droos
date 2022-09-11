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
                <a href="home.html" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a>
                <a href="about.html"><i class="fas fa-question"></i><span>من نحن</span></a>
                <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
                <a href="contact.html"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
            </nav>


            <div class="profile">
                <img src="images/pic-1.jpg" class="image" alt="">
                <h3 class="name">Welcome</h3>
                <p class="role">studen</p>
                <div class="flex-btn">
                    <a href="login.html" class="option-btn">login</a>
                    <a href="register.html" class="option-btn">register</a>
                </div>
            </div>

            <a href="home.html" class="logo"><img src="./images/logo.png"></a>
        </section>

    </header>
    <section class="form-container">

        <form action="" method="post" enctype="multipart/form-data">
            <h3>register now</h3>
            <p>your name <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box">
            <p>your email <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
            <p>your password <span>*</span></p>
            <input type="password" name="pass" placeholder="enter your password" required maxlength="20" class="box">
            <p>confirm password <span>*</span></p>
            <input type="password" name="c_pass" placeholder="confirm your password" required maxlength="20" class="box">
            <p>select profile <span>*</span></p>
            <input type="file" accept="image/*" required class="box">
            <input type="submit" value="register new" name="submit" class="btn">
        </form>

    </section>
@endsection
