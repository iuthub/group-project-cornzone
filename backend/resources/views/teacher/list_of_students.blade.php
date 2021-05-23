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

@section("back-url")
    /teacher/quiz/{{ $quiz->id }}
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div id="list-of-students" class="mt-3 mb-4">
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

        <?php if (count($students) == 0) { ?>
            <h3 class="text-center page-name w-100 mt-3">Student results will be displayed here</h3>
        <?php } else { ?>
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
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $points[$student->id]["taken"] }} / {{ $points[$student->id]["total"] }}</td>
                        <td>
                            <a href="/teacher/quiz/1/results/{{ $student->id }}" class="app-raised-button violet">
                                See
                                <span class="button__icon">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        <?php } ?>
    </div>

@endsection
