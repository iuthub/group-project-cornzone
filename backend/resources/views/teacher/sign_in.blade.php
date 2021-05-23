@extends('layouts.sign_in')

@section('page-title')
    Teacher login
@endsection

@section('content')
    <form method="post" action="{{route("signInTeacher")}} " class="h-100">
        @csrf
        <div class="container-fluid h-100">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-3">
                    <a class="back-button d-flex mb-3 j-self-start" href="/login">
                        <span class="back-icon">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </span>
                        Back
                    </a>

                    <div class="logo"></div>
                    <div class="logo-title">
                        <h2>Quizify</h2>
                    </div>
                    <div class="sub-title mt-3">
                        <h3>Login to continue</h3>
                    </div>
                    <!-- errors alert -->
                    @if ($errors->any())
                    <div class="alert alert-danger my-3" role="alert">
                        @foreach ($errors->all() as $error)
                            {{$error}}
                        @endforeach
                        </div>
                    @endif
                    <div class="mt-3">
                        <input name="email" id="email" class="app-input" type="text" placeholder="Email" required>
                    </div>
                    <div class="mt-3">
                        <input name="password" id="password" class="app-input" type="password" placeholder="Password" required>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="app-raised-button w-100 ripple">Login</button>
                    </div>
                    <div class="mt-3 text-center">
                        <a class="action-btn" href="{{route('signUpTeacher')}}">
                            <span>Sign Up</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
