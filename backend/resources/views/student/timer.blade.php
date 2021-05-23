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

  {{--<div class="module-border-wrap"><div class="module">--}}

    <div class="border-gradient border-gradient-green">
        <p id="countdown"></p>
        <script src = "app.js"></script>
    </div>

