<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>{{ config('app.name') }}</title>
</head>

<style>
    /* .card-footer, .progress {
        display: none;
    } */

    .progress {
        position: relative;
        width: 100%;
        /* background-color: #c9cfc9; */
    }

    .bar {
        background-color: #237eb7;
        width: 0%;
        height: 20px;
    }

    .copy {
        color: #03a9f4;
        border-color: #03a9f4;
        background: linear-gradient(to right, #03a9f4 50%, white 50%);
        background-size: 200% 100%;
        background-position: right bottom;
    }

    .copy {
        background-position: left bottom;
        color: white;
    }

</style>

<body>


<section class="form-container" style="width: 50%;">

    <div class="form">
        <div>
            <h1 id="video_name"></h1>
            <button class="copybtn copy">Copy</button>
        </div>

        <div class="container pt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Add New video </h3>
                        </div>

                        <div class="progress mt-3" style="height: 25px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bar" role="progressbar"
                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 0%; height: 100%; color: white">

                            </div>
                        </div>

                        {{-- <p>Choose a video to add<span>*</span></p>--}}
                        <div class="card-body">
                            <div id="upload-container" class="text-center">
                                {{--<button id="browseFile" class="btn btn-primary">Brows File</button>--}}
                                <input type="file" id="browseFile">
                            </div>

                            <p>Upload video <span>*</span></p>
                            <button class="btn btn-primary" id="submit" style="width: 50%; margin-left: 25%;">upload
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

</section>


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
    let name = $('#name').val();
    let academic_year = $('#academic_year').val();
    let month = $('#month').val();
    let week = $('#week').val();
    let homework = $('#homework').val();
    let quiz = $('#quiz').val();
    let browseFile = $('#browseFile');
    let resumable = new Resumable({
        {{--target: '{{ route('chunk.uploaded',['name'=> , 'academic_year'=> academic_year, 'month' => month,--}}
            {{--        'week' => week, 'homework' => homework, 'quiz' => quiz]) }}',--}}
        target: '{{route('chunk.uploaded')}}',
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
        $('#submit').on('click', function (e) {
            showProgress();
            resumable.upload() // to actually start uploading.
        });
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        {{--$.ajax({--}}
        {{--    url: "{{ route('post.post')}}",--}}
        {{--    method: 'POST',--}}
        {{--    data: {--}}
        {{--        "_token": "{{ csrf_token() }}",--}}
        {{--    },--}}
        {{--    success: function (result) {--}}
        {{--        swal({--}}
        {{--            text: " تم رفع الفديو بنجاح",--}}
        {{--            icon: "success",--}}
        {{--        })--}}
        {{--    },--}}
        {{--    error: function(data){--}}
        {{--        var errors = data.responseJSON;--}}

        {{--        console.log(errors)--}}
        {{--    },--}}
        {{--});--}}
        //     console.log(file);

        response = JSON.parse(response)
        console.log(response);
        $('#video_name').text(response.filename);

        swal({
            text: " تم رفع الفديو بنجاح",
            icon: "success",
        })
        //$('#videoPreview').attr('src', response.path);
        //$('.card-footer').show();
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

    var copyTextareaBtn = document.querySelector('.copybtn');

    copyTextareaBtn.addEventListener('click', function (event) {
        var copy_text = document.getElementsByTagName("h1")[0];
        var range = document.createRange();
        range.selectNode(copy_text);
        window.getSelection().addRange(range);

    });

</script>
</body>
</html>

