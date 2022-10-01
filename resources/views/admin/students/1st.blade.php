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
        <h1 class="heading">All Students Secondary First Year</h1>

        <div class="box-container" style="overflow-x:auto;">
            <table>
                {{--Start Table Head--}}
                <thead class="scroll-horizontal">
                <tr>
                    <th>اسم الطالب</th>
                    <th>اميل الطالب</th>
                    <th>رقم التليفون</th>
                    <th>الاحداث</th>
                </tr>
                </thead>
                {{--End Table Head--}}
                {{--Start Table Head--}}
                <tbody>

                @foreach($students as $student)
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td style="width: 130px; height: 30px">
                            <form action="{{route('delete.student',$student->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" style="background-color: #dc3545;">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{--End Table Head--}}
        </table>
    </div>

    <div class="custom-pagination"> {{$students->links()}} </div>

    </section>
@endsection
