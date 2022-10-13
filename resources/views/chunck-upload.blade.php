<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap5.min.css') }}" rel="stylesheet"/>

    <title>{{ config('app.name') }}</title>
</head>

<style>
    .card-footer, .progress {
        display: none;
    }
</style>

<body>

<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Upload File</h5>
                </div>

{{--                <p>Lecture Name <span>*</span></p>--}}
{{--                <input type="text" name="name" placeholder="enter lec name" class="box" value="{{old('name')}}">--}}
{{--                <small class="form-text form-danger" style="color: white; font-size: 15px;" id="name_error"></small>--}}

{{--                @error('name')--}}
{{--                <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--                @enderror--}}

{{--                <p>Academic year <span>*</span></p>--}}
{{--                <select class="custom-select" name="academic_year" required id="academic_year">--}}
{{--                    <option selected>...Choose</option>--}}
{{--                    <option value="1">الصف الأول الثانوي</option>--}}
{{--                    <option value="2">الصف الثاني الثانوي</option>--}}
{{--                    <option value="3">الصف الثالث الثانوي</option>--}}
{{--                </select>--}}
{{--                <small class="form-text form-danger" style="color: white; font-size: 15px;"--}}
{{--                       id="academic_year_error"></small>--}}


{{--                <p>Lecture Month <span>*</span></p>--}}
{{--                <select class="custom-select" name="month" id="month">--}}
{{--                </select>--}}
{{--                <small class="form-text form-danger" style="color: white; font-size: 15px;" id="month_error"></small>--}}

{{--                --}}{{--            <input type="number" name="month" placeholder="enter lec month " required maxlength="2" class="box"--}}
{{--                --}}{{--                   value="{{old('month')}}">--}}
{{--                --}}{{--            @error('month')--}}
{{--                --}}{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--                --}}{{--            @enderror--}}

{{--                <p>Lecture Week <span>*</span></p>--}}
{{--                <select class="custom-select" name="week" required>--}}
{{--                    <option value="1">week 1</option>--}}
{{--                    <option value="2">week 2</option>--}}
{{--                    <option value="3">week 3</option>--}}
{{--                    <option value="4">week 4</option>--}}
{{--                </select>--}}
{{--                <small class="form-text form-danger" style="color: white; font-size: 15px;" id="week_error"></small>--}}

{{--                @error('week')--}}
{{--                <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--                @enderror--}}

{{--                <p>Lecture HomeWork <span>*</span></p>--}}
{{--                <input type="text" name="homework" placeholder="enter lec homework link" class="box"--}}
{{--                       value="{{old('homework')}}">--}}
{{--                @error('homework')--}}
{{--                <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--                @enderror--}}

{{--                <p>Lecture Quiz <span>*</span></p>--}}
{{--                <input type="text" name="quiz" placeholder="enter lec quiz link " class="box" value="{{old('quiz')}}">--}}
{{--                @error('quiz')--}}
{{--                <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--                @enderror--}}




                <div class="card-body">
                    <div id="upload-container" class="text-center">
                        <button id="browseFile" class="btn btn-primary">Brows File</button>
                    </div>
                    <div class="progress mt-3" style="height: 25px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">
                            75%
                        </div>
                    </div>

                    <button class="btn btn-primary" id="submit">upload</button>
                </div>

                {{--                <div class="card-footer p-4" >--}}
                {{--                    <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
</div>



<!-- jQuery -->
{{--<script src="{{ asset('assets/js/jQuery.min.js') }}" ></script>--}}
<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<!-- Bootstrap JS Bundle with Popper -->
{{--<script src="{{ asset('assets/js/bootstrap5-bundle.min.js') }}" ></script>--}}
<!-- Resumable JS -->
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script type="text/javascript">
    // console.log('Ahmed Abdelrhim');
    let browseFile = $('#browseFile');
    let resumable = new Resumable({
        target: '{{ route('chunk.uploaded') }}',
        query: {_token: '{{ csrf_token() }}'},// CSRF token
        fileType: ['mp4'],
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });
    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        swal({
            text: " تم رفع الفديو بنجاح",
            icon: "success",
        })
        // response = JSON.parse(response)
        // $('#videoPreview').attr('src', response.path);
        // $('.card-footer').show();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    let progress = $('.progress');

    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }


    // $('#submit').on('click',function (){
    //     console.log('hey');
    //     $('#academic_year').on('change', function () {
    //         let id = $(this).val();
    //         $('#month').empty();
    //         // $('#month').append('<option value="0" disabled selected>processing ...</option>');
    //         $.ajax({
    //             type: 'GET',
    //             url: 'getCourseMonths/' + id,
    //             success: function (response) {
    //                 console.log(response);
    //                 response = JSON.parse(response);
    //                 $('#month').empty();
    //                 $('#month').append('<option value="0" disabled selected>select month</option>');
    //                 response.forEach(el => {
    //                     $('#month').append(`<option value="${el['id']}" >${el['name']}</option>`);
    //                 });
    //             }
    //         });
    //     });
    // });


</script>
</body>
</html>
