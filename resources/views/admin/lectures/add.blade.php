@extends('layouts.admin')
@section('content')
    <section class="form-container">
        <form action="{{route('store.new.lec')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif
            
            <h3>Add New Lecture </h3>

            <p>Upload Lecture <span>*</span></p>
            <input type="file"  required class="box" name="lec">


            <p>Lecture Name <span>*</span></p>
            <input type="text" name="name" placeholder="enter lec name" required class="box" value="{{old('name')}}">
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Academic year <span>*</span></p>
            <select class="custom-select" name="academic_year" required>
                <option value="1">الصف الأول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي</option>
            </select>

            <p>Lecture Month <span>*</span></p>
            <input type="number" name="month" placeholder="enter lec month " required maxlength="2" class="box" value="{{old('month')}}">
            @error('month')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Lecture Week <span>*</span></p>
            <select class="custom-select" name="week" required>
                <option value="1">week 1</option>
                <option value="2">week 2</option>
                <option value="3">week 3</option>
                <option value="3">week 4</option>
            </select>
            @error('week')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <button type="submit" class="btn " style="margin-top: 30px">submit</button>
        </form>

    </section>
@endsection
