<?php

namespace App\Http\Controllers;

use App\MultipleQuestionAnswer;
use App\QuestionType;
use App\Quiz;
use App\SimpleQuestionAnswer;
use App\Subject;
use App\SuperQuestion;
use App\Teacher;
use App\TrueFalseQuestionAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\MultipleQuestionOptionSet;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function getCreateQuiz(Request $request)
    {
        $questionTypes = QuestionType::all();
        $teacher = Teacher::find($request->session()->get("teacherId"));
        $subject = Subject::find($teacher->subject_id);

        return view('teacher.quiz_create', [
            "questionTypes" => $questionTypes,
            "subjectTitle" => $subject->title,
        ]);
    }

    public function postCreateQuiz(Request $request) {
        $teacher = Teacher::find($request->session()->get("teacherId"));

        $quiz = Quiz::create(array(
            'title' => $request->input('title'),
            'subject_id' => $teacher->subject_id,
            'teacher_id' => $teacher->id,
            'duration' => $request->input('duration'),
        ));

        $questions = json_decode($request->input('questions'), true);

        foreach ($questions as $key => $value) {
            $superQuestion = SuperQuestion::create(array(
                'quiz_id' => $quiz->id,
                'question' => $value["questionText"],
                'points' => $value["points"],
                'question_type_id' => $value["type"]
            ));


            if (strtolower($value["type"]) == '3') {
                $answers = '';

                foreach ($value["answers"] as $answerKey => $answerValue) {
                    print $answerValue["answerText"] . "     ";
                    print $answerValue["isRightAnswer"] . "<br>";
                    if ($answerValue["isRightAnswer"] == true) {
                        $right_answer = $answerValue["answerText"];
                    }
                }

                $mq_answer =  MultipleQuestionAnswer::create(array(
                    'super_question_id' => $superQuestion->id,
                    'answer' => $right_answer,
                ));

                foreach ($value["answers"] as $answerKey => $answerValue) {
                    MultipleQuestionOptionSet::create(array(
                        'MQA_id' => $mq_answer->id,
                        'text' => $answerValue["answerText"],
                    ));
                }
            }

             else if (strtolower($value["type"]) == '2') {
                 TrueFalseQuestionAnswer::create(array(
                    'answer' => $value["answers"][0]["isRightAnswer"],
                    'super_question_id' => $superQuestion->id,
                ));
            }

            else if (strtolower($value["type"]) == '1') {
                SimpleQuestionAnswer::create(array(
                    'answer' => $answerValue["answerText"],
                    'super_question_id' => $superQuestion->id,
                ));
            }
        }

        return view('teacher.index');
    }

    public function acceptQuiz(Request $request) {
        $quizId = substr($request->input('quizLink'), -1);

        DB::table('student_quiz')->insertGetId([
            "student_id" => $request->session()->get('studentId'),
            "quiz_id" => $quizId,
            "created_at" => Carbon::now()->toDateTime(),
            "updated_at" => Carbon::now()->toDateTime(),
        ]);

        return view('student.index');
    }
}
