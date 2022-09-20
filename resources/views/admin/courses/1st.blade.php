{{--@extends('layouts.design')--}}
{{--@section('content')--}}
{{--    <section class="form-container">--}}

{{--        <form action="{{route('store.1st')}}" method="POST" >--}}
{{--            @csrf--}}
{{--            @if(\Session::get('message'))--}}
{{--                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                    <div class="alert-body">--}}
{{--                        {{ \Session::get('message') }}--}}
{{--                    </div>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <h3>كورسات أولي ثانوي</h3>--}}
{{--            <p>Course name <span>*</span></p>--}}
{{--            <input type="text" name="name" placeholder="أسم الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{old('name')}}">--}}

{{--            <p>Course month <span>*</span></p>--}}
{{--            <input type="number" name="serial_number" placeholder="شهر الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{old('serial_number')}}">--}}

{{--            <p>Course price <span>*</span></p>--}}
{{--            <input type="number" name="price" placeholder="سعر الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{old('price')}}">--}}

{{--            <p>Course discount if exists<span>*</span></p>--}}
{{--            <input type="text" name="discount" placeholder="خصم علي الكورس" required maxlength="50" class="box"--}}
{{--                   value="{{old('discount')}}">--}}

{{--            <button type="submit" class="btn">Submit</button>--}}
{{--        </form>--}}

{{--    </section>--}}

{{--@endsection--}}
