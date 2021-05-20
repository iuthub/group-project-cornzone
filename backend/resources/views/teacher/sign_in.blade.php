@extends('layouts.sign_in')

@section('page-title')
Teacher login
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
                <h3>Login to continue</h3>
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

            <div class="mt-3">
                <button class="app-raised-button w-100 ripple">Login</button>
            </div>
        </div>
    </div>
    @endsection