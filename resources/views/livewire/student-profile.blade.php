

    <section class="form-container">
        <form wire:submit.prevent="submit" enctype="multipart/form-data">

            {{-- Success Message --}}
            @if (Session::has('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">{{Session::get('success')}}
                    </button>
                </div>
            @endif

            {{-- Errors Message --}}
            @if (Session::has('errors'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">{{Session::get('errors')}}
                    </button>
                </div>
            @endif


            @csrf
            <h3>Student Profile</h3>
            <p>الأسم <span>*</span></p>
            <input type="text" placeholder="enter your name" maxlength="50" class="box"
                    wire:model="name">
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>الأيميل <span>*</span></p>
            <input type="email" placeholder="enter your email"  maxlength="50" class="box"
                   wire:model="email">
            @error('email')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>رقم الهاتف <span>*</span></p>
            <input type="text" placeholder="enter your phone number" maxlength="50" class="box"
                   wire:model="phone_number">
            @error('phone_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            {{--            <p>رقم هاتف ولي الأمر <span>*</span></p>--}}
            {{--            <input type="text" name="parent_number" placeholder="enter your parent phone number"--}}
            {{--                   maxlength="50" class="box"--}}
            {{--                   value="{{Auth::user()->parent_number}}"--}}
            {{--            >--}}
            {{--            @error('parent_number')--}}
            {{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
            {{--            @enderror--}}


            <p>الباسورد الجديد <span>*</span>اذا كنت تريد تغيره <span>*</span></p>
            <input type="password" name="password" placeholder="enter your new password" maxlength="20" class="box" wire:model="password">
            @error('password')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>تأكيد الباسورد الجديد <span>*</span></p>
            <input type="password" name="password_confirmation" placeholder="confirm your password" maxlength="20"
                   class="box" wire:model="password_confirmation">
            @error('password_confirmation')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p> أختر صورة البروفايل <span>*</span>اذا كنت تريد<span>*</span></p>
            <input type="file" class="box" name="image" wire:model="avatar">
            <button type="submit" class="btn">تحديث</button>
        </form>

    </section>
