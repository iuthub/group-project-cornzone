@extends('layouts.master')

@section('page-title')
    Create new quiz
@endsection

@section("root-url")
    /teacher
@endsection

@section("logout-url")
    /login
@endsection

@section('content')
    @include('partials.header')

    <div id="create-quiz-page" class="container mt-3 mb-5">
        <div class="row">
            <div class="col">
                <h2 class="page-name">Create a quiz</h2>
            </div>
        </div>

        <form id="create-quiz-form" method="post" action="{{ route("quizCreate") }}">
        @csrf
            <div class="pt-3">
                <h3 class="sub-title mb-2">General quiz info</h3>

                <div class="row">
                    <div class="col-4">
                        <h4 class="input-title mb-1">Subject</h4>
                        <input
                            name="subject"
                            type="text"
                            class="app-input"
                            placeholder="Subject"
                            readonly
                            value="{{$subjectTitle}}"
                        >
                    </div>

                    <div class="col-4">
                        <h4 class="input-title mb-1">Title</h4>
                        <input name="title" type="text" class="app-input" placeholder="Title" required>
                    </div>

                    <div class="col-4">
                        <h4 class="input-title mb-1">Time Limit</h4>
                        <input name="duration" type="number" class="app-input" placeholder="Minutes" required>
                    </div>
                </div>
            </div>

            <div class="pt-3" id="questions">
                <h3 class="sub-title mb-2">Questions</h3>
            </div>

            <input id="hidden-questions-input" name="questions" type="text" hidden>

            <div class="pt-3">
                <h3 class="sub-title mb-2">New question info</h3>

                <div class="row">
                    <div class="col-4">
                        <h4 class="input-title mb-1">Type</h4>

                        <label class="app-select-label">
                            <select class="app-select-option" id="type-selector">
                                <option value="null" disabled selected>Choose the question type</option>
                                <?php
                                foreach ($questionTypes as $type){
                                ?>
                                <option value="<?= $type->id ?>"> <?= $type->title ?></option>
                                <?php
                                } ?>
                            </select>
                        </label>
                    </div>

                    <div class="col-4">
                        <h4 class="input-title mb-1">Points</h4>

                        <div class="d-flex">
                            <input type="number" class="app-input" placeholder="Point" id="question-points">
                        </div>
                    </div>

                    <div class="col-4">
                        <h4 class="input-title mb-1">Actions</h4>

                        <div class="row ml-1">
                            <button type="button" class="app-raised-button ripple mr-2" id="add-question">Add question</button>
                            <button type="submit" class="app-raised-button ripple green" id="create-quiz">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection