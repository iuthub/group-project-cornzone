@extends('layouts.sign_in')

@section('page-title')
    Choose your position
@endsection

@section('content')
<form action="{{ action('CheckRoleController@postRoleType') }}" method="post" class="h-100">
        @csrf
        <div class="container-fluid h-100">
            <div class="row text-center justify-content-center align-content-center h-100">
                <div class="col-3 pt-5">
                    <a class="back-button d-flex mb-3 j-self-start" href="/">
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
                        <h3>Choose your position</h3>
                    </div>


                    <div class="mt-3">
                        <label class="app-select-label">
                            <select name="role_selector" class="app-select-option" id="role-type-selector">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>
                        </label>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="app-raised-button w-100 ripple">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
