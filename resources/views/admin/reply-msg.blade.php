@extends('layouts.admin')
@section('content')
    <section class="form-container">
        <form action="{{route('store.admin.msg',$msg->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif

            <h3>Reply Messages</h3>

            <p>student message <span>*</span></p>
            <textarea name="admin_msg" disabled class="box" style="height: 150px">
                {{$msg->msg}}
            </textarea>
            {{-- Admin Message  --}}
            <p>reply here<span>*</span></p>
            <textarea name="admin_reply" required class="box" style="height: 300px">
                @if($msg->admin_reply != null)
                    {{$msg->admin_reply}}
                @endif
            </textarea>
            @error('who_are_we')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror


            <button type="submit" class="btn " style="margin-top: 30px">submit</button>
        </form>

    </section>

@endsection
