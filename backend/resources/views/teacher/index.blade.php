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
<?php  use App\Http\Controllers\QuizController;
use Illuminate\Support\Carbon;
?>
@section('content')
    @include('partials.header')

    <div id="teacher-quizzes" class="container mt-3">
        <div class="modal fade" id="copy-link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
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
                        <input id="link-input" type="text" class="app-input" placeholder="https://quizify.uz/quizzes/1" readonly>

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
        <?php
        foreach ($quizzes as $quiz){
            $formattedDate = Carbon::parse($quiz['created_at'])->format("M d");
        ?>
        <a href="/teacher/quiz/<?=$quiz['id']?>">
            <div class="row quiz mt-3">
                <?php
                $currentQuizIndex = array_search($quiz, $quizzes);
                $needToDisplay = true;
                if ($currentQuizIndex > 0) {
                    $previousQuizIndex = $currentQuizIndex - 1;
                    $previousQuiz = $quizzes[$previousQuizIndex];

                    $currQuizDate = Carbon::parse($quiz['created_at'])->format("M d");
                    $prevQuizDate = Carbon::parse($previousQuiz['created_at'])->format("M d");

                    $needToDisplay = $prevQuizDate != $currQuizDate;
                }
                if ($needToDisplay){
                ?>
                <div class="date d-flex align-items-center">
                    <div class="col-auto">
                        <p><?=$formattedDate?></p>
                    </div>

                    <div class="col line"></div>
                </div>
                <?php
                }
                ?>
                <div class="body mt-3 d-flex flex-column align-items-center">
                    <div class="blue-decor"></div>

                    <div class="col top d-flex align-items-center">
                        <div class="quiz-number mr-2">Quiz <?=$quiz['id']?></div>
                        <div class="line"></div>
                        <div class="quiz-name ml-2"><?=$quiz['title']?></div>
                    </div>

                    <div class="col bottom">Questions: <?= QuizController::getQuestionsNumberByQuizId($quiz['id'])?>,
                        Time
                        limit: <?=$quiz['duration']?>m
                    </div>

                    <button quizId="<?= $quiz['id']?>" class="bottom-info copy-button"><i class="fa fa-link"
                                                                                          aria-hidden="true"></i>
                        Copy link
                    </button>
                </div>
            </div>
        </a>
        <?php }?>
    </div>

    <a href="/teacher/quiz/create" class="fab ripple">+</a>
@endsection
