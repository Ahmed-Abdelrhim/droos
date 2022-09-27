@extends('layouts.admin')
@section('content')
    <section class="courses">
        @if(\Session::get('success'))
            <div class="row mr-2 ml-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{\Session::get('success')}}
                </button>
            </div>
        @endif

        <h1 class="heading">All Students Secondary Second Year</h1>

        <div class="box-container" style="overflow-x:auto;">
            <table>
                <thead>
                <tr>
                    <th>اسم الطالب</th>
                    <th>اميل الطالب</th>
                    <th>رقم التليفون</th>
                    <th>الاحداث</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <th>{{$student->name}}</th>
                        <th>{{$student->email}}</th>
                        <th>{{$student->phone}}</th>
                        <th style="width: 130px; height: 30px">
                            <form action="{{route('delete.student',$student->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" style="background-color: #dc3545;">delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
