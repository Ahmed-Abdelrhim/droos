@extends('layouts.admin')
@section('content')
    <section class="form-container">
        <form action="{{route('store.feature')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(\Session::get('success'))
                <div class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                            id="type-error">{{\Session::get('success')}}
                    </button>
                </div>
            @endif

            <h3>Add Website Feature</h3>

            <p>المميزات <span>*</span></p>
            <textarea name="feature" required class="box" style="height: 300px">
                @if(isset($features))
                    @foreach($features as $feat)
                        {{$feat->text}}
                    @endforeach
                @endif
            </textarea>
            @error('feature')
            <span class="text-danger" style="color: white">{{$message}}</span>
            @enderror


            <button type="submit" class="btn " style="margin-top: 30px">submit</button>
        </form>

    </section>

@endsection
