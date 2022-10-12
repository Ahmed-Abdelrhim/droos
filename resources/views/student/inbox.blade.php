@extends('layouts.student')
@section('content')
    <section class="form-container">
        <form action="{{route('contact')}}" method="GET" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif

            <h3>Reply Messages</h3>

            @if(isset($messages))
                @foreach($messages as $msg)
                    @if($msg->admin_reply != null)
                        <p>رسالتك <span>*</span></p>
                        <textarea disabled class="box" style="height: 150px">
                            {{$msg->msg}}
                        </textarea>
                        <p>رد م/علاءالدين <span>*</span></p>
                        <textarea disabled class="box" style="height: 150px">
                            {{$msg->admin_reply}}
                        </textarea>
                    @else
                        <p>رسالتك <span>*</span></p>
                        <textarea disabled class="box" style="height: 150px">
                            {{$msg->msg}}
                        </textarea>
                        <p>رد م/علاءالدين <span>*</span></p>
                        <textarea disabled class="box" style="height: 150px">
                        لا يوجد رد حتي الان
                    </textarea>
                    @endif

                @endforeach
                <button type="submit" class="btn " style="margin-top: 30px">اضافة رسالة جديده</button>
            @else
                <textarea disabled class="box" style="height: 100px">
                        لا توجد رسائل حتي الان
                    </textarea>
            @endif


        </form>

    </section>

@endsection
