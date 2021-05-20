@extends('layouts.master')

@section('page-title')
    Quiz 1
@endsection

@section("root-url")
    /teacher
@endsection

@section("logout-url")
    /login
@endsection

@section('content')
    @include('partials.teacher_header')

    <div id="read-quiz-page" class="container mt-3 mb-5">
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

        <div class="pt-3">
            <div class="question-constructor mt-3">
                <div class="question-title d-flex justify-content-center align-items-center mb-3">
                    <div class="question-number">1</div>

                    Some question text
                </div>

                <div class="answers row">
                    <div class="col-6 pb-2">
                        <div class="answer">
                            A
                        </div>
                    </div>

                    <div class="col-6 pb-2">
                        <div class="answer correct">
                            B
                        </div>
                    </div>

                    <div class="col-6 pb-2">
                        <div class="answer">
                            C
                        </div>
                    </div>

                    <div class="col-6 pb-2">
                        <div class="answer">
                            D
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-constructor mt-3">
                <div class="question-title d-flex justify-content-center align-items-center mb-3">
                    <div class="question-number">2</div>

                    Some question text 2
                </div>

                <div class="answers row">
                    <div class="col-6 pb-2">
                        <div class="answer">
                            True
                        </div>
                    </div>

                    <div class="col-6 pb-2">
                        <div class="answer correct">
                            False
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
