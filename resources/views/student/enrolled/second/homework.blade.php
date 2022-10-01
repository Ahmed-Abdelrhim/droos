@extends('layouts.student')
@section('content')
    @if(isset($homework))
        <section class="playlist-details">
        <div class="row">
            <div class="column">
                <div class="thumb">
                    <img src="{{asset('images/aab.png')}}" alt="not-found">
                    <a href="{{$homework}}" class="inline-btn"><i
                        style="margin-left:15px;" class="fas fa-book"></i>الدخول الي الواجب</a>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
