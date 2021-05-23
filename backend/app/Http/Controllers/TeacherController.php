<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public static function getTeacherIndex()
    {
        return view('teacher.index', [
            "quizzes" =>
                Quiz::where("teacher_id", session()->get("teacherId"))
                    ->orderBy('created_at')
                    ->get()
                    ->toArray()
        ]);
    }
}
