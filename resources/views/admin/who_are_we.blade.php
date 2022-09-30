@extends('layouts.admin')
@section('content')
    <section class="form-container">
        <form action="{{route('store.who.are.we')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif

            <h3>Who Are We Page</h3>

            <p>Features <span>*</span></p>
            <textarea name="text" required class="box" style="height: 300px">
                @if(isset($text))
                    @foreach($text as $feat)
                        {{$feat->text}}
                    @endforeach
                @endif
            </textarea>
            @error('who_are_we')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror


            <button type="submit" class="btn " style="margin-top: 30px">submit</button>
        </form>

    </section>

@endsection
