@extends('layouts.student')
@section('content')

    <section class="playlist-details">

        <h2 class="heading">فيديو : {{$lec->name}}</h2>

        <div class="row">

            <div class="column">
                <div class="thumb">
                    <video src="{{asset('lectures/third/'.$lec->lec)}}" controls poster="{{asset('images/courses_third_year/'.$lec['course']->cover)}}"
                           id="video"></video>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    <script language=JavaScript>
        var message="This function has been disabled!";

        ///////////////////////////////////

        function clickIE4(){

            if (event.button==2){

                alert(message);

                return false;

            }

        }

        function clickNS4(e){

            if (document.layers||document.getElementById&&!document.all){

                if (e.which==2||e.which==3){

                    alert(message);

                    return false;

                }

            }

        }

        if (document.layers){

            document.captureEvents(Event.MOUSEDOWN);

            document.onmousedown=clickNS4;

        }

        else if (document.all&&!document.getElementById){

            document.onmousedown=clickIE4;

        }
        document.oncontextmenu=new Function("alert(message);return false")

    </script>
@endsection

