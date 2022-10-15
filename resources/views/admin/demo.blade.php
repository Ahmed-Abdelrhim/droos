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

            <div class="progress">
                <div class="bar">
                    <div class="percent" style="color:white;"></div>
                </div>
            </div>

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
@section('script')
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/jquery-form/form@4.3.0/dist/jquery.form.min.js"
            integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
            integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn"
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        // console.log('Ahmed Abdelrhim');
        let bar = $('.bar');
        let percent = $('.percent');
        $('form').ajaxForm({
            beforeSend: function () {
                let percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },

            uploadProgress: function (event, position, total, percentComplete) {
                console.log("postition :" + total)
                {
                    let percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                }
            },

            complete: function submitForm(data) {
                //console.log(data);
                if (data.status === 200) {
                    swal({
                        text: " تم رفع فديو ال demo بنجاح",
                        icon: "success",
                    })
                } else {
                    $.each(data['responseJSON']['errors'], function (index, value) {
                        console.log(index + '===>' + value);
                        $("#" + index + "_error").text(value);
                    });
                }

            },
        });

    </script>
@endsection

