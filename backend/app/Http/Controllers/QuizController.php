<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{   
    public function getCreateQuiz()
    {
        return view('teacher.quiz_create');
    }

    public function postCreateQuiz(Request $request)
    {
        dd('OK');
    }
}
