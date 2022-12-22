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

        <h1 class="heading">Waiting List Secondary Third Year</h1>

            @livewire('view-waiting-list-third')


            {{--        <div class="box-container" style="overflow-x:auto;">--}}
{{--            <table>--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Student Name</th>--}}
{{--                    <th>Student Email</th>--}}
{{--                    <th>Student Phone</th>--}}
{{--                    --}}{{--<th>Student Parent Phone</th>--}}
{{--                    <th>Course Month</th>--}}
{{--                    <th>Actions</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($allData as $data)--}}
{{--                    <tr>--}}
{{--                        <td>{{$data['students']->name}}</td>--}}
{{--                        <td>{{$data['students']->email}}</td>--}}
{{--                        <td>{{$data['students']->phone_number}}</td>--}}
{{--                        --}}{{-- <td>{{$data['students']->parent_number}}</td>--}}
{{--                        <td>{{$data->serial_number}}</td>--}}
{{--                        <td style="width: 130px; height: 30px">--}}
{{--                            @livewire('admin-subscribe-course' , ['data_id' => $data->id ])--}}
{{--                                    --}}{{--   start form comment                        <form action="{{route('activate.waiting.3rd',$data->id)}}" method="POST">--}}
{{--                                    --}}{{--                                @csrf--}}
{{--                                    --}}{{--                                <button class="btn btn-primary" style="background-color: #007bff;border-color: #007bff">--}}
{{--                                    --}}{{--                                    Activate--}}
{{--                                    --}}{{--                                </button>--}}
{{--                                    --}}{{--                            </form>--}}
{{--                                    --}}{{--                            <form action="{{route('delete.waiting.3rd',$data->id)}}" method="POST">--}}
{{--                                    --}}{{--                                @csrf--}}
{{--                                    --}}{{--                                <button class="btn btn-danger" style="background-color: #dc3545;">Delete</button>--}}
{{--                                    --}}{{--      end form comment                      </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}

{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--        <div class="custom-pagination"> {{$allData->links()}} </div>--}}

    </section>
@endsection
