@extends('admin.frontend.app.master')
@section('main-content')
    <!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Students First Year</h4>
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="user-list-table table" id="usersTable"  data-url="{{ route('students.datatables.1st') }}">
                                <thead class="table-light">
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- list and filter end -->
                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- END: Content-->
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
       $('#usersTable').DataTable({
            processing : true,
            serverSide : true,
            ajax : {
                url : $('#usersTable').attr('data-url'),
                // data : {status : status, requested : requests}
            },
            columns : [
                {data : 'id', name : 'id'},
                {data : 'name', name : 'name'},
                {data : 'email', name : 'email'},
                {data : 'phone_number', name : 'phone_number'},
                {data : 'created_at', name : 'created_at'},
                {data : 'action', name : 'action'},
            ],
            "ordering" : false
        });

    </script>
@endsection









{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
{{--    <section class="courses">--}}
{{--        @if(\Session::get('success'))--}}
{{--            <div class="row mr-2 ml-2">--}}
{{--                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"--}}
{{--                        id="type-error">{{\Session::get('success')}}--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <h1 class="heading">All Students Secondary First Year</h1>--}}

{{--        <div class="box-container" style="overflow-x:auto;">--}}
{{--            <table>--}}
{{--                --}}{{--Start Table Head--}}
{{--                <thead class="scroll-horizontal">--}}
{{--                <tr>--}}
{{--                    <th>اسم الطالب</th>--}}
{{--                    <th>اميل الطالب</th>--}}
{{--                    <th>رقم التليفون</th>--}}
{{--                    <th>الاحداث</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                --}}{{--End Table Head--}}
{{--                --}}{{--Start Table Head--}}
{{--                <tbody>--}}

{{--                @foreach($students as $student)--}}
{{--                    <tr>--}}
{{--                        <td>{{$student->name}}</td>--}}
{{--                        <td>{{$student->email}}</td>--}}
{{--                        <td>{{$student->phone_number}}</td>--}}
{{--                        <td style="width: 130px; height: 30px">--}}
{{--                            <form action="{{route('delete.student',$student->id)}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <button class="btn btn-danger" style="background-color: #dc3545;">delete</button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--            </tbody>--}}
{{--            --}}{{--End Table Head--}}
{{--        </table>--}}
{{--    </div>--}}

{{--    <div class="custom-pagination"> {{$students->links()}} </div>--}}

{{--    </section>--}}
{{--@endsection--}}
