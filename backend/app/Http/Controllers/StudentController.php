<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentController extends Controller {
    public function getStudentIndex(Request $request) {
        $studentId = $request->session()->get("studentId");

        $completedQuizzes = $this->fetchCompletedQuizzes($studentId);
        $activeQuizzes = $this->fetchActiveQuizzes($studentId);

        return view('student.index', [
            "completedQuizzes" => $completedQuizzes,
            "activeQuizzes" => $activeQuizzes,
        ]);
    }

    public function getCompletedQuizzes(Request $request) {
        return view('student.completed_quiz');
    }

    public static function fetchCompletedQuizzes($id): array {
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
                if($expire < $current_time || $student_quiz->is_completed== true){
                    array_push($quiz_array, $quiz);
                }
            }
        }

        return $quiz_array;
    }

    public static function fetchActiveQuizzes($id): array {
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
                if($expire > $current_time || $student_quiz->is_completed==false){
                    array_push($quiz_array, $quiz);
                }
            }
        }
        return $quiz_array;
    }
}
