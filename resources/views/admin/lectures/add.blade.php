@extends('layouts.admin')
@section('content')
    <section class="form-container">
        <form action="{{route('store.new.lec')}}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif



            <div class="progress">
                <div class="bar"><div class="percent"></div></div>
            </div>

            <h3>Add New Lecture </h3>

            <p>Upload Lecture <span>*</span></p>
            <input type="file" required class="box" name="lec">
            <small class="form-text form-danger" style="color: white; font-size: 15px;" id="lec_error"></small>


            <p>Lecture Name <span>*</span></p>
            <input type="text" name="name" placeholder="enter lec name"  class="box" value="{{old('name')}}">
            <small class="form-text form-danger" style="color: white; font-size: 15px;" id="name_error"></small>

            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Academic year <span>*</span></p>
            <select class="custom-select" name="academic_year" required id="academic_year">
                <option selected>...Choose</option>
                <option value="1">الصف الأول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي</option>
            </select>
            <small class="form-text form-danger" style="color: white; font-size: 15px;" id="academic_year_error"></small>


            <p>Lecture Month <span>*</span></p>
            <select class="custom-select" name="month" id="month">
            </select>
            <small class="form-text form-danger" style="color: white; font-size: 15px;" id="month_error"></small>

            {{--            <input type="number" name="month" placeholder="enter lec month " required maxlength="2" class="box"--}}
            {{--                   value="{{old('month')}}">--}}
            {{--            @error('month')--}}
            {{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
            {{--            @enderror--}}

            <p>Lecture Week <span>*</span></p>
            <select class="custom-select" name="week" required>
                <option value="1">week 1</option>
                <option value="2">week 2</option>
                <option value="3">week 3</option>
                <option value="4">week 4</option>
            </select>
            <small class="form-text form-danger" style="color: white; font-size: 15px;" id="week_error"></small>

            @error('week')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Lecture HomeWork <span>*</span></p>
            <input type="text" name="homework" placeholder="enter lec homework link" class="box" value="{{old('homework')}}">
            @error('homework')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Lecture Quiz <span>*</span></p>
            <input type="text" name="quiz" placeholder="enter lec quiz link " class="box" value="{{old('quiz')}}">
            @error('quiz')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <button type="submit" class="btn " style="margin-top: 30px">submit</button>
        </form>

    </section>

@endsection


@section('script')
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/jquery-form/form@4.3.0/dist/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            let bar = $('.bar');
            let percent = $('.percent');
            $('form').ajaxForm({
                beforeSend:function(){
                    let percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },

                uploadProgress:function (event , position , total , percentComplete){
                    console.log(event )
                    {
                        let percentVal = percentComplete+'%';
                        // let progress = document.getElementsByClassName('progress');
                        // if(percentComplete > '0%') {
                        //     progress.style.background = '#fff';
                        // }
                        bar.width(percentVal);
                        percent.html(percentVal);
                    }
                },

                complete:function submitForm(data) {
                    //console.log(data);
                    if(data.status === 200) {
                        swal({
                            text: " تم رفع الفديو بنجاح",
                            icon: "success",
                        })
                    } else {
                        // console.log(data['responseJSON']['errors'])
                        // data['responseJSON']['errors'].forEach(el => {
                        //     console.log(el['name'])
                        // });
                        $.each(data['responseJSON']['errors'], function(index, value) {
                            console.log(index + '===>' + value);
                            $("#"+ index +"_error").text(value);
                        });
                    }

                },
            });



            // console.log('Ahmed Abdelrhim');
            $('#academic_year').on('change', function () {
                let id = $(this).val();
                $('#month').empty();
                // $('#month').append('<option value="0" disabled selected>processing ...</option>');
                $.ajax({
                    type: 'GET',
                    url: 'getCourseMonths/' + id,
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


{{--@section('script')--}}
{{--    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>--}}
{{--    --}}{{--    <script src="https://cdn.jsdelivr.net/gh/jquery-form/form@4.3.0/dist/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>--}}

{{--    <script type="text/javascript">--}}
{{--        // console.log('Ahmed Abdelrhim');--}}
{{--        $('#academic_year').on('change', function () {--}}
{{--            let id = $(this).val();--}}
{{--            $('#month').empty();--}}
{{--            // $('#month').append('<option value="0" disabled selected>processing ...</option>');--}}
{{--            $.ajax({--}}
{{--                type: 'GET',--}}
{{--                url: 'getCourseMonths/' + id,--}}
{{--                success: function (response){--}}
{{--                    console.log(response);--}}
{{--                    response = JSON.parse(response);--}}
{{--                    $('#month').empty();--}}
{{--                    $('#month').append('<option value="0" disabled selected>select month</option>');--}}
{{--                    response.forEach(el => {--}}
{{--                        $('#month').append(`<option value="${el['id']}" >${el['name']}</option>`);--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        $(document).on('submit' , '#uploadForm' , function (e) {--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                xhr:function (){--}}
{{--                    let xhr = new XMLHttpRequest();--}}
{{--                    xhr.upload.addEventListener('progress',function (evt){--}}
{{--                        if(evt.lengthComputable) {--}}
{{--                            let percentComplete = evt.loaded / evt.total;--}}
{{--                            percentComplete = parseInt(percentComplete*100);--}}
{{--                            $('.bar').width(percentComplete+'%');--}}
{{--                            $('.percent').html(percentComplete+'%');--}}


{{--                        }--}}
{{--                    },false);--}}
{{--                    return xhr;--}}
{{--                },--}}

{{--                url : {{route('store.new.lec')}},--}}
{{--                type: 'POST',--}}
{{--                data : new FormData(this),--}}
{{--                contentType: false,--}}
{{--                cache: false,--}}
{{--                processData: false,--}}
{{--                success:function (data){--}}
{{--                    let json = json.parse(data);--}}
{{--                    status = json.status;--}}
{{--                    if(status == 'success') {--}}
{{--                        swal({--}}
{{--                            text: " تم رفع الفديو بنجاح",--}}
{{--                            icon: "success",--}}
{{--                        })--}}
{{--                    } else {--}}
{{--                        $('$successMSG').html('Upload Failed');--}}
{{--                    }--}}
{{--                },--}}

{{--            });--}}



{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

