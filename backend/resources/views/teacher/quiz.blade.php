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
    @include('partials.header')

    <div id="read-quiz-page" class="container mt-3 mb-5">
        <div class="row">
            <div class="col">
                <h2 class="page-name"><?=$quiz->title?></h2>

            </div>
        </div>

        <div class="row justify-content-between">
            <div class="quiz-info-left">
                <div class="date">
                    {{$created_at}}
                </div>
                <div class="duration">
                    <?=$quiz->duration?> minutes
                </div>
            </div>

            <div class="quiz-info-right">
                <div class="points">
                    Total: <strong>{{$total}}</strong>
                </div>

                <a href="/teacher/quiz/1/results" class="results">
                    See results <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <?php $index = 1 ?>
        <?php foreach ($questions as $question) { ?>
        <div class="question-constructor mt-3">
            <div class="question-title d-flex justify-content-center align-items-center mb-3">
                <div class="question-number">{{ $index }}</div>
                {{ $question["info"]->question }}
            </div>

            <div class="answers row">
                <?php if ($question["info"]->question_type_id == 1) {?>
                <div class="col-12 pb-2">
                    <div class="answer highlight">
                        {{ $question["answer"]->answer }}
                    </div>
                </div>
                <?php } ?>

                <?php if ($question["info"]->question_type_id == 2) { ?>
                <div class="col-6 pb-2">
                    <div class="answer {{ $question["answer"]->answer == 1 ? 'highlight' : '' }}">
                        True
                    </div>
                </div>

                <div class="col-6 pb-2">
                    <div class="answer {{ $question["answer"]->answer == 0 ? 'highlight' : '' }}">
                        False
                    </div>
                </div>
                <?php } ?>

                <?php if ($question["info"]->question_type_id == 3) { ?>
                <?php foreach ($question["answerOptions"] as $option) { ?>
                <div class="col-6 pb-2">
                    <div class="answer
                        {{
                        $option->text == $question["answer"]->answer ? 'highlight' : ''
                        }}
                        ">
                        {{ $option->text }}
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php $index = $index + 1 ?>
        <?php } ?>
    </div>
@endsection
