@extends('layouts.master')

@section('page-title')
    {{ $quiz->title }}
@endsection

@section("root-url")
    /student
@endsection

@section("logout-url")
    /login
@endsection

@section('content')
    @include('partials.header')

    <div id="take-quiz">
        <div class="container">
            <div class="text-center my-5">
                <h2 class="page-name">{{ $quiz->title }}</h2>
                <p class='mt-2'>{{ $quiz->duration }} minutes | Questions {{ count($questions) }} </p>

                <form id="quiz-form" method="post" action="{{ route("takeQuiz", ["id" => $quiz->id]) }}">
                    @csrf

                    <?php $index = 1 ?>
                    <?php foreach ($questions as $question) { ?>
                        <div class="question-constructor mt-3" questionId="{{ $question["info"]->id }}">

                        <div class="question-title d-flex justify-content-center align-items-center mb-3">
                            <div class="question-number">{{ $index }}</div>
                            {{ $question["info"]->question }}
                        </div>

                        <div class="answers row">
                            <?php if ($question["info"]->question_type_id == 1) { ?>
                                <div class="col-12 pb-2">
                                    <div class="answer">
                                        <input placeholder="Enter your answer here" type="text" class="app-input text-center">
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($question["info"]->question_type_id == 2) { ?>
                                <div class="col-6 pb-2">
                                    <div class="answer pointer">
                                        True
                                    </div>
                                </div>

                                <div class="col-6 pb-2">
                                    <div class="answer pointer">
                                        False
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($question["info"]->question_type_id == 3) { ?>
                                <?php foreach ($question["answerOptions"] as $option) { ?>
                                    <div class="col-6 pb-2">
                                        <div class="answer pointer">
                                            {{ $option->text }}
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php $index = $index + 1 ?>
                    <?php } ?>

                    <input id="answers-input" name="studentAnswers" type="text" hidden>

                    <div class="row justify-content-end mt-3 mr-1">
                        <div class="d-flex">
                            <button id="submit-quiz" type="button" class="app-raised-button ripple">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
