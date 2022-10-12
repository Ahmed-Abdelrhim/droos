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
        <h1 class="heading">Students Messages</h1>
        <div class="box-container" style="overflow-x:auto;">
            <table>
                {{--Start Table Head--}}
                <thead class="scroll-horizontal">
                <tr>
                    <th>Message</th>
                    <th>Student Name</th>
                    <th>Student email</th>
                    <th>Student Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                {{--End Table Head--}}
                {{--Start Table Head--}}
                <tbody>
                @foreach($messages as $msg)
                    <tr>
                        <td>{{$msg->msg}}</td>
                        <td>{{$msg->name}}</td>
                        <td>{{$msg->email}}</td>
                        <td>{{$msg->phone_number}}</td>
                        <td style="width: 130px; height: 30px">
                            {{--<form action="{{route('reply.msg.form',$msg->id)}}" method="GET">--}}

                            <a href="{{route('reply.msg.form',$msg->id)}}" class="btn btn-primary" style="background-color: #007bff;border-color: #007bff">reply</a>
                            {{--</form>--}}
                            <form action="{{route('delete.msg',$msg->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" style="background-color: #dc3545;">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{$messages->links()}}
                {{--End Table Head--}}
            </table>
        </div>
    </section>
@endsection
