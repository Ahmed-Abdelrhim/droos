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
        <h1 class="heading">Quiz Secondary Second Year</h1>

        <div class="box-container" style="overflow-x:auto;">
            <table>
                {{--Start Table Head--}}
                <thead class="scroll-horizontal">
                <tr>
                    <th>course name </th>
                    <th>course month</th>
                    <th>week </th>
                    <th>link </th>
                    <th>Action</th>
                </tr>
                </thead>
                {{--End Table Head--}}
                {{--Start Table Head--}}
                <tbody>

                @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{$quiz['course']->name}}</td>
                        <td>{{$quiz->serial_number}}</td>
                        <td>{{$quiz->week}}</td>
                        <td><a href="{{$quiz->link}}">quiz link</a></td>
                        <td style="width: 130px; height: 30px">
                            <form action="{{route('delete.quiz.3rd',$quiz->id)}}" method="POST">
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

        <div class="custom-pagination"> {{$quizzes->links()}} </div>

    </section>
@endsection
