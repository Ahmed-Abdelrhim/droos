@extends('layouts.student')
@section('content')
    @if(isset($homework))
        {{$homework}}
    @endif
@endsection
