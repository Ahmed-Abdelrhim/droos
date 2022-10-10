@extends('layouts.admin')
@section('content')
    <section class="form-container">

        <form action="{{route('edit.course.3rd',$course->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif

            <div class="progress">
                <div class="bar"><div class="percent"></div></div>
            </div>

            @if(\Session::get('errors'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('errors')}}
                    </button>
                </div>
            @endif

            <h3>تعديل  {{$course->name}}   </h3>
            <p>Course name <span>*</span></p>
            <input type="text" name="name" placeholder="أسم الكورس" required maxlength="50" class="box"
                   value="{{$course->name}}">
            @error('name')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Course month <span>*</span></p>
            <input type="number" name="serial_number" placeholder="شهر الكورس" required maxlength="50" class="box"
                   value="{{$course->serial_number}}">
            @error('serial_number')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Course price <span>*</span></p>
            <input type="number" name="price" placeholder="سعر الكورس" required maxlength="50" class="box"
                   value="{{$course->price}}">
            @error('price')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Course discount if exists<span>*</span></p>
            <input type="number" name="discount" placeholder="خصم علي الكورس اذ يوجد"  maxlength="50" class="box"
                   >
            @error('discount')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <p>Course cover<span>*</span></p>
            <input type="file" name="cover" placeholder="صورة كوفر الكورس"  class="box">
            @error('cover')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror

            <button type="submit" class="btn">Submit</button>
        </form>

    </section>

@endsection

{{--@section('script')--}}
{{--    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>--}}
{{--    --}}{{--    <script src="https://cdn.jsdelivr.net/gh/jquery-form/form@4.3.0/dist/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>--}}

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('form').validate({--}}
{{--                rules: {--}}
{{--                    name: {--}}
{{--                        --}}
{{--                    },--}}
{{--                    name: {--}}
{{--                        --}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--            let bar = $('.bar');--}}
{{--            let percent = $('.percent');--}}
{{--            $('form').ajaxForm({--}}
{{--                beforeSend:function(){--}}
{{--                    let percentVal = '0%';--}}
{{--                    bar.width(percentVal);--}}
{{--                    percent.html(percentVal);--}}
{{--                },--}}

{{--                uploadProgress:function (event , position , total , percentComplete){--}}
{{--                    let percentVal = percentComplete+'%';--}}
{{--                    // let progress = document.getElementsByClassName('progress');--}}
{{--                    // if(percentComplete > '0%') {--}}
{{--                    //     progress.style.background = '#fff';--}}
{{--                    // }--}}
{{--                    bar.width(percentVal);--}}
{{--                    percent.html(percentVal);--}}
{{--                },--}}

{{--                complete:function submitForm(form , data) {--}}
{{--                    if(data.status == 0)--}}
{{--                    {--}}
{{--                        $.each(data.error , function (key , val) {--}}

{{--                        })--}}
{{--                    } else {--}}
{{--                        swal({--}}
{{--                            text: " تم تحديث الكورس بنجاح",--}}
{{--                            icon: "success",--}}
{{--                        })--}}
{{--                    }--}}
{{--                },--}}

{{--                // error: function(data) {--}}
{{--                //     // will display json of validation errors, which you'd loop through and display--}}
{{--                //     console.log(data);--}}
{{--                // }--}}
{{--            });--}}

{{--            // console.log('Ahmed Abdelrhim');--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

