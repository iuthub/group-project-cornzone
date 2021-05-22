@extends('layouts.master')

@section('page-title')
    Student index
@endsection

@section("root-url")
    /student
@endsection

@section("logout-url")
    /login
@endsection

@section('content')
    @include('partials.teacher_header') <!-- need to change teacher_header to student_header -->

    {{-- <form method="post" action="{{ route('student_index') }}" class="h-100">
        @csrf --}}

   {{-- <style>
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #2980B9;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {background-color: #ddd;}

        .show {display: block;}
    </style> --}}


    <div class="container mt-3 student-quizzes">
        <h2>Active quizzes</h2>
        <div class="row page-name mt-3">
            <div class="col-lg-6">
                <div class="quiz">
                    <div class="date d-flex align-items-center"></div>
                    <div class="body mt-3 d-flex flex-column align-items-center">
                        <div class="quiz-name ml-2">Introduction to IT</div>
                        <div class="section">27.02.2021</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="quiz">
                    <div class="date d-flex align-items-center"></div>
                    <div class="body mt-3 d-flex flex-column align-items-center">
                        <div class="quiz-name ml-2">Introduction to IT</div>
                        <div class="section">27.02.2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5 student-quizzes">
        <h2>Completed quizzes</h2>
        <div class="row page-name mt-3">
            <div class="col-lg-6">
                <div class="quiz">
                    <div class="date d-flex align-items-center"></div>
                    <div class="body mt-3 d-flex flex-column align-items-center">
                        <div class="quiz-name ml-2">Introduction to IT</div>
                        <div class="section">27.02.2021</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="quiz">
                    <div class="date d-flex align-items-center"></div>
                    <div class="body mt-3 d-flex flex-column align-items-center">
                        <div class="quiz-name ml-2">Introduction to IT</div>
                        <div class="section">27.02.2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


