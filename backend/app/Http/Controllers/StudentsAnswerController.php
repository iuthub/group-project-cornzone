<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Quiz;
use App\StudentAnswer;
use App\MultipleQuestionAnswer;
use App\MultipleQestionOptionSet;
use App\SimpleQuestionAnswer;
use App\TrueFalseQuestionAnswer;
use App\SuperQuestion;
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

    public function getStudentsAnswer(Request $request)
    {   

        $student_id = $request->route('student_id');
        $quiz_id = $request->route('quiz_id');
        #$student_id[2] выводит номер айди
        $students = Student::find($student_id[2])->first();
        $answers = StudentAnswer::where('student_id', $student_id[2])->get();

        // $quiz_id = 1;
        // foreach ($answers as $answer => $answerValue) {
        //     $quiz_id = $answerValue['quiz_id'];
        // }
        $quiz = Quiz::find($quiz_id)->first();
        dd($quiz_id);
        $super_question_answer = SuperQuestion::where('quiz_id', $quiz_id)->get();
        foreach ($super_question_answer as $answer => $answerValue) {
            $multiple_question_answer_id = [];
            $simple_question_answer_id = [];
            $true_false_question_answer_id = [];

            #тут надо собрать все айдишки из super question т.к его айдишки мы передаем к MultipleQuestionAnswer,
            #SimpleQuestionAnswer, TrueFalseQuestionAnswer чтобы оттуда взять потом ответы с квизов

            if ($answerValue['question_type_id'] == 3)
            {   
                // $multiple_question_answer_id = array_push($answerValue['id']);
                $multiple_question_answer_id = $answerValue['id'];
            }
            else if($answerValue['question_type_id'] == 2)
            {
                $true_false_question_answer_id = $answerValue['id'];
            }
            else if($answerValue['question_type_id'] == 1)
            {
                $simple_question_answer_id = $answerValue['id'];
            }
        }
        dd($multiple_question_answer_id);
        $multiple_question_answer = MultipleQuestionAnswer::where($multiple_question_answer_id)->get();
        $simple_question_answer = SimpleQuestionAnswer::where($simple_question_answer_id)->get();
        $true_false_question_answer_id = TrueFalseQuestionAnswer::where($true_false_question_answer_id)->get();
        // dd($simple_question_answer->answer);

        // return view('teacher.students_answer', [
        //     'students' => $students,
        //     'quizes' => $quizes,
        //     'students_answer' => $students_answer
        // ]);
    }
}
