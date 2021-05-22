@extends('layouts.sign_in')
<?php use App\Subject; ?>

@section('page-title')
    Teacher sign up
@endsection

@section('content')
    <form method="post" class="h-100" action="{{route("signUpTeacher")}}" > 
        @csrf
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
                    <!-- errors alert -->
                    @if ($errors->any())
                        <div class="alert alert-danger my-3" role="alert">
                            @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="mt-3">
                        <input name="first_name" value="{{old('first_name')}}" id="first_name" class="app-input" type="text" placeholder="First Name"
                               required>
                    </div>
                    <div class="mt-3">
                        <input name="last_name" value="{{old('last_name')}}" id="last_name" class="app-input" type="text" placeholder="Last Name"
                               required>
                    </div>
                    <div class="mt-3">
                        <input name="email" value="{{old('email')}}" id="email" class="app-input" type="text" placeholder="Email" required>
                    </div>
                    <div class="mt-3">
                        <input name="password" id="password" class="app-input" type="password" placeholder="Password"
                               required>
                    </div>
                    <label class="app-select-label mt-3">
                        <select class="app-select-option" name="subject_id" id="subject_id">
                            <?php
                            foreach (Subject::all() as $subject){
                            ?>
                            <option value="<?= $subject->id ?>"> <?= $subject->title ?></option>
                            <?php
                            } ?>
                        </select>
                    </label>
                    <div class="mt-3">
                        <button type="submit" class="app-raised-button w-100 ripple">Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
