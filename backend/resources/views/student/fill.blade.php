@extends('layouts.master')

@section('page-title')
True/False Questions
@endsection
@section("root-url")
/student
@endsection

@section("logout-url")
/login
@endsection

@section('content')
@include('partials.teacher_header')
<div>
    <div class="container">
        <div class="text-center my-5">
            <h2>Introduction to IT</h2>
            <p class='mt-2'>Question <span>1/20</span></p>

            <div class="question-constructor mt-3">
                <div class="question-title d-flex justify-content-center align-items-center mb-3">
                    <div class="question-number">1</div>
                    Lorem ipsum ____ dolor sit amet,
                    consectetur adipiscing elit, sed do
                    eiusmod ____ tempor incididunt ut
                    labore et dolore magna ____ aliqua.
                </div>

                <div class="answers d-flex flex-wrap justify-content-center w-100">
                    <span class="pr-3 pb-3">
                        <div class="answer correct py-2 px-5 ">
                            Capable
                        </div>
                    </span>
                    <span class="pr-3 pb-3">
                        <div class="answer correct py-2 px-5 ">
                            Advantage
                        </div>
                    </span>
                    <span class="pr-3 pb-3">
                        <div class="answer correct py-2 px-5 ">
                            If
                        </div>
                    </span>
                    <span class="pr-3 pb-3">
                        <div class="answer correct py-2 px-5 ">
                            Love
                        </div>
                    </span>
                    <span class="pr-3 pb-3">
                        <div class="answer correct py-2 px-5 ">
                            Creativity
                        </div>
                    </span>
                    <span class="pr-3 pb-3">
                        <div class="answer correct py-2 px-5 ">
                            Capable
                        </div>
                    </span>
                    <span class="pr-3 pb-3">
                        <div class="answer correct py-2 px-5 ">
                            Advantage
                        </div>
                    </span>



                </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection