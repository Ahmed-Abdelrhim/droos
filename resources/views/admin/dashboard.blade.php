@extends('layouts.admin')
@section('content')
    <section class="courses">

        <h1 class="heading">Admin Dashboard</h1>

        <div class="box-container">

            <div class="box">
                <h3 class="title"><i class="fas fa-question"></i>جميع الطلاب </h3>
                <a href="#" class="inline-btn">1000</a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fas fa-question"></i>الطلاب المشتركين</h3>
                <a href="#" class="inline-btn">635</a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fas fa-question"></i> الطلاب في قائمة الانتظار</h3>
                <a href="#" class="inline-btn">54</a>
            </div>
        </div>

    </section>
</header>

@endsection

