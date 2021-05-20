@extends('layouts.master')

@section('page-title')
    My quizzes
@endsection

@section("root-url")
    /teacher
@endsection

@section("logout-url")
    /login
@endsection

@section('content')
    @include('partials.teacher_header')

    <div class="container mt-3 teacher-quizzes">
        <div class="row page-name">
            <h2>All Quizes</h2>
        </div>

{{--        <div class="row spinner justify-content-center align-items-center" v-if="spinner">--}}
{{--            <img src="../images/spinner.svg" alt>--}}
{{--        </div>--}}

        <a href="/teacher/quiz/1">
            <div class="row quiz mt-3">
                <div class="date d-flex align-items-center">
                    <div class="col-auto">
                        <p>May 7</p>
                    </div>

                    <div class="col line"></div>
                </div>

                <div class="body mt-3 d-flex flex-column align-items-center">
                    <div class="blue-decor"></div>

                    <div class="col top d-flex align-items-center">
                        <div class="quiz-number mr-2">Quiz 1</div>
                        <div class="line"></div>
                        <div class="quiz-name ml-2">Introduction to IT</div>
                    </div>

                    <div class="col bottom">
                        Questions: 10, Time limit: 15m</div>

                    <div class="section">SEC 001</div>
                </div>
            </div>
        </a>
    </div>

    <a href="/teacher/quiz/create" class="fab ripple">+</a>
@endsection
