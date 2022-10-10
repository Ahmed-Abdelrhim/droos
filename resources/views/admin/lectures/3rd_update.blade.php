@extends('layouts.admin')
@section('content')
{{--    JavaScript:void(); --}}
    <section class="form-container">
        <form action="{{route('update.lec.3rd',$lec->id)}}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif

            <h3>Update Lecture Third Year</h3>

            <p>Upload Lecture <span>*</span></p>
            <input type="file" required class="box" name="lec">


            <p>Lecture Name <span>*</span></p>
            <input type="text" name="name" placeholder="enter lec name" required class="box" value="{{old('name')}}"
                   value="{{$lec->name}}"
            >
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Lecture Week <span>*</span></p>
            <select class="custom-select" name="week" required>
                <option value="1">week 1</option>
                <option value="2">week 2</option>
                <option value="3">week 3</option>
                <option value="4">week 4</option>
            </select>
            @error('week')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Lecture HomeWork <span>*</span></p>
            <input type="text" name="homework" placeholder="enter lec homework link" class="box"
                   value="{{old('homework')}}"
                   value="@if($lec->homework != null) {{$lec->homework}}@endif"
            >
            @error('homework')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Lecture Quiz <span>*</span></p>
            <input type="text" name="quiz" placeholder="enter lec quiz link " class="box" value="{{old('quiz')}}"
                   value="@if($lec->quiz != null) {{$lec->quiz}}@endif"
            >
            @error('quiz')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <button type="submit" class="btn " style="margin-top: 30px">submit</button>
        </form>

    </section>

@endsection

