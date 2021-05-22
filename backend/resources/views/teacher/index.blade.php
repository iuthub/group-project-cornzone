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
    @include('partials.header')

    <div id="teacher-quizzes" class="container mt-3">
        <div class="modal fade" id="copy-link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title page-name" id="copy-link">Share quiz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="input-title mb-1">Quiz link</h4>
                        <input id="link-input" type="text" class="app-input" placeholder="https://quizzes/1" readonly>

                        <p class="app-input-message mt-1">
                            Share this link with your students
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row page-name">
            <h2>All Quizzes</h2>
        </div>

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

                    <div class="col bottom">Questions: 10, Time limit: 15m</div>

                    <button quizId="1" class="bottom-info copy-button"><i class="fa fa-link" aria-hidden="true"></i> Copy link</button>
                </div>
            </div>
        </a>
    </div>

    <a href="/teacher/quiz/create" class="fab ripple">+</a>
@endsection
