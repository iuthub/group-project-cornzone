@extends('layouts.master')

@section('page-title')
    My quizzes
@endsection

@section("root-url")
    /teacher
@endsection

@section("logout-url")
    /login
@endsection

@section('content')
    @include('partials.header')

    <div id="list-of-students" class="container mt-3 mb-4">
        <div class="row">
            <div class="col">
                <h2 class="page-name">{{ $quiz->title }}</h2>

                {{-- <h5 class="page-sub-title text-center mt-1">{{ $quiz->title }}</h5> --}}
            </div>
        </div>

        <div class="quiz-info">
            <div class="date">
                {{ $created_at }}
            </div>
            <div class="duration">
                {{ $quiz->duration }} minutes
            </div>
        </div>

        
        <table class="content-table">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Points</th>
                <th></th>
            </tr>

            </thead>
        
        
        @foreach($students as $student)
            <tr>
                <td> {{ $student->first_name }} {{ $student->last_name }} </td>
                <td>{{ $student->email }}</td>
                <td>25/30</td>
                <td>
                    <a href="/teacher/quiz/1/results/{ {{ $student->id }} }" class="app-raised-button violet">
                        See
                        <span class="button__icon">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </span>
                    </a>
                </td>
            </tr>
        @endforeach
        </table>
        
    </div>
@endsection
