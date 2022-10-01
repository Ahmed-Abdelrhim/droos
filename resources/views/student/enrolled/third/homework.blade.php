@extends('layouts.student')
@section('content')
    @if(isset($homework))
        <section class="playlist-details">
        <div class="row">
            <div class="column">
                <div class="thumb">
                    <img src="{{asset('images/aab.png')}}" alt="not-found">
                    <a href="{{$homework}}" class="inline-btn" target="_blank"><i
                        style="margin-left:15px;" class="fas fa-book"></i>الدخول الي الواجب</a>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
@section('script')
    <script>
        var message = "This function has been disabled!";

        function clickIE4() {
            if (event.button == 2) {
                alert(message);
                return false;
            }
        }

        function clickNS4(e) {
            if (document.layers || document.getElementById && !document.all) {
                if (e.which == 2 || e.which == 3) {
                    alert(message);
                    return false;
                }
            }
        }

        if (document.layers) {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = clickNS4;
        } else if (document.all && !document.getElementById) {
            document.onmousedown = clickIE4;
        }

        document.oncontextmenu = new Function("alert(message);return false")

    </script>
@endsection

