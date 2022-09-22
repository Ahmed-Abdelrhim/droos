@extends('layouts.design')
@section('content')
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
