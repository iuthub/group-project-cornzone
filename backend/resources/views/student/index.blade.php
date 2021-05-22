@extends('layouts.master')

@section('page-title')
    Student index
@endsection

@section("root-url")
    /student
@endsection

@section("logout-url")
    /login
@endsection

@section('content')
    @include('partials.header')

    <div class="container mt-3 student-quizzes">
        <h2>Active quizzes</h2>
        <div class="row page-name mt-3">
            <div class="col-lg-6">
                <div class="quiz">
                    <div class="date d-flex align-items-center"></div>
                    <div class="body mt-3 d-flex flex-column align-items-center">
                        <div class="quiz-name ml-2">Introduction to IT</div>
                        <div class="section">27.02.2021</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="quiz">
                    <div class="date d-flex align-items-center"></div>
                    <div class="body mt-3 d-flex flex-column align-items-center">
                        <div class="quiz-name ml-2">Introduction to IT</div>
                        <div class="section">27.02.2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5 student-quizzes">
        <h2>Completed quizzes</h2>
        <div class="row page-name mt-3">
            <div class="col-lg-6">
                <div class="quiz">
                    <div class="date d-flex align-items-center"></div>
                    <div class="body mt-3 d-flex flex-column align-items-center">
                        <div class="quiz-name ml-2">Introduction to IT</div>
                        <div class="section">27.02.2021</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="quiz">
                    <div class="date d-flex align-items-center"></div>
                    <div class="body mt-3 d-flex flex-column align-items-center">
                        <div class="quiz-name ml-2">Introduction to IT</div>
                        <div class="section">27.02.2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="fab ripple">+</button>
@endsection


