<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentController extends Controller
{
    public static function getCompletedQuizzes($id): array
    {
        $now = Carbon::now();
        $current_time = Carbon::createFromFormat('Y-m-d H:i:s', $now, 'UTC')
            ->setTimezone('Asia/Tashkent');

        $student_quizzes = DB::table('student_quiz')->where('student_id', $id)->get();
        $quiz_array = array();
        foreach ($student_quizzes as $student_quiz){
            $q_id = $student_quiz->quiz_id;
            $quizzes = Quiz::where('id', $q_id)->get();
            foreach ($quizzes as $quiz) {
                $created_at = $quiz->created_at;
                $expire = $created_at->addMinutes($quiz->duration);
                if($expire < $current_time){
                    array_push($quiz_array, $quiz);
                }
            }
        }

        return $quiz_array;
    }

    public static function getActiveQuizzes($id): array
    {
        $now = Carbon::now();
        $current_time = Carbon::createFromFormat('Y-m-d H:i:s', $now, 'UTC')
            ->setTimezone('Asia/Tashkent');

        $student_quizzes = DB::table('student_quiz')->where('student_id', $id)->get();
        $quiz_array = array();
        foreach ($student_quizzes as $student_quiz){
            $q_id = $student_quiz->quiz_id;
            $quizzes = Quiz::where('id', $q_id)->get();
            foreach ($quizzes as $quiz) {
                $created_at = $quiz->created_at;
                $expire = $created_at->addMinutes($quiz->duration);
                if($expire > $current_time){
                    array_push($quiz_array, $quiz);
                }
            }
        }
        return $quiz_array;
    }
}
