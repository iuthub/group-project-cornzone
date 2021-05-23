<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Quiz;
use App\MultipleQestionOptionSet;
use Carbon\Carbon;


class StudentsAnswerController extends Controller
{
    public function getStudentsList(Request $request)
    {
        $quiz_id = $request->route('quiz_id');
        $quiz = Quiz::find($quiz_id)->first();
        $students = Student::all();

        return view('teacher.list_of_students', [
            'students' => $students,
            'quiz' => $quiz,
            'created_at' => Carbon::parse($quiz['created_at'])->format('d.m.Y'),
        ]);
    }
}
