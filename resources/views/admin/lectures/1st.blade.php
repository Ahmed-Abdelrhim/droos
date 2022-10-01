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

        <h1 class="heading">Lectures First Year</h1>

        <div class="box-container" style="overflow-x:auto;">
            <table>
                <thead>
                <tr>
                    <th>Lecture Name</th>
                    <th>Lecture Month</th>
                    <th>Lecture Week</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allData as $data)
                    <tr>
                        <th>{{$data->name}}</th>
                        <th>{{$data->serial_number}}</th>
                        <th>{{$data->week}}</th>
                        <a href="{{route('update.lec.form.1st',$data->id)}}" class="btn btn-danger" style="background-color: #007bff;">update</a>
                        <td style="width: 130px; height: 30px">
                            <form action="{{route('delete.lec.1st',$data->id)}}" method="POST">
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
