<div>
    <section class="form-container">
{{--        <form action="{{route('store.courses')}}" method="POST" enctype="multipart/form-data">--}}
        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <script>
                    swal({
                        text: " {!! Session::get('success') !!}",
                        icon: "success",
                    })
                </script>
            @endif

            @if(\Session::get('errors'))
                <script>
                    swal({
                        text: " {!! Session::get('errors') !!}",
                        icon: "error",
                    })
                </script>
            @endif

            <div class="progress">
                <div class="bar"><div class="percent"></div></div>
            </div>

            <h3> أضافة كورس جديد </h3>
            <p>Course name <span>*</span></p>
            <input type="text" name="name" placeholder="أسم الكورس" required maxlength="50" class="box"
                   wire:model="name">
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Academic year <span>*</span></p>
            <select class="custom-select" name="academic_year" wire:model="academi_year">
                <option value="1">الصف الأول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي</option>
            </select>

            <p>Course month <span>*</span></p>
            <input type="number" name="serial_number" placeholder="شهر الكورس" required maxlength="50" class="box"
                   wire:model="month">
            @error('serial_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Course price <span>*</span></p>
            <input type="number" name="price" placeholder="سعر الكورس" required maxlength="50" class="box"
                   wire:model="cost">
            @error('price')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Course discount if exists<span>*</span></p>
            <input type="number" name="discount" placeholder="خصم علي الكورس اذ يوجد"  maxlength="50" class="box"
                   wire:model="discount">
            @error('discount')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Course cover<span>*</span></p>
            <input type="file" name="cover" placeholder="صورة كوفر الكورس" maxlength="50" class="box" wire:model="cover">
            @error('cover')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <button type="submit" class="btn">Submit</button>
        </form>
    </section>
</div>
