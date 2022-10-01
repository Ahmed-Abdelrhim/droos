@extends('layouts.student')
@section('content')
    @if(isset($quiz))
        <section class="playlist-details">
        <div class="row">
            <div class="column">
                <div class="thumb">
                    <img src="{{asset('images/ph-4.jpg')}}" alt="not-found">
                    <a href="{{$quiz}}" class="inline-btn"><i
                        style="margin-left:15px;" class="fas fa-clock"></i>الدخول الي الامتحان</a>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
