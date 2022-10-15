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

        <h1 class="heading">Subscribed Third Year</h1>

        <div class="box-container" style="overflow-x:auto;">
            <table>
                <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Phone</th>
{{--                    <th>Student Parent Phone</th>--}}
                    <th>Course Month</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allData as $data)
                    <tr>
                        <th>{{$data['students']->name}}</th>
                        <th>{{$data['students']->email}}</th>
                        <th>{{$data['students']->phone_number}}</th>
{{--                        <th>{{$data['students']->parent_number}}</th>--}}
                        <th>{{$data->serial_number}}</th>
                        <td style="width: 130px; height: 30px">
{{--                            <form action="{{route('activate.waiting.3rd',$data->id)}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <button class="btn btn-primary" style="background-color: #007bff;border-color: #007bff">--}}
{{--                                    Activate--}}
{{--                                </button>--}}
{{--                            </form>--}}
                            <form action="{{route('delete.subscribed.3rd',$data->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" style="background-color: #dc3545;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            <div class="custom-pagination"> {{$allData->links()}} </div>

    </section>
@endsection


