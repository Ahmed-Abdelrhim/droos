@extends('layouts.admin')
@section('content')
    <section class="form-container">
        <form action="{{route('update.admin.profile',Auth::guard('admin')->user()->id)}}" method="POST" enctype="multipart/form-data">

            {{-- Success Message --}}
            @if (Session::has('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">{{Session::get('success')}}
                    </button>
                </div>
            @endif
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
            <input type="text" name="phone_number" placeholder="enter your phone number" maxlength="11" class="box"
                   value="{{Auth::guard('admin')->user()->phone_number}}"
            >
            @error('phone_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p> <span>*</span> Password <span> * </span> if you need to change it <span>*</span></p>
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

            <p> <span>*</span>Profile Picture <span> * </span> if you need to change it<span>*</span> </p>
            <input type="file" class="box" name="avatar">
            <button type="submit" class="btn">تحديث</button>
        </form>

    </section>
@endsection
