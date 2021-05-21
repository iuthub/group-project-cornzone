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
            <div class="row page-name">
                <h2>Active quizzes</h2>
            </div>

            {{-- <a href="/student"> </a> --}}
            <div class="row quiz mt-3">
                <div class="date d-flex align-items-center">
                    <div class="col-auto">
                        <p>May 7</p>
                    </div>

                    <div class="col line"></div>
                </div>

                <div class="body mt-3 d-flex flex-column align-items-center">
                    <div class="blue-decor"></div>

                    <div class="col top d-flex align-items-center">
                        <div class="quiz-number mr-2">Quiz 1</div>
                        <div class="line"></div>
                        <div class="quiz-name ml-2">Introduction to IT</div>
                    </div>

                    <div class="col bottom">
                        Questions: 10, Time limit: 15m</div>

                    <div class="section">SEC 001</div>
                </div>
            </div>
    </div>


    <div class="container mt-3 student-quizzes">
        <div class="row page-name">
            <h2>Completed quizzes</h2>
        </div>

        {{-- <a href="/student"> </a> --}}
            <div class="row quiz mt-3">
                <div class="date d-flex align-items-center">
                    <div class="col-auto">
                        <p>May 7</p>
                    </div>

                    <div class="col line"></div>
                </div>

                <div class="body mt-3 d-flex flex-column align-items-center">
                    <div class="blue-decor"></div>

                    <div class="col top d-flex align-items-center">
                        <div class="quiz-number mr-2">Quiz 1</div>
                        <div class="line"></div>
                        <div class="quiz-name ml-2">Introduction to IT</div>
                    </div>

                    <div class="col bottom">
                        Questions: 10, Time limit: 15m</div>

                    <div class="section">SEC 001</div>
                </div>
            </div>
    </div>

            {{--  href="/student" class="fab ripple">+</a> --}}
               <!-- change adressing page -->

@endsection

    {{--             <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Dropdown</button>
        <div id="myDropdown" class="dropdown-content">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </div>
    </div>

    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script> --}}


