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
                <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">
                <h3 class="name">Welcome</h3>
                <p class="role">studen</p>
                <div class="flex-btn">
                    <a href="login.html" class="option-btn">login</a>
                    <a href="register.html" class="option-btn">register</a>
                </div>
            </div>

            <a href="home.html" class="logo"><img src="{{asset('images/logo.png')}}"></a>
        </section>

    </header>



    <section class="contact">

        <div class="row">

            <div class="image">
                <img src="{{asset('images/contact-img.svg')}}" alt="">
            </div>

            <form action="" method="post">
                <h3>get in touch</h3>
                <input type="text" placeholder="enter your name" name="name" required maxlength="50" class="box">
                <input type="email" placeholder="enter your email" name="email" required maxlength="50" class="box">
                <input type="number" placeholder="enter your number" name="number" required maxlength="50" class="box">
                <textarea name="msg" class="box" placeholder="enter your message" required maxlength="1000" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="inline-btn" name="submit">
            </form>

        </div>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <a href="tel:1234567890">123-456-7890</a>
                <a href="tel:1112223333">111-222-3333</a>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email address</h3>
                <a href="mailto:shaikhanas@gmail.com">shaikhanas@gmail.come</a>
                <a href="mailto:anasbhai@gmail.com">anasbhai@gmail.come</a>
            </div>

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>office address</h3>
                <a href="#">flat no. 1, a-1 building, jogeshwari, mumbai, india - 400104</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!
    </footer>
@endsection