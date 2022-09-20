@extends('layouts.design')
@section('content')
    <section class="form-container">

        <form action="{{route('store.courses')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif

            <h3> أضافة كورس جديد </h3>
            <p>Course name <span>*</span></p>
            <input type="text" name="name" placeholder="أسم الكورس" required maxlength="50" class="box"
                   value="{{old('name')}}">

            <p>Academic year <span>*</span></p>
            <select class="custom-select" name="academic_year">
                <option value="1">الصف الأول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي</option>
            </select>

            <p>Course month <span>*</span></p>
            <input type="number" name="serial_number" placeholder="شهر الكورس" required maxlength="50" class="box"
                   value="{{old('serial_number')}}">

            <p>Course price <span>*</span></p>
            <input type="number" name="price" placeholder="سعر الكورس" required maxlength="50" class="box"
                   value="{{old('price')}}">

            <p>Course discount if exists<span>*</span></p>
            <input type="number" name="discount" placeholder="خصم علي الكورس اذ يوجد"  maxlength="50" class="box"
                   value="{{old('discount')}}">

            <p>Course cover<span>*</span></p>
            <input type="file" name="cover" placeholder="صورة كوفر الكورس" required maxlength="50" class="box">

            <button type="submit" class="btn">Submit</button>
        </form>

    </section>

@endsection
