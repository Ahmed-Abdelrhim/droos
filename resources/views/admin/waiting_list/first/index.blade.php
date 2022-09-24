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
        <h1 class="display-1 mx-auto">Waiting List Secondary First Year</h1>
        <div class="row">
            <table class="table table-dark" id="table_id">
                <thead>
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student email</th>
                    <th scope="col">Student phone</th>
                    <th scope="col">Course Month</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($student_names as $name)
                    <th>{{$name}}</th>
                @endforeach
                @foreach($student_emails as $email)
                    <th>{{$email}}</th>
                @endforeach
                @foreach($student_phones as $phone)
                    <th>{{$phone}}</th>
                @endforeach
                @foreach($allData as $data)
                    <tr>
                        {{--<th scope="row">{{$data->id}}</th>--}}
                        {{--<th>{{$data->student_id}}</th>--}}
                        <th scope="row">{{$data->serial_number}}</th>
                        <th style="width: 130px; height: 30px">
                            <form action="{{route('activate.waiting.1st',$data->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-primary" style="background-color: #007bff;border-color: #007bff">
                                    activate
                                </button>
                            </form>
                            <form action="{{route('delete.waiting.1st',$data->id)}}" method="POST">
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

{{--@push('javascript')--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function () {--}}
{{--        $('#table_id').DataTable({--}}
{{--            processing: true,--}}
{{--            serverSide: true,--}}
{{--             ajax: "{{route('waiting.list.1st')}}",--}}
{{--            columns: [--}}
{{--                {--}}
{{--                    data: 'id',--}}
{{--                    name: 'id'--}}
{{--                },--}}
{{--                {--}}
{{--                    data: 'student_id',--}}
{{--                    name: 'student_id'--}}
{{--                },--}}
{{--                {--}}
{{--                    data: 'serial_number',--}}
{{--                    name: 'serial_number',--}}
{{--                },--}}
{{--                {--}}
{{--                    data: 'action',--}}
{{--                    name: 'action',--}}
{{--                },--}}
{{--            ]--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
{{--@endpush--}}
