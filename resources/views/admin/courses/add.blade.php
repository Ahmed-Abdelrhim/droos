@extends('admin.frontend.app.master')
@section('main-content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Form Validation</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Courses</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Course
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row justify-content-center">
                        <!-- jQuery Validation -->
                        <div class="col-md-6 col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add New Course</h4>
                                </div>
                                <div class="card-body">
                                    <form id="jquery-val-form" method="post" action="{{route('store.courses')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control {{ $errors->has('name') ? " is-invalid " : '' }}" id="name" name="name" placeholder="Course Name" />
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-1">
                                            <label class="form-label" for="academic_year">Academic year</label>
                                            <select class="form-select select2" id="academic_year" name="academic_year">
                                                <option value="">Select Academic year</option>
                                                <option value="1">First Year</option>
                                                <option value="2">Second Year</option>
                                                <option value="3">Third Year</option>
                                            </select>
                                            @error('academic_year')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-1">
                                            <label class="form-label" for="serial_number">Course Month</label>
                                            <input class="form-control {{ $errors->has('serial_number') ? " is-invalid " : '' }}" id="serial_number" name="serial_number"></input>
                                            @error('serial_number')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-1">
                                            <label class="form-label" for="price">Course Price</label>
                                            <input class="form-control {{ $errors->has('price') ? " is-invalid " : '' }}" id="price" name="price"></input>
                                            @error('price')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-1">
                                            <label class="form-label" for="discount">Course Discount if exists </label>
                                            <input class="form-control {{ $errors->has('discount') ? " is-invalid " : '' }}" id="discount" name="discount"></input>
                                            @error('discount')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-1">
                                            <label for="customFile" class="form-label">Course pic</label>
                                            <input class="form-control  {{ $errors->has('cover') ? " is-invalid " : '' }}" type="file" id="customFile" name="cover" />
                                            @error('cover')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /jQuery Validation -->
                    </div>
                </section>
                <!-- /Validation -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

{{--@section('scripts')--}}
{{--    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>--}}

{{--    <script src="https://cdn.jsdelivr.net/gh/jquery-form/form@4.3.0/dist/jquery.form.min.js"--}}
{{--            integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">--}}
{{--    </script>--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"--}}
{{--            integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        $(document).ready(function () {--}}

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


{{--                    let progress = document.getElementsByClassName('progress');--}}
{{--                    if(percentComplete > '0%') {--}}
{{--                        progress.style.background = '#fff';--}}
{{--                    }--}}



{{--                    bar.width(percentVal);--}}
{{--                    percent.html(percentVal);--}}
{{--                },--}}

{{--                complete:function submitForm(form) {--}}
{{--                    swal({--}}
{{--                        text: " تم اضافة الكورس بنجاح",--}}
{{--                        icon: "success",--}}
{{--                    })--}}
{{--                },--}}
{{--            });--}}

{{--            // console.log('Ahmed Abdelrhim');--}}
{{--        });--}}
{{--    </script>--}}

{{--@endsection--}}



{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
{{--    <livewire:add-course />--}}

{{--    <section class="form-container">--}}
{{--        <form action="{{route('store.courses')}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            @if(\Session::get('success'))--}}
{{--                <div class="row mr-2 ml-2">--}}
{{--                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"--}}
{{--                            id="type-error">{{\Session::get('success')}}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="progress">--}}
{{--                <div class="bar"><div class="percent"></div></div>--}}
{{--            </div>--}}

{{--            <h3> أضافة كورس جديد </h3>--}}
{{--            <p>Course name <span>*</span></p>--}}
{{--            <input type="text" name="name" placeholder="أسم الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{old('name')}}">--}}
{{--            @error('name')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <p>Academic year <span>*</span></p>--}}
{{--            <select class="custom-select" name="academic_year">--}}
{{--                <option value="1">الصف الأول الثانوي</option>--}}
{{--                <option value="2">الصف الثاني الثانوي</option>--}}
{{--                <option value="3">الصف الثالث الثانوي</option>--}}
{{--            </select>--}}

{{--            <p>Course month <span>*</span></p>--}}
{{--            <input type="number" name="serial_number" placeholder="شهر الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{old('serial_number')}}">--}}
{{--            @error('serial_number')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <p>Course price <span>*</span></p>--}}
{{--            <input type="number" name="price" placeholder="سعر الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{old('price')}}">--}}
{{--            @error('price')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <p>Course discount if exists<span>*</span></p>--}}
{{--            <input type="number" name="discount" placeholder="خصم علي الكورس اذ يوجد"  maxlength="50" class="box"--}}
{{--                   value="{{old('discount')}}">--}}
{{--            @error('discount')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <p>Course cover<span>*</span></p>--}}
{{--            <input type="file" name="cover" placeholder="صورة كوفر الكورس" required maxlength="50" class="box">--}}
{{--            @error('cover')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <button type="submit" class="btn">Submit</button>--}}
{{--        </form>--}}
{{--    </section>--}}
{{--@endsection--}}



