<div>

    @if(Session::get('success'))
        <script>
            swal({
                // text : " !! Session::get('errors') !!",
                // icon: "success",
                text: "{!! Session::get('success') !!}",
                icon: "success",
            })
        </script>
    @endif


        @if($errorMsg)
            <script>
                swal({
                    text: "{{$errorMsg}}",
                    icon: "error",
                })
            </script>
        @endif

    {{-- The whole world belongs to you. --}}
    {{--    <form action="{{route('activate.waiting.3rd',$data->id)}}" method="POST">--}}
    <form wire:submit.prevent="accebt">
    {{--        @csrf--}}
        <button type="submit" class="btn btn-primary" style="background-color: #007bff;border-color: #007bff">
            Activate
        </button>
    </form>
    {{--    <form action="{{route('delete.waiting.3rd',$data->id)}}" method="POST">--}}
    <form  wire:submit.prevent="reject">
    {{--        @csrf--}}
        <button type="submit" class="btn btn-danger" style="background-color: #dc3545;">Delete</button>
    </form>
</div>
{{--                                  @livewire('admin-subscribe-course' , ['data_id' => $data->id ])
        --}}
