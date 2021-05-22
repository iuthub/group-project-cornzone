@extends('layouts.master')

@section('page-title')
All quizzes
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
    <div class="all-quizzes mt-5 container">
        <h2 class="text-center mb-5 text-secondary-v2">All quizzes</h2>
        <div class="quiz-item bg-danger-v2 mb-3">
            <div class="quiz-item_pos-wrapper">
                <span class="quiz-item_pos font-weight-bold text-white"><span>1</span></span>
            </div>
            <div class="quiz-item_content">
                <h4 class="quiz-item_name text-violet">Match the words</п>
            </div>
        </div>
        <div class="quiz-item bg-success-v2 mb-3">
            <div class="quiz-item_pos-wrapper">
                <span class="quiz-item_pos font-weight-bold text-white"><span>2</span></span>
            </div>
            <div class="quiz-item_content">
                <h4 class="quiz-item_name text-violet">Match the words</п>
            </div>
        </div>
        <div class="quiz-item bg-danger-v2 mb-3">
            <div class="quiz-item_pos-wrapper">
                <span class="quiz-item_pos font-weight-bold text-white"><span>3</span></span>
            </div>
            <div class="quiz-item_content">
                <h4 class="quiz-item_name text-violet">Match the words</п>
            </div>
        </div>
        <div class="quiz-item bg-success-v2 mb-3">
            <div class="quiz-item_pos-wrapper">
                <span class="quiz-item_pos font-weight-bold text-white"><span>4</span></span>
            </div>
            <div class="quiz-item_content">
                <h4 class="quiz-item_name text-violet">Match the words</п>
            </div>
        </div>

    </div>
</div>
@endsection