@extends('layouts.master')

@section('page-title')
    Introduction to IT Quiz 1
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
                <h2 class="page-name">Introduction to IT</h2>
                <p class='mt-2'>10 minutes | Questions 10/20 </p>

                <form id="quiz-form">
                    <div class="question-constructor mt-3" questionId="1">
                        <div class="question-title d-flex justify-content-center align-items-center mb-3">
                            <div class="question-number">1</div>
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </div>

                        <div class="answers row">
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
                        </div>
                    </div>

                    <div class="question-constructor mt-3" questionId="2">
                        <div class="question-title d-flex justify-content-center align-items-center mb-3">
                            <div class="question-number">2</div>
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </div>

                        <div class="answers row">
                            <div class="col-6 pb-2">
                                <div class="answer pointer">
                                    A
                                </div>
                            </div>

                            <div class="col-6 pb-2">
                                <div class="answer pointer">
                                    B
                                </div>
                            </div>

                            <div class="col-6 pb-2">
                                <div class="answer pointer">
                                    C
                                </div>
                            </div>

                            <div class="col-6 pb-2">
                                <div class="answer pointer">
                                    D
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="question-constructor mt-3" questionId="3">
                        <div class="question-title d-flex justify-content-center align-items-center mb-3">
                            <div class="question-number">3</div>
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </div>

                        <div class="answers row">
                            <div class="col-12 pb-2">
                                <div class="answer">
                                    <input placeholder="Enter your answer here" type="text" class="app-input text-center">
                                </div>
                            </div>
                        </div>
                    </div>

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
