@extends('layouts.sign_in')

@section('page-title')
    Teacher sign up
@endsection

@section('content')
    <div class="container-fluid h-100">
        <div class="row justify-content-center align-content-center h-100">
            <div class="col-3">
                <div class="logo"></div>

                <div class="logo-title">
                    <h2>Quizify</h2>
                </div>

                <div class="sub-title mt-3">
                    <h3>Sign up to continue</h3>
                </div>

                {{--                <div class="sub-title" :class="{ errorSubtitle: isError }">--}}
                {{--                    <h3>{{ subTitle }}</h3>--}}
                {{--                </div>--}}

                <div class="mt-3">
                    <input class="app-input" type="text" placeholder="Email" required>
                </div>

                <div class="mt-3">
                    <input class="app-input" type="password" placeholder="Password" required>
                </div>

                <label class="app-select-label mt-3">
                    <select class="app-select-option">
                        <option value="null" selected disabled>Choose the subject</option>
                    </select>
                </label>

                <div class="mt-3">
                    <button class="app-raised-button w-100 ripple">Sign up</button>
                </div>
            </div>
        </div>
@endsection
