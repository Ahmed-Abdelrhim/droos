@extends('layouts.design')
@section('content')
    <div class="container">
        @if(\Session::get('success'))
            <div class="row mr-2 ml-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{\Session::get('success')}}
                </button>
            </div>
        @endif
        <h1 class="display-1 mx-auto">All Students Secondary Second Year</h1>
        <div class="row">
            <table class="table table-dark" id="table_id">
                <thead>
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Student Phone</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$student->name}}</th>
                        <th scope="row">{{$student->email}}</th>
                        <th scope="row">{{$student->phone}}</th>
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
    </div>

@endsection


