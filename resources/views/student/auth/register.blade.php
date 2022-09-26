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
                <a href="{{asset('home')}}" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a>
                <a href="{{asset('about')}}" class="active"><i class="fas fa-question"></i><span>من نحن</span></a>
                <a href="{{asset('courses')}}" class="active"><i class="fas fa-graduation-cap"></i><span>الكورسات</span></a>
                <a href="{{asset('contact')}}" class="active"><i class="fas fa-headset"></i><span>تواصل معنا</span></a>
            </nav>


            <div class="profile">
                <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">
                <h3 class="name">Welcome</h3>
                <p class="role">studen</p>
                <div class="flex-btn">
                    <a href="{{route('student.login')}}" class="option-btn">login</a>
                    <a href="{{route('student.register')}}" class="option-btn">register</a>
                </div>
            </div>

            <a href="{{asset('home')}}" class="logo"><img src="{{asset('images/msbah.png')}}"></a>
        </section>

    </header>
    <section class="form-container">

        <form action="{{route('store.student')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>سجل الاّن</h3>
            <p>أسم الطالب <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box">
            @error('name')
                <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror
            <p>الأيميل <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
            @error('email')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>رقم هاتف الطالب <span>*</span></p>
            <input type="text" name="phone_number" placeholder="enter your phone number" required maxlength="50"
                   class="box">
            @error('phone_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>رقم هاتف ولي الأمر <span>*</span></p>
            <input type="text" name="parent_number" placeholder="enter your parent phone number" required
                   maxlength="50" class="box">
            @error('parent_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>السنة الدراسية <span>*</span></p>
            <select class="custom-select" name="academic_year">
                <option value="1">الصف الأول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي</option>
            </select>
            @error('academic_year')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            {{--<input type="text" name="name" placeholder="enter your academic year" required maxlength="50" class="box">--}}

            <p>الباسورد <span>*</span></p>
            <input type="password" name="password" placeholder="enter your password" required maxlength="20" class="box">
            @error('password')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>تأكيد الباسورد <span>*</span></p>
            <input type="password" name="password_confirmation" placeholder="confirm your password" required maxlength="20"
                   class="box">
            @error('password_confirmation')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>أختر صورة البروفايل <span>*</span></p>
            <input type="file"  required class="box" name="avatar">
            <button type="submit" class="btn">تسجيل</button>
        </form>

    </section>

<!-- Start Footer -->
<footer class="footer">
    <div class="container">
        <div class="box">
            <a href="{{route('home')}}" class="logo"><img src="{{asset('images/logo.png')}}"></a>
            <ul class="social">
                <li>
                    <a href="#" class="facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="youtube">
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
                <li><a href="about.html">من نحن</a></li>
                <li><a href="contact.html">تواصل معنا</a></li>
                <li><a href="courses.html">الكورسات</a></li>
            </ul>
        </div>

        <div class="box">
            <div class="line">
                <i class="fas fa-map-marker-alt fa-fw"></i>
                <div class="info">مصر </div>
            </div>
            <div class="line">
                <i class="far fa-clock fa-fw"></i>
                <div class="info">24/7</div>
            </div>
            <div class="line">
                <i class="fas fa-phone-volume fa-fw"></i>
                <div class="info">+201149596478</div>
            </div>
        </div>
        <div class="box footer-gallery">
            <img src="{{asset('images/thumb-9.png')}}" alt="" />
            <img src="{{asset('images/thumb-8.png')}}" alt="" />
            <img src="{{asset('images/year-2.jpeg')}}" alt="" />
            <img src="{{asset('images/ph-1.jpg')}}" alt="" />
            <img src="{{asset('images/thumb-5.png')}}" alt="" />
            <img src="{{asset('images/thumb-4.png')}}" alt="" />
        </div>
    </div>
    <p class="copyright">Developed By <a href="#" class="fas fa-heart"></a> By Anas , Ahmed</p>
    &copy; copyright @ 2022 | all rights reserved!
</footer>

<!-- scroll top button  -->
<a href="#" class="top">
   <img src="images/scroll-top-img.png">
</a>
<!-- End Footer -->


<!-- custom js file link  -->
<script src="js/script.js"></script>

@endsection
