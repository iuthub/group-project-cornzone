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

@section("back-url")
    /student/sign-in
@endsection

@section('header')
    @include('partials.header')
@endsection

<?php
use Illuminate\Support\Carbon;
?>

@section('content')
    <div id="student-index">
        <form method="post" action="{{ route("acceptQuiz") }}">
            @csrf

            <div class="modal fade" id="accept-quiz" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <input
                                name="quizLink"
                                type="text"
                                class="app-input"
                                placeholder="E.g.: {{ env("QUIZ_LINK_TEMPLATE") }}/1">

                            <p class="app-input-message mt-1">
                                Contact your teacher to get a link to the quiz
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="app-raised-button ripple">Accept</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="container mt-3 student-quizzes">
            <h2 class="page-name">Active quizzes</h2>

            <div class="row mt-3">
                <?php if (count($activeQuizzes) == 0) { ?>
                    <h3 class="text-center page-name w-100">No active quizzes</h3>
                <?php } ?>

                <?php foreach ($activeQuizzes as $activeQuiz) { ?>
                    <div class="col-lg-6">
                        <a href="student/quizzes/active/<?=$activeQuiz->id?>">
                            <div class="quiz">
                                <div class="date d-flex align-items-center"></div>
                                <div class="body mt-3 d-flex flex-column align-items-center">
                                    <div class="quiz-name ml-2"><?=$activeQuiz->title?></div>
                                    <div class="bottom-info">{{ Carbon::parse($activeQuiz->created_at)->format("M d") }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="container mt-5 student-quizzes">
            <h2 class="page-name">Completed quizzes</h2>
            <div class="row mt-3">
            <?php if (count($completedQuizzes) == 0) { ?>
                <h3 class="text-center page-name w-100">No completed quizzes</h3>
            <?php } ?>

            <?php foreach ($completedQuizzes as $completedQuiz) { ?>
                <div class="col-lg-6">
                    <a href="student/quizzes/completed/<?=$completedQuiz->id?>">
                        <div class="quiz">
                            <div class="date d-flex align-items-center"></div>
                            <div class="body mt-3 d-flex flex-column align-items-center">
                                <div class="quiz-name ml-2"><?=$completedQuiz->title?></div>
                                <div class="bottom-info">{{ Carbon::parse($completedQuiz->created_at)->format("M d") }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>


        <button class="fab ripple" data-toggle="modal" data-target="#accept-quiz">+</button>
    </div>
@endsection


