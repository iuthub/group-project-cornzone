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

use App\Quiz;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});

Route::post('/', 'CheckRoleController@postRoleType');

Route::group(['prefix' => 'teacher'], function () {
    Route::get('', 'TeacherController@getTeacherIndex')->name('teacherIndex');

    Route::get('/sign-in', 'AuthController@getSignInTeacher')->name('signInTeacher');
    Route::post('/sign-in', 'AuthController@postSignInTeacher');

    Route::get('/sign-up', 'AuthController@getSignUpTeacher')->name('signUpTeacher');
    Route::post('/sign-up', 'AuthController@postSignUpTeacher');

    Route::get('/quiz/create', 'QuizController@getCreateQuiz')->name('quizCreate');
    Route::post('/quiz/create', 'QuizController@postCreateQuiz');

    Route::get('/quiz/{id}', function () {
        return view('teacher.quiz');
    });

    Route::get('/quiz/{quiz_id}/results', 'StudentsAnswerController@getStudentsList');
    Route::get('/quiz/{quiz_id}/results/{student_id}', 'StudentsAnswerController@getStudentsAnswer');

    Route::get('/quiz/{quizId}/results/{studentId}', 'QuizController@getStudentAnswers')->name('studentAnswers');
});

Route::group(['prefix' => 'student'], function () {
    Route::get('', 'StudentController@getStudentIndex')->name('studentIndex');

    Route::get('/sign-in', 'AuthController@getSignInStudent')->name('signInStudent');
    Route::post('/sign-in', 'AuthController@postSignInStudent');

    Route::get('/sign-up', 'AuthController@getSignUpStudent')->name('signUpStudent');
    Route::post('/sign-up', 'AuthController@postSignUpStudent');

    Route::get('/quizzes/completed/{id}', 'StudentController@getCompletedQuizzes')->name('completedQuizzes');

    Route::get('/quizzes/active/{id}', 'QuizController@getTakeQuiz')->name('takeQuiz');
    Route::post('/quizzes/active/{id}', 'QuizController@postTakeQuiz');

    Route::post('/accept-quiz', 'QuizController@acceptQuiz')->name('acceptQuiz');
});
