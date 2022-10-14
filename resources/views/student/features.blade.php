@extends('layouts.student')
@section('content')
    <section class="about">

        <div class="row">

            <div class="image">
                <img src="{{asset('storage/images/about-img.svg')}}" alt="">
            </div>

            <div class="content">
                <h3>المميزات</h3>
                @if(isset($features))
                    @foreach($features as $feat)
                        <p>
                            {{$feat->text}}
                        </p>
                    @endforeach
                @endif

                <a href="
                @if(Auth::check())
                @if(Auth::user()->academic_year == 1) courses/1st/year
                @endif
                @if(Auth::user()->academic_year == 2) courses/2nd/year
                @endif
                @if(Auth::user()->academic_year == 3) courses/3rd/year
                @endif
                @else #
                @endif
                " class="inline-btn">our courses</a>
            </div>

        </div>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-graduation-cap"></i>
                <div>
                    <h3>+10k</h3>
                    <p>online courses</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-user-graduate"></i>
                <div>
                    <h3>+40k</h3>
                    <p>brilliant students</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-chalkboard-user"></i>
                <div>
                    <h3>+2k</h3>
                    <p>expert tutors</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-briefcase"></i>
                <div>
                    <h3>100%</h3>
                    <p>job placement</p>
                </div>
            </div>

        </div>

    </section>
@endsection
