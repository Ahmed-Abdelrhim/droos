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


    <section class="teachers">

        <h1 class="heading">expert teachers</h1>

        <form action="" method="post" class="search-tutor">
            <input type="text" name="search_box" placeholder="search tutors..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_tutor"></button>
        </form>

        <div class="box-container">

            <div class="box offer">
                <h3>become a tutor</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, itaque ipsam fuga ex et aliquam.</p>
                <a href="register.html" class="inline-btn">get started</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="images/pic-2.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>developer</span>
                    </div>
                </div>
                <p>total playlists : <span>4</span></p>
                <p>total videos : <span>18</span></p>
                <p>total likes : <span>1208</span></p>
                <a href="teacher_profile.html" class="inline-btn">view profile</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="images/pic-3.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>developer</span>
                    </div>
                </div>
                <p>total playlists : <span>4</span></p>
                <p>total videos : <span>18</span></p>
                <p>total likes : <span>1208</span></p>
                <a href="teacher_profile.html" class="inline-btn">view profile</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="images/pic-4.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>developer</span>
                    </div>
                </div>
                <p>total playlists : <span>4</span></p>
                <p>total videos : <span>18</span></p>
                <p>total likes : <span>1208</span></p>
                <a href="teacher_profile.html" class="inline-btn">view profile</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="images/pic-5.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>developer</span>
                    </div>
                </div>
                <p>total playlists : <span>4</span></p>
                <p>total videos : <span>18</span></p>
                <p>total likes : <span>1208</span></p>
                <a href="teacher_profile.html" class="inline-btn">view profile</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="images/pic-6.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>developer</span>
                    </div>
                </div>
                <p>total playlists : <span>4</span></p>
                <p>total videos : <span>18</span></p>
                <p>total likes : <span>1208</span></p>
                <a href="teacher_profile.html" class="inline-btn">view profile</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="images/pic-7.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>developer</span>
                    </div>
                </div>
                <p>total playlists : <span>4</span></p>
                <p>total videos : <span>18</span></p>
                <p>total likes : <span>1208</span></p>
                <a href="teacher_profile.html" class="inline-btn">view profile</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="images/pic-8.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>developer</span>
                    </div>
                </div>
                <p>total playlists : <span>4</span></p>
                <p>total videos : <span>18</span></p>
                <p>total likes : <span>1208</span></p>
                <a href="teacher_profile.html" class="inline-btn">view profile</a>
            </div>

        </div>

    </section>


    <footer class="footer">

        &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!

    </footer>

@endsection
