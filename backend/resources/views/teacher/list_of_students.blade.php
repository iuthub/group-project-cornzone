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

    <div id="list-of-students" class="container mt-3 mb-5">
        <div class="row page-name">
            <div class="col">
                <h2>Quiz 1</h2>
            </div>
        </div>

        <div class="quiz-info">
            <div class="date">
                15.05.2021
            </div>
            <div class="duration">
                10 minutes
            </div>
        </div>

        <table class="content-table">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Points</th>
                <th></th>
            </tr>

            </thead>

            <tr>
                <td>Nicole Streisland</td>
                <td>nicolest@gmail.com</td>
                <td>25</td>
                <td>
                    <a href="/teacher/quiz/1/results/1" class="app-raised-button violet">
                        See
                        <span class="button__icon">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </span>
                    </a>
                </td>
            </tr>

            <tr>
                <td>Nicole Streisland</td>
                <td>nicolest@gmail.com</td>
                <td>25</td>
                <td>
                    <a href="/teacher/quiz/1/results/1" class="app-raised-button violet">
                        See
                        <span class="button__icon">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </span>
                    </a>
                </td>
            </tr>
        </table>
    </div>
@endsection
