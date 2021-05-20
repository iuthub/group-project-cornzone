@extends('layouts.master')

@section('page-title')
    Welcome to Quizify
@endsection

@section('content')
<div class="main">
    <div class="main-header">
        <div class="container">
            <div class="main-header_wrapper d-flex align-items-center justify-content-between">
                <div class="main-header_logo font-weight-bold">Quizify</div>

                <a href="/login" class="main-header_login-btn text-white font-weight-bold">Login</a>

            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div class="content-row">
                <div class="main-content_info">
                    <h1 class="font-weight-bold">Something exciting <br />
                        written there!</h1>
                    <p class="mt-3">Some features given</p>

                    <a href="https://github.com/JRakhimov/quizify" class="main-content-github_link mt-5">
                        <img class="github-icon" src="../images/github-icon.svg" alt="">
                    </a>

                </div>
                <div class="main-content_img">
                    <img class="happy-girl" src="../images/happy-girl.png" alt="">
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
