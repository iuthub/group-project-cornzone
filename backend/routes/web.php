<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\EnsureUserAuthorised;
use App\Quiz;
use Illuminate\Support\Facades\Redirect;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function (\Illuminate\Http\Request $request) {
    $request->session()->remove('studentId');
    $request->session()->remove('teacherId');

    return view('login');
});

Route::post('/', 'CheckRoleController@postRoleType');

Route::get('teacher/sign-in', 'AuthController@getSignInTeacher')->name('signInTeacher');
Route::post('teacher/sign-in', 'AuthController@postSignInTeacher');

Route::get('teacher/sign-up', 'AuthController@getSignUpTeacher')->name('signUpTeacher');
Route::post('teacher/sign-up', 'AuthController@postSignUpTeacher');

Route::group(['prefix' => 'teacher', 'middleware'=>EnsureUserAuthorised::class], function () {
    Route::get('', 'TeacherController@getTeacherIndex')->name('teacherIndex');

    Route::get('/quiz/create', 'QuizController@getCreateQuiz')->name('quizCreate');
    Route::post('/quiz/create', 'QuizController@postCreateQuiz');

    Route::get('/quiz/{id}', 'TeacherController@getQuiz');

    Route::get('/quiz/{quizId}/results', 'StudentsAnswerController@getStudentsList');
    Route::get('/quiz/{quizId}/results/{studentId}', 'QuizController@getStudentAnswers')->name('studentAnswers');
});

Route::get('student/sign-in', 'AuthController@getSignInStudent')->name('signInStudent');
Route::post('student/sign-in', 'AuthController@postSignInStudent');

Route::get('student/sign-up', 'AuthController@getSignUpStudent')->name('signUpStudent');
Route::post('student/sign-up', 'AuthController@postSignUpStudent');

Route::group(['prefix' => 'student','middleware'=>EnsureUserAuthorised::class], function () {
    Route::get('', 'StudentController@getStudentIndex')->name('studentIndex');

    Route::get('/quizzes/completed/{id}', 'StudentController@getCompletedQuizzes')->name('completedQuizzes');

    Route::get('/quizzes/active/{id}', 'QuizController@getTakeQuiz')->name('takeQuiz');
    Route::post('/quizzes/active/{id}', 'QuizController@postTakeQuiz');

    Route::post('/accept-quiz', 'QuizController@acceptQuiz')->name('acceptQuiz');
});
