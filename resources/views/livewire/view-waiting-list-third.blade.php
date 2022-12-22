<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <div class="box-container" style="overflow-x:auto;">
        <table>
            <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Phone</th>
                {{--<th>Student Parent Phone</th>--}}
                <th>Course Month</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allData as $data)
                <tr>
                    <td>{{$data['students']->name}}</td>
                    <td>{{$data['students']->email}}</td>
                    <td>{{$data['students']->phone_number}}</td>
                    {{-- <td>{{$data['students']->parent_number}}</td>--}}
                    <td>{{$data->serial_number}}</td>
                    <td style="width: 130px; height: 30px">
                        @livewire('admin-subscribe-course' , ['data_id' => $data->id ])
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    <div class="custom-pagination"> {{$allData->links()}} </div>

</div>
