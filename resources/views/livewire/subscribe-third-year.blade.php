{{--<div>--}}
{{-- Care about people's approval and you will be their prisoner. --}}
{{--    <form action="{{route('subscribe.3rd',$course->id)}}" onsubmit="return submitForm(this);" method="POST">--}}

{{-- Errors Message --}}
@if (Session::has('subscription'))
    <script>
        swal({
            text: " {!! Session::get('subscription') !!}",
            icon: "success",
        })
    </script>
@endif



@if ($errorMsg)
    <script>
        swal({
            text: " {{$errorMsg}} ",
            icon: "error",
        })
    </script>
@endif

<form wire:submit.prevent="submit">
{{--     @csrf--}}
    <input type="submit" style="cursor: pointer"/>
{{--    <button type="submit" class="btn"> submit</button>--}}
</form>


{{--</div>--}}
