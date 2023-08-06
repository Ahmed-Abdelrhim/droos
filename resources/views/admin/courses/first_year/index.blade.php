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
                            <h2 class="content-header-title float-start mb-0">Basic Card</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Card</a>
                                    </li>
                                    <li class="breadcrumb-item active">Basic Card
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
                <!-- Examples -->
                <section id="card-demo-example">
                    <div class="row match-height">
                        <!--  BEGIN: Course Cards -->
                        @foreach($courses as $course)
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$course->name}}</h4>
                                        <h6 class="card-subtitle text-muted">Last Update
                                            At : {{$course->updated_at->format('d-M-Y')}}</h6>
                                        <img class="img-fluid my-2"
                                             src="{{$course->getFirstMediaUrl('first_year_courses','cover')}}"
                                             alt="Card image cap"/>
                                         <p class="card-text"></p>
                                        <a href="{{route('edit.course.1st', encrypt($course->id))}}" class="card-link" style="color: #28a745; text-decoration : underline"> Edit Course </a>
                                        <a href="#" class="card-link" style="color: #dc3545; text-decoration : underline">Delete Course</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--  END: Course Cards -->
                    </div>
                </section>
                <!-- Examples -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection


{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
{{--<section class="courses">--}}

{{--   <h1 class="heading">كورسات الصف الأول الثانوي</h1>--}}

{{--   <div class="box-container">--}}


{{--    <div class="card-container" id="cards">--}}
{{--        @foreach($courses as $course)--}}
{{--            <div class="card">--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--                <div class="card-content">--}}
{{--                    <img src="{{asset('storage/courses_first_year/'.$course->cover)}}">--}}
{{--                    <h2>01</h2>--}}
{{--                    <h3>الصف الأول الثانوي</h3>--}}
{{--                    <p style="margin-top: 5px">{{$course->name}}</p>--}}
{{--                    <p style="margin-top: 5px">السعر : {{$course->price}}</p>--}}
{{--                    <a href="{{route('edit.course.1st',$course->id)}}" class="btn btn-primary" >edit course</a>--}}
{{--                    <form action="{{route('delete.course.1st',$course->id)}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <button class="btn btn-danger">delete course</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}

{{--    </div>--}}


{{--   </div>--}}


{{--</section>--}}

{{--@endsection--}}
