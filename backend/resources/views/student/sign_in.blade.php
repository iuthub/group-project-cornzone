@extends('layouts.sign_in')

@section('page-title')
    Student login
@endsection

@section('content')
    <form method="post" action="{{ route('signInStudent') }}" class="h-100">
        @csrf
        <div class="container-fluid h-100">

            <div class="row text-center justify-content-center align-content-center h-100">
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
                        <input name="email" id="email" class="app-input" type="text" placeholder="Email" required>
                    </div>

                    <div class="mt-3">
                        <input name="password" id="password" class="app-input" type="password" placeholder="Password"
                               required>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="app-raised-button w-100 ripple">Login</button>
                    </div>
                     <div class="mt-3 text-center">
                        <a class="action-btn" href="{{route('signUpStudent')}}">
                            <span>Sign Up</span>
                        </a>
                    </div>
                </div>
              
            </div>
        </div>
    </form>
@endsection
