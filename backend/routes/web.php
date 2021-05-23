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
//    Route::get('', 'TeacherController@getTeacherIndex')->name('teacherIndex');

    Route::get('', function () {
        return view('teacher.index');
    })->name('teacherIndex');

    Route::get('/sign-in', 'AuthController@getSignInTeacher')->name('signInTeacher');
    Route::post('/sign-in', 'AuthController@postSignInTeacher');

    Route::get('/sign-up', 'AuthController@getSignUpTeacher')->name('signUpTeacher');
    Route::post('/sign-up', 'AuthController@postSignUpTeacher');

    Route::get('/quiz/create', 'QuizController@getCreateQuiz')->name('quizCreate');
    Route::post('/quiz/create', 'QuizController@postCreateQuiz');

    Route::get('/quiz/1', function () {
        return dd(auth()->guard('teacher_web'));;
    });

    Route::get('/quiz/1/results', function () {
        return view('teacher.list_of_students');
    });

    Route::get('/quiz/1/results/1', function () {
        return view('teacher.students_answer');
    });
});

Route::group(['prefix' => 'student'], function () {
    Route::get('', 'StudentController@getStudentIndex')->name('studentIndex');

    Route::get('/sign-in', 'AuthController@getSignInStudent')->name('signInStudent');
    Route::post('/sign-in', 'AuthController@postSignInStudent');

    Route::get('/sign-up', 'AuthController@getSignUpStudent')->name('signUpStudent');
    Route::post('/sign-up', 'AuthController@postSignUpStudent');

    Route::get('/quizzes/completed/{id}', 'StudentController@getCompletedQuizzes')->name('completedQuizzes');

    Route::get('/quizzes/active/{id}', 'QuizController@getTakeQuiz')->name('takeQuiz');
    Route::get('/quizzes/active/{id}', 'QuizController@postTakeQuiz');

    Route::post('/accept-quiz', 'QuizController@acceptQuiz')->name('acceptQuiz');

});

Route::get('/test', function () {
    return view('student.timer');
});
