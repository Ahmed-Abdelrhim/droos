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
                    <th scope="col">id</th>
                    <th scope="col">student_id</th>
                    <th scope="col">serial_number</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allData as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <th>{{$data->student_id}}</th>
                        <th scope="row">{{$data->serial_number}}</th>
                        <th>
                            <form action="{{route('activate.waiting.1st',$data->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-primary" style="background-color: #dc3545;border-color: #dc3545">
                                    activate
                                </button>
                            </form>
                            <form action="{{route('delete.waiting.1st',$data->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" style="background-color: #007bff;">delete</button>
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

