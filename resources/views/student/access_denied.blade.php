@extends('layouts.design')
@section('content')
{{--    <div class="container">--}}
{{--        <img id="back-ground" src="{{asset('images/access-denied.jpg')}}">--}}
{{--        <div class="card" style="width: 18rem;">--}}
{{--            <img src="{{asset('images/access-denied.jpg')}}" class="card-img-top" alt="not-found">--}}
{{--            <div class="card-body">--}}
{{--                --}}{{-- <h5 class="card-title">Card title</h5>--}}
{{--                <p class="card-text">You Can Access Only Courses Of {{}} }Year </p>--}}
{{--                <a href="#" class="btn btn-primary">back</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="card-container" id="cards" style="background-color: white">
        <div class="card">
            <div class="card-content">
                <img src="{{asset('images/access-denied.jpg')}}">
                <h2>01</h2>
                <p style="font-weight: bold ; font-size: 22px">You Cant Access This Page</p>
                <p>You Can Access Only Courses Of {{$academic_year}} Year</p>

            </div>
        </div>

    </div>

@endsection
