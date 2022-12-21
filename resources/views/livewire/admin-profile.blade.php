<div>
    <section class="form-container">
{{--        <form action="{{route('update.admin.profile',Auth::guard('admin')->user()->id)}}" method="POST" enctype="multipart/form-data">--}}
        <form wire:submit.prevent="submit" enctype="multipart/form-data">

            {{-- Success Message --}}
            @if (Session::has('success'))
                <script>
                    swal({
                        text: " {!! Session::get('success') !!}",
                        icon: "success",
                    })
                </script>
            @endif

            {{-- Errors Message --}}
            @if (Session::has('errors'))
                <script>
                    swal({
                        text: " {!! Session::get('errors') !!}",
                        icon: "error",
                    })
                </script>
            @endif
            @csrf
            <h3>Teacher Profile</h3>
            <p>Name <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box"
            wire:model="name">
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>E-mail <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box"
                   wire:model="email"
            >
            @error('email')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Phone Number <span>*</span></p>
            <input type="text" name="phone_number" placeholder="enter your phone number" maxlength="11" class="box"
                   wire:model="phone"
            >
            @error('phone_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p> <span>*</span> Password <span> * </span> if you need to change it <span>*</span></p>
            <input type="password" name="password" placeholder="enter your new password" maxlength="20" class="box"
                   wire:model="password">
            @error('password')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p> Confirm Password <span>*</span></p>
            <input type="password" name="password_confirmation" placeholder="confirm your password"  maxlength="20"
                   class="box" wire:model="password_confirmation">
            @error('password_confirmation')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p> <span>*</span>Profile Picture <span> * </span> if you need to change it<span>*</span> </p>
            <input type="file" class="box" name="avatar" wire:model="avatar">
            <button type="submit" class="btn" >تحديث</button>
        </form>

    </section>
</div>
