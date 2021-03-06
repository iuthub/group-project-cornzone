<?php

namespace App\Http\Controllers;

use App\MultipleQuestionAnswer;
use App\MultipleQuestionOptionSet;
use App\Quiz;
use App\SimpleQuestionAnswer;
use App\StudentAnswer;
use App\SuperQuestion;
use App\TrueFalseQuestionAnswer;
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
        $studentId = $request->session()->get("studentId");
        $quizId = $request->route('id');

        $quiz = Quiz::find($quizId);
        $questions = SuperQuestion::where("quiz_id", $quizId)->get();

        $questionsToSend = [];

        $total = 0;
        $taken = 0;

        foreach ($questions as $question) {
            $questionInfo = [];

            $questionInfo["info"] = $question;

            $questionInfo["studentAnswer"] = StudentAnswer::where("student_id", $studentId)
                ->where("quiz_id", $quizId)
                ->where("question_id", $question->id)
                ->first();

            $total += $question->points;

            if ($questionInfo["studentAnswer"]->is_true == 1) {
                $taken += $question->points;
            }

            if ($question->question_type_id == 1) {
                $questionInfo["rightAnswer"] = SimpleQuestionAnswer::where("super_question_id", $question->id)->first();
            }

            if ($question->question_type_id == 2) {
                $questionInfo["rightAnswer"] = TrueFalseQuestionAnswer::where("super_question_id", $question->id)->first();
            }

            if ($question->question_type_id == 3) {
                $questionInfo["rightAnswer"] = MultipleQuestionAnswer::where("super_question_id", $question->id)->first();
                $questionInfo["answerOptions"] = MultipleQuestionOptionSet::where("MQA_id", $questionInfo["rightAnswer"]->id)->get();
            }

            $questionsToSend[$question->id] = $questionInfo;
        }

        return view('student.completed_quiz', [
            "quiz" => $quiz,
            "questions" => $questionsToSend,
            "total" => $total,
            "taken" => $taken,
        ]);
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
                if($expire < $current_time || $student_quiz->is_completed== 1){
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
                if($expire > $current_time && $student_quiz->is_completed!=1){
                    array_push($quiz_array, $quiz);
                }
            }
        }
        return $quiz_array;
    }
}
