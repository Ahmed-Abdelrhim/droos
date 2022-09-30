@extends('layouts.admin')
@section('content')
    <section class="form-container">

        <form action="{{route('update.admin.profile',Auth::guard('admin')->user()->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Teacher Profile</h3>
            <p>Name <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box"
                   value="{{Auth::guard('admin')->user()->name}}"
            >
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror
            <p>E-mail <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box"
                   value="{{Auth::guard('admin')->user()->email}}"
            >
            @error('email')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Phone Number <span>*</span></p>
            <input type="text" name="phone_number" placeholder="enter your phone number" maxlength="50" class="box"
                   value="{{Auth::guard('admin')->user()->phone_number}}"
            >
            @error('phone_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p> Password <span>*</span></p>
            <input type="password" name="password" placeholder="enter your new password" maxlength="20" class="box">
            @error('password')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p> Confirm Password <span>*</span></p>
            <input type="password" name="password_confirmation" placeholder="confirm your password"  maxlength="20"
                   class="box">
            @error('password_confirmation')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>أختر صورة البروفايل <span>*</span></p>
            <input type="file" class="box" name="avatar">
            <button type="submit" class="btn">تحديث</button>
        </form>

    </section>
@endsection
