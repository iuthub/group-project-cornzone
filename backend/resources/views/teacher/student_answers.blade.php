@extends('layouts.master')

@section('page-title')
    {{ $quiz->title }}
@endsection

@section("root-url")
    /teacher
@endsection

@section("logout-url")
    /login
@endsection

@section("back-url")
    /teacher/quiz/{{ $quiz->id }}/results
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div>
        <div class="text-center my-5">
            <h2 class="page-name">{{ $quiz->title }}</h2>
            <p class='mt-2'>{{ $student->first_name }} {{ $student->last_name }} | Questions: {{ $taken }} / {{ $total }} </p>

            <?php $index = 1 ?>
            <?php foreach ($questions as $question) { ?>
            <div class="question-constructor mt-3">
                <div class="question-title d-flex justify-content-center align-items-center mb-3">
                    <div class="question-number">{{ $index }}</div>
                    {{ $question["info"]->question }}
                </div>

                <div class="answers row">
                    <?php if ($question["info"]->question_type_id == 1) {
                    if ($question["studentAnswer"]->is_true == 1) { ?>
                    <div class="col-12 pb-2">
                        <div class="answer correct">
                            {{ $question["studentAnswer"]->answer }}
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-12 pb-2">
                        <div class="answer incorrect">
                            {{ $question["studentAnswer"]->answer }}
                        </div>
                    </div>

                    <div class="col-12 pb-2">
                        <div class="answer correct">
                            {{ $question["rightAnswer"]->answer }}
                        </div>
                    </div>
                    <?php }
                    } ?>

                    <?php if ($question["info"]->question_type_id == 2) { ?>
                        <div class="col-6 pb-2">
                            <div class="answer
{{ $question["studentAnswer"]->is_true == 1 && $question["studentAnswer"]->answer == "true" ? 'correct' : '' }}
                            {{ $question["studentAnswer"]->is_true == 0 && $question["studentAnswer"]->answer == "true" ? 'incorrect' : '' }}
                                ">
                                True
                            </div>
                        </div>

                        <div class="col-6 pb-2">
                            <div class="answer
{{ $question["studentAnswer"]->is_true == 1 && $question["studentAnswer"]->answer == "false" ? 'correct' : '' }}
                            {{ $question["studentAnswer"]->is_true == 0 && $question["studentAnswer"]->answer == "false" ? 'incorrect' : '' }}
                                ">
                                False
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($question["info"]->question_type_id == 3) { ?>
                    <?php foreach ($question["answerOptions"] as $option) { ?>
                    <div class="col-6 pb-2">
                        <div class="answer
                    {{
                    $question["studentAnswer"]->is_true == 0 && $question["studentAnswer"]->answer == $option->text
                        ? "incorrect"
                        : ""
                    }}
                        {{
                        ($question["studentAnswer"]->is_true == 1 && $question["studentAnswer"]->answer == $option->text) || ($question["rightAnswer"]->answer == $option->text)
                            ? "correct"
                            : ""
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
    </div>
@endsection
