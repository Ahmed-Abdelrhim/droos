@extends('layouts.admin')
@section('content')
    <style>

        .card-footer, .progress {
            display: none;
        }


        .form-container .form {
            background-color: var(--white);
            border-radius: .5rem;
            padding: 2rem;
            width: 50rem;
            box-shadow: 5px 5px 8px 5px #aaaaaa;
        }

        .contact .row .form h3 {
            margin-bottom: 1rem;
            text-transform: capitalize;
            color: var(--black);
            font-size: 2.5rem;
        }


        .form-container .form p {
            font-size: 1.7rem;
            color: var(--light-color);
            padding-top: 1rem;
        }

        .form-container .form p span {
            color: var(--red);
        }

        .form-container .form h3 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-transform: capitalize;
            color: var(--main-color);
            text-align: center;
        }

        .progress {
            position: relative;
            width: 100%;
            background-color: var(--black);
        }

        .bar {
            background-color: #237eb7;
            width: 0%;
            height: 20px;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }

        .compo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            color: #03a9f4;
            background-color: var(--light-bg);
            padding: 1rem;
            border-radius: 6px;
        }

        .copybtn i {
            font-size: 24px;
            background-color: var(--light-bg);
            color: var(--main-color);
            cursor: pointer;
        }
    </style>

    <section class="form-container">
        <div class="form">
            <div class="compo">
                <h1 id="video_name">انسخ اسم الفديو بعد الرفع</h1>
                <button class="copybtn"><i class="fa-regular fa-clipboard"></i></button>
            </div>
            <div class="container pt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3>Add New video </h3>
                            </div>
                            <div class="progress mt-3" style="height: 25px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bar"
                                     role="progressbar"
                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 0%; height: 100%">

                                </div>
                            </div>
                            <p>Choose a video to add<span>*</span></p>
                            <div class="card-body">
                                <div id="upload-container" class="text-center">
                                    <button id="browseFile" class="btn btn-primary">Brows File</button>
                                </div>
                                <p>Upload video <span>*</span></p>
                                <button class="btn btn-primary" id="submit">upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    {{--<script src="{{ asset('assets/js/bootstrap5-bundle.min.js') }}" ></script>--}}

    <!-- Resumable JS -->
{{--    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>--}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/resumable.js/1.0.3/resumable.min.js"
            integrity="sha512-OmtdY/NUD+0FF4ebU+B5sszC7gAomj26TfyUUq6191kbbtBZx0RJNqcpGg5mouTvUh7NI0cbU9PStfRl8uE/rw==" crossorigin="anonymous"
            referrerpolicy="no-referrer">
    </script>


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
            //    console.log(response);
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
            console.log(file);
            console.log(response);
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


        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("video_name");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

        }

    </script>
@endsection

