<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentAnswer;
use App\SuperQuestion;
use Illuminate\Http\Request;
use App\Quiz;
use App\MultipleQestionOptionSet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class StudentsAnswerController extends Controller
{
    public function getStudentsList(Request $request)
    {
        $quizId = $request->route('quizId');
        $quiz = Quiz::find($quizId);
        $students = [];

        $studentsQuizzes = DB::table('student_quiz')
            ->where("quiz_id", $quizId)
            ->get();

        $points = [];

        foreach ($studentsQuizzes as $studentQuiz) {
            array_push($students, Student::find($studentQuiz->student_id));
            $points[$studentQuiz->student_id] = $this->calcStudentPointsForQuiz($studentQuiz->student_id, $quizId);
        }

        return view('teacher.list_of_students', [
            'students' => $students,
            'quiz' => $quiz,
            'points' => $points,
            'created_at' => Carbon::parse($quiz['created_at'])->format('d.m.Y'),
        ]);
    }

    public function calcStudentPointsForQuiz($studentId, $quizId) {
        $questions = SuperQuestion::where("quiz_id", $quizId)->get();

        $total = 0;
        $taken = 0;

        foreach ($questions as $question) {
            $studentAnswer = StudentAnswer::where("student_id", $studentId)
                ->where("quiz_id", $quizId)
                ->where("question_id", $question->id)
                ->first();

            $total += $question->points;

            if (!is_null($studentAnswer) && $studentAnswer->is_true == 1) {
                $taken += $question->points;
            }
        }

        return [
            "total" => $total,
            "taken" => $taken,
        ];
    }
}
