<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public static function getCompletedQuizzes($id): array
    {
        $student_quizzes = DB::table('student_quiz')->where('student_id', $id)->get();
        $quiz_array = array();
        foreach ($student_quizzes as $student_quiz){
            $q_id = $student_quiz->quiz_id;
            $quizzes = Quiz::where('id', $q_id)->get();
            foreach ($quizzes as $quiz) {
                array_push($quiz_array, $quiz);
            }
        }
        return $quiz_array;
    }

    public static function getActiveQuizzes($id): array
    {
        $student_quizzes = DB::table('student_quiz')->where('student_id', $id)->get();
        $quiz_array = array();
        foreach ($student_quizzes as $student_quiz){
            $q_id = $student_quiz->quiz_id;
            $quizzes = Quiz::where('id', $q_id)->get();
            foreach ($quizzes as $quiz) {
                array_push($quiz_array, $quiz);
            }
        }
        return $quiz_array;
    }
}
