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
    <div>
        <div class="container">
            <div class="text-center my-5">
                <h2 class="page-name">Introduction to IT</h2>
                <p class='mt-2'>10 minutes | Questions 10/20 </p>

                <div class="question-constructor mt-3">
                    <div class="question-title d-flex justify-content-center align-items-center mb-3">
                        <div class="question-number">1</div>
                        Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </div>

                    <div class="answers row">
                        <div class="col-6 pb-2">
                            <div class="answer incorrect">
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

                <div class="question-constructor mt-3">
                    <div class="question-title d-flex justify-content-center align-items-center mb-3">
                        <div class="question-number">2</div>
                        Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </div>

                    <div class="answers row">
                        <div class="col-6 pb-2">
                            <div class="answer">
                                A
                            </div>
                        </div>

                        <div class="col-6 pb-2">
                            <div class="answer">
                                B
                            </div>
                        </div>

                        <div class="col-6 pb-2">
                            <div class="answer correct">
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
                        <div class="question-number">3</div>
                        Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </div>

                    <div class="answers row">
                        <div class="col-12 pb-2">
                            <div class="answer correct">
                                Your correct answer for plain question
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-constructor mt-3">
                    <div class="question-title d-flex justify-content-center align-items-center mb-3">
                        <div class="question-number">4</div>
                        Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </div>

                    <div class="answers row">
                        <div class="col-12 pb-2">
                            <div class="answer incorrect">
                                Your incorrect answer for plain question
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
