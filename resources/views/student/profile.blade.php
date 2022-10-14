@extends('layouts.student')
@section('content')

    <section class="form-container">


        <form action="{{route('update.student.profile')}}" method="POST" enctype="multipart/form-data">
            {{-- Success Message --}}
            @if (Session::has('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">{{Session::get('success')}}
                    </button>
                </div>
            @endif


            @csrf
            <h3>Student Profile</h3>
            <p>الأسم <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" maxlength="50" class="box"
                   value="{{Auth::user()->name}}"
            >
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>الأيميل <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box"
                   value="{{Auth::user()->email}}"
            >
            @error('email')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>رقم هاتف الطالب <span>*</span></p>
            <input type="text" name="phone_number" placeholder="enter your phone number" maxlength="50" class="box"
                   value="{{Auth::user()->phone_number}}"
            >
            @error('phone_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

{{--            <p>رقم هاتف ولي الأمر <span>*</span></p>--}}
{{--            <input type="text" name="parent_number" placeholder="enter your parent phone number"--}}
{{--                   maxlength="50" class="box"--}}
{{--                   value="{{Auth::user()->parent_number}}"--}}
{{--            >--}}
            @error('parent_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror


            <p>الباسورد جديد <span>*</span></p>
            <input type="password" name="password" placeholder="enter your new password" maxlength="20" class="box">
            @error('password')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>تأكيد الباسورد <span>*</span></p>
            <input type="password" name="password_confirmation" placeholder="confirm your password" maxlength="20"
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
