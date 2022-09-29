@extends('layouts.admin')
@section('content')
    <section class="courses">

        <h1 class="heading">Admin Dashboard</h1>

        <div class="box-container">

            <div class="box">
                <h3 class="title"><i class="fas fa-users" style="color: #28a745;"></i>جميع الطلاب </h3>
                <a href="#" class="inline-btn">
                    {{\App\Models\User::count() }}
                </a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fas fa-user-graduate" style="color: #007bff"></i> المشتركين أولي ثانوي</h3>
                <a href="#" class="inline-btn">
                    {{\App\Models\SubscribedFirstYear::count() }}
                </a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fas fa-user-graduate" style="color: #007bff"></i> المشتركين ثانية ثانوي</h3>
                <a href="#" class="inline-btn">
                    {{\App\Models\SubscribedSecondYear::count() }}
                </a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fas fa-user-graduate" style="color: #007bff"></i> المشتركين ثالثة ثانوي</h3>
                <a href="#" class="inline-btn">
                    {{\App\Models\SubscribedThirdYear::count() }}
                </a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fa-solid fa-user" style="color: #dc3545"></i>قائمة الانتظار أولي ثانوي </h3>
                <a href="#" class="inline-btn">
                    {{\App\Models\WaitingListFirstYear::count() }}
                </a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fa-solid fa-user" style="color: #dc3545"></i> قائمة الانتظار ثانية ثانوي</h3>
                <a href="#" class="inline-btn">
                    {{\App\Models\WaitingListSecondtYear::count() }}
                </a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fa-solid fa-user" style="color: #dc3545"></i> قائمة الانتظار ثالثة ثانوي</h3>
                <a href="#" class="inline-btn">
                    {{\App\Models\WaitingListThirdYear::count() }}
                </a>
            </div>

            <div class="box">
                <h3 class="title"><i class="fa-solid fa-message" style="color: #007bff"></i> الرسائل </h3>
                <a href="#" class="inline-btn">
                    {{\App\Models\Message::count() }}
                </a>
            </div>

    </section>
    </header>

@endsection

