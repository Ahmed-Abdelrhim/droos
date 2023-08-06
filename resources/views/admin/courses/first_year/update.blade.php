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
                            <h2 class="content-header-title float-start mb-0">First Year Courses Page</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('teacher.profile')}}">First Year Courses</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{route('teacher.profile')}}">Edit</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                                            href="app-todo.html"><i class="me-1"
                                                                                                    data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item"
                                                                               href="app-chat.html"><i class="me-1"
                                                                                                       data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item"
                                                                               href="app-email.html"><i class="me-1"
                                                                                                        data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item"
                                                                                href="app-calendar.html"><i class="me-1"
                                                                                                            data-feather="calendar"></i><span
                                        class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Course {{$course->name}}</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" method="post"
                                          action="{{route('update.course.1st', $course->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-icon">Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i
                                                                data-feather="user"></i></span>
                                                        <input type="text" id="first-name-icon" class="form-control"
                                                               name="name" placeholder="First Name" value="{{$course->name}}"/>
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="serial_number">Course Month</label>
                                                    <input class="form-control
                                                    {{ $errors->has('serial_number') ? " is-invalid " : '' }}" id="serial_number"
                                                           name="serial_number" value="{{$course->serial_number}}" ></input>
                                                    @error('serial_number')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="price">Course Price</label>
                                                    <input class="form-control
                                                    {{ $errors->has('price') ? " is-invalid " : '' }}" id="price" name="price"
                                                           value="{{$course->price}}" ></input>
                                                    @error('price')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="discount">
                                                        Course Discount
                                                        <span style="color:red;"> * </span> If Exists <span style="color:red"> * </span>
                                                    </label>
                                                    <input class="form-control
                                                    {{ $errors->has('discount') ? " is-invalid " : '' }}" id="discount" name="discount"
                                                           value="{{$course->discount}}"></input>
                                                    @error('discount')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label for="customFile" class="form-label">
                                                        Course pic
                                                        <span style="color:red;"> * </span> If Needed <span style="color:red"> * </span>
                                                    </label>
                                                    <input class="form-control  {{ $errors->has('cover') ? " is-invalid " : '' }}" type="file" id="customFile" name="cover" />
                                                    @error('cover')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection


{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
{{--    <section class="form-container">--}}

{{--        <form action="{{route('edit.course.1st',$course->id)}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            @if(\Session::get('success'))--}}
{{--                <div class="row mr-2 ml-2">--}}
{{--                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"--}}
{{--                            id="type-error">{{\Session::get('success')}}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="progress">--}}
{{--                <div class="bar"><div class="percent"></div></div>--}}
{{--            </div>--}}

{{--            @if(\Session::get('errors'))--}}
{{--                <div class="row mr-2 ml-2">--}}
{{--                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"--}}
{{--                            id="type-error">{{\Session::get('errors')}}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <h3>تعديل  {{$course->name}}   </h3>--}}
{{--            <p>Course name <span>*</span></p>--}}
{{--            <input type="text" name="name" placeholder="أسم الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{$course->name}}">--}}
{{--            @error('name')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <p>Course month <span>*</span></p>--}}
{{--            <input type="number" name="serial_number" placeholder="شهر الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{$course->serial_number}}">--}}
{{--            @error('serial_number')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <p>Course price <span>*</span></p>--}}
{{--            <input type="number" name="price" placeholder="سعر الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{$course->price}}">--}}
{{--            @error('price')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <p>Course discount if exists<span>*</span></p>--}}
{{--            <input type="number" name="discount" placeholder="خصم علي الكورس اذ يوجد"  maxlength="50" class="box"--}}
{{--                   >--}}
{{--            @error('discount')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <p>Course cover<span>*</span></p>--}}
{{--            <input type="file" name="cover" placeholder="صورة كوفر الكورس"  class="box">--}}
{{--            @error('cover')--}}
{{--            <span class="text-danger" style="color: white">{{$message}}</span>--}}
{{--            @enderror--}}

{{--            <button type="submit" class="btn">Submit</button>--}}
{{--        </form>--}}

{{--    </section>--}}
{{--@endsection--}}

{{--@section('script')--}}
{{--    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>--}}
{{--    --}}{{----}}{{--    <script src="https://cdn.jsdelivr.net/gh/jquery-form/form@4.3.0/dist/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>--}}

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
{{--                    // let progress = document.getElementsByClassName('progress');--}}
{{--                    // if(percentComplete > '0%') {--}}
{{--                    //     progress.style.background = '#fff';--}}
{{--                    // }--}}
{{--                    bar.width(percentVal);--}}
{{--                    percent.html(percentVal);--}}
{{--                },--}}

{{--                complete:function submitForm(form) {--}}
{{--                    swal({--}}
{{--                        text: " تم تحديث الكورس بنجاح",--}}
{{--                        icon: "success",--}}
{{--                    })--}}
{{--                },--}}
{{--            });--}}

{{--            // console.log('Ahmed Abdelrhim');--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

