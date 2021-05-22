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

    <div id="student-index">
        <div class="modal fade" id="accept-quiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title page-name" id="accept-quiz">Accept quiz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="input-title mb-1">Quiz link</h4>
                        <input type="text" class="app-input" placeholder="E.g.: https://quizzes/1">

                        <p class="quiz-link-tip mt-1">
                            Contact your teacher to get a link to the quiz
                        </p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="app-raised-button ripple">Accept</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3 student-quizzes">
            <h2 class="page-name">Active quizzes</h2>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <a href="student/quizzes/active/1">
                        <div class="quiz">
                            <div class="date d-flex align-items-center"></div>
                            <div class="body mt-3 d-flex flex-column align-items-center">
                                <div class="quiz-name ml-2">Introduction to IT</div>
                                <div class="section">27.02.2021</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6">
                    <a href="student/quizzes/active/1">
                        <div class="quiz">
                            <div class="date d-flex align-items-center"></div>
                            <div class="body mt-3 d-flex flex-column align-items-center">
                                <div class="quiz-name ml-2">Introduction to IT</div>
                                <div class="section">27.02.2021</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="container mt-5 student-quizzes">
            <h2 class="page-name">Completed quizzes</h2>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <a href="student/quizzes/completed/1">
                        <div class="quiz">
                        <div class="date d-flex align-items-center"></div>
                        <div class="body mt-3 d-flex flex-column align-items-center">
                            <div class="quiz-name ml-2">Introduction to IT</div>
                            <div class="section">27.02.2021</div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-6">
                    <a href="student/quizzes/completed/1">
                        <div class="quiz">
                            <div class="date d-flex align-items-center"></div>
                            <div class="body mt-3 d-flex flex-column align-items-center">
                                <div class="quiz-name ml-2">Introduction to IT</div>
                                <div class="section">27.02.2021</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <button class="fab ripple" data-toggle="modal" data-target="#accept-quiz">+</button>
    </div>
@endsection


