@extends('layouts.admin')
@section('content')
    <section class="form-container">
        <form action="{{route('store.demo.videos')}}" method="POST" enctype="multipart/form-data">
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
            <input type="file" required class="box" name="demo">

            <p>Academic year <span>*</span></p>
            <select class="custom-select" name="academic_year" required id="academic_year">
                <option value="1">الصف الأول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي</option>
            </select>

            <button type="submit" class="btn " style="margin-top: 30px">submit</button>
        </form>

    </section>

@endsection
