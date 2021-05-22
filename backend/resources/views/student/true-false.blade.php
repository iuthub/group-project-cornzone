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
@include('partials.header')
<div>
    <div class="container">
        <div class="text-center my-5">
            <h2>Introduction to IT</h2>
            <p class='mt-2'>Question <span>1/20</span></p>

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
                        <div class="answer bg-violet-v2">
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
        </div>
        <div class="mt-5 text-right">
            <button class="btn bg-blue-v2 text-white">Next</button>
        </div>
    </div>
</div>
@endsection
