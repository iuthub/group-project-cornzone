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


        //todo get subject id teacher id from session
        // $quiz = Quiz::create(array(
        //     'title' => $request->input('title'),
        //     'subject_id' => '1',
        //     'teacher_id' => '1',
        //     'duration' => $request->input('duration'),
        // ));

        // $data = request()->validate([
        //     'title' => 'required',
        //     'duration' => 'required',
        // ]);

        // $data = auth()->teacher()->quizzes()->create($data);
        // dd($data);
        // dd(Auth::guard('teacher_web')->user()->id);
        dd($request->session()->get("teacherId"));
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

            // $superQuestion = SuperQuestion::create(array(
            //     'quiz_id' => $quiz->id,
            //     'question' => $value["questionText"],
            //     'points' => $value["points"],
            //     'question_type_id' => QuestionType::where($question_type_column_name, '=', $value['type'])->first()
            // ));


            // if (strtolower($value["type"]) == 'multiple') {
            //     $answers = array();
            //     $answer = '';
            //     //сможем ли пройтись по индексам?
            //     for ($i = 0; $i < 4; $i++) {
            //         $answers[0];//сюда надо вносить ответы и потом записывать в option 1 2 3 4
            //     }

            //     foreach ($value["answers"] as $answerKey => $answerValue) {
            //         print $answerValue["answerText"] . "     ";
            //         print $answerValue["isRightAnswer"] . "<br>";
            //     }


            //     MultipleQuestionAnswer::create(array(
            //         'super_question_id' => $superQuestion->id,
            //         'option_set_id' => '',
            //     ));

            // } else if (strtolower($value["type"]) == 'true/false') {
            //     $rightAnswer = '';

            //     foreach ($value["answers"] as $answerKey => $answerValue) {
            //         print $answerValue["answerText"] . "     ";
            //         print $answerValue["isRightAnswer"] . "<br>";
            //         if ($answerValue['isRightAnswer'] == "1" || strtolower($answerValue['isRightAnswer']) == "true") {
            //             $rightAnswer = $answerValue["answerText"];
            //         }
            //     }


            //     TrueFalseQuestionAnswer::create(array(
            //         'answer' => '',//must be empty when creating
            //         'super_question_id' => $superQuestion->id,
            //     ));
            // } else if (strtolower($value["type"]) == 'text') {
            //     $answer = '';

            //     foreach ($value["answers"] as $answerKey => $answerValue) {
            //         $answer = $answerValue["answerText"];
            //     }//убрать форич, просто кастить как мапу потому что берем только одно значение

            //     SimpleQuestionAnswer::create(array(
            //         'answer' => $answer,
            //         'super_question_id' => $superQuestion->id,
            //     ));
            // }
        }
    }
}
