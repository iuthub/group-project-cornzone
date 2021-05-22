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
use Illuminate\Http\Request;
use Auth;
use App\MultipleQuestionOptionSet;

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

    public function postCreateQuiz(Request $request)
    {

        $teacher = Teacher::find($request->session()->get("teacherId"));

        //todo get subject id teacher id from session

        $quiz = Quiz::create(array(
            'title' => $request->input('title'),
            'subject_id' => $teacher->subject_id,
            'teacher_id' => $teacher->id,
            'duration' => $request->input('duration'),
        ));
        // $data = request()->validate([
        //     'title' => 'required',
        //     'duration' => 'required',
        // ]);

        // $data = auth()->teacher()->quizzes()->create($data);
        // dd($data);
        // dd(Auth::guard('teacher_web')->user()->id);
        // dd($request->session()->get("teacherId"));
//        dd(auth()->guard('teacher_web'));
        // dd(Auth::user()->getId());
        // dd(Auth::teacher());


        $questions = json_decode($request->input('questions'), true);
        // dd($questions);

        foreach ($questions as $key => $value) {
            print $value["type"] . "<br>";
            print $value["points"] . "<br>";
            print $value["questionText"] . "<br>";
            foreach ($value["answers"] as $answerKey => $answerValue) {
                print $answerValue["answerText"] . "     ";
                print $answerValue["isRightAnswer"] . "<br>";
            }


            // $question_type_column_name = 'title';

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
                    if ($answerValue["isRightAnswer"] == true)
                    {
                        $right_answer = $answerValue["answerText"];
                    }

                    // $answers .= $answerValue["answerText"];
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
                $rightAnswer = '';

                foreach ($value["answers"] as $answerKey => $answerValue) {
                    print $answerValue["answerText"] . "     ";
                    print $answerValue["isRightAnswer"] . "<br>";
                    if ($answerValue['isRightAnswer'] == "1" || strtolower($answerValue['isRightAnswer']) == "true")
                    {
                        $rightAnswer = $answerValue["answerText"];
                    }
                }


                TrueFalseQuestionAnswer::create(array(
                    'answer' => $answerValue["answerText"],
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
    }
}
