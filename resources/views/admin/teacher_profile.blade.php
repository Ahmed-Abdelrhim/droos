@extends('layouts.admin')
@section('content')
    <section class="form-container">

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Teacher Profile</h3>
            <p>الأسم <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box">
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror
            <p>الأيميل <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
            @error('email')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>الباسورد جديد <span>*</span></p>
            <input type="password" name="password" placeholder="enter your new password" required maxlength="20" class="box">
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
            <button type="submit" class="btn">تحديث</button>
        </form>

    </section>
@endsection
