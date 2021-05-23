<?php

namespace App\Http\Controllers;

use App\MultipleQuestionAnswer;
use App\MultipleQuestionOptionSet;
use App\Quiz;
use App\SimpleQuestionAnswer;
use App\StudentAnswer;
use App\SuperQuestion;
use App\TrueFalseQuestionAnswer;
use Carbon\Carbon;
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

    public static function getQuiz(Request $request)
    {
        $quizId = $request->route('id');

        $quiz = Quiz::find($quizId);
        $questions = SuperQuestion::where("quiz_id", $quizId)->get();
        $questionsToSend = [];

        $total = 0;

        foreach ($questions as $question) {
            $questionInfo = [];

            $questionInfo["info"] = $question;

            $total += $question->points;

            if ($question->question_type_id == 1) {
                $questionInfo["answer"] = SimpleQuestionAnswer::where("super_question_id", $question->id)->first();
            }

            if ($question->question_type_id == 2) {
                $questionInfo["answer"] = TrueFalseQuestionAnswer::where("super_question_id", $question->id)->first();
            }

            if ($question->question_type_id == 3) {
                $questionInfo["answer"] = MultipleQuestionAnswer::where("super_question_id", $question->id)->first();
                $questionInfo["answerOptions"] = MultipleQuestionOptionSet::where("MQA_id", $questionInfo["answer"]->id)->get();
            }

            $questionsToSend[$question->id] = $questionInfo;
        }

        return view('teacher.quiz', [
            "quiz" => $quiz,
            "questions" => $questionsToSend,
            "total" => $total,
            'created_at' => Carbon::parse($quiz['created_at'])->format('d.m.Y'),
        ]);
    }
}
