<?php

namespace App\Http\Controllers;

use App\MultipleQuestionAnswer;
use App\QuestionType;
use App\Quiz;
use App\SimpleQuestionAnswer;
use App\StudentAnswer;
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
                    'answer' => $value["answers"][0]["answerText"],
                    'super_question_id' => $superQuestion->id,
                ));
            }
        }

        return redirect('/teacher');
    }

    public function acceptQuiz(Request $request) {
        $quizId = substr($request->input('quizLink'), -1);

        DB::table('student_quiz')->insertGetId([
            "student_id" => $request->session()->get('studentId'),
            "quiz_id" => $quizId,
            "is_completed" => false,
            "created_at" => Carbon::now()->toDateTime(),
            "updated_at" => Carbon::now()->toDateTime(),
        ]);

        return redirect('/student');
    }

    public function getTakeQuiz(Request $request) {
        $quizId = $request->route('id');

        $quiz = Quiz::find($quizId);
        $questions = SuperQuestion::where("quiz_id", $quizId)->get();

        $questionsToSend = [];

        foreach ($questions as $question) {
            $questionInfo = [];

            $questionInfo["info"] = $question;

            if ($question->question_type_id == 1) {
                $questionInfo["answer"] = SimpleQuestionAnswer::where("super_question_id", $question->id)->first();
            }

            if ($question->question_type_id == 2) {
                $questionInfo["answer"] = TrueFalseQuestionAnswer::where("super_question_id", $question->id)->first();
            }

            if ($question->question_type_id == 3) {
                $answer = MultipleQuestionAnswer::where("super_question_id", $question->id)->first();
                $questionInfo["answerOptions"] = MultipleQuestionOptionSet::where("MQA_id", $answer->id)->get();
            }

            $questionsToSend[$question->id] = $questionInfo;
        }

        return view('student.take_quiz', [
            "quiz" => $quiz,
            "questions" => $questionsToSend,
        ]);
    }

    public function postTakeQuiz(Request $request) {
        $studentAnswers = json_decode($request->input('studentAnswers'), true);
        $studentId = $request->session()->get("studentId");
        $quizId = $request->route('id');

        $questions = SuperQuestion::where("quiz_id", $quizId)->get();

        $studentQuiz = DB::table('student_quiz')
            ->where("student_id", $request->session()->get('studentId'))
            ->where("quiz_id", $quizId)
            ->first();

        if ($studentQuiz->is_completed == 1) {
            return redirect('/student');
        }

        DB::table('student_quiz')->where('id', $studentQuiz->id)->update(["is_completed" => 1]);

        foreach ($questions as $question) {
            $studentAnswer = $studentAnswers[$question->id];

            if ($question->question_type_id == 1) {
                $answer = SimpleQuestionAnswer::where("super_question_id", $question->id)->first();

                StudentAnswer::create([
                    "student_id" => $studentId,
                    "question_id" => $question->id,
                    "quiz_id" => $quizId,
                    "answer" => $studentAnswer,
                    "is_true" => $answer->answer == $studentAnswer,
                ]);
            }

            if ($question->question_type_id == 2) {
                $answer = TrueFalseQuestionAnswer::where("super_question_id", $question->id)->first();
                $answerText = $answer->answer == 0 ? "false" : "true";

                StudentAnswer::create([
                    "student_id" => $studentId,
                    "question_id" => $question->id,
                    "quiz_id" => $quizId,
                    "answer" => strtolower($studentAnswer),
                    "is_true" => $answerText == strtolower($studentAnswer),
                ]);
            }

            if ($question->question_type_id == 3) {
                $answer = MultipleQuestionAnswer::where("super_question_id", $question->id)->first();
                $questionInfo["answerOptions"] = MultipleQuestionOptionSet::where("MQA_id", $answer->id)->get();

                StudentAnswer::create([
                    "student_id" => $studentId,
                    "question_id" => $question->id,
                    "quiz_id" => $quizId,
                    "answer" => $studentAnswer,
                    "is_true" => $answer->answer == $studentAnswer,
                ]);
            }
        }

        return redirect('/student');
    }
}
