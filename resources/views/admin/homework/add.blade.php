@extends('layouts.admin')
@section('content')
    <section class="form-container">
        <form action="{{route('store.new.homework')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif

            <h3>Add New HomeWork </h3>

{{--            <p>Upload Lecture <span>*</span></p>--}}
{{--            <input type="file" required class="box" name="lec">--}}


            <p>HomeWork Link <span>*</span></p>
            <input type="text" name="link" placeholder="enter homework link" required class="box" value="{{old('link')}}">
            @error('link')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Academic year <span>*</span></p>
            <select class="custom-select" name="academic_year" required id="academic_year">
                <option selected>...Choose</option>
                <option value="1">الصف الأول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي</option>
            </select>

            <p>Lecture Month <span>*</span></p>
            <select class="custom-select" name="course_id" id="month">
            </select>


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

            <button type="submit" class="btn " style="margin-top: 30px">submit</button>
        </form>

    </section>

@endsection
@section('script')
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function () {
            console.log('Ahmed Abdelrhim');
            $('#academic_year').on('change', function () {
                let id = $(this).val();
                $('#month').empty();
                // $('#month').append('<option value="0" disabled selected>processing ...</option>');
                $.ajax({
                    type: 'GET',
                    url: 'get/course/months/' + id ,
                    success: function (response){
                        console.log(response);
                        response = JSON.parse(response);
                        $('#month').empty();
                        $('#month').append('<option value="0" disabled selected>select month</option>');
                        response.forEach(el => {
                            $('#month').append(`<option value="${el['id']}" >${el['name']}</option>`);
                        });
                    }
                });
            });
        });
    </script>
@endsection
