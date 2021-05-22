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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/', 'CheckRoleController@postRoleType');
Route::group(['prefix' => 'teacher'], function () {
    Route::get('', function () {
        return view('teacher.index');
    })->name('teacherIndex');

    Route::get('/sign-in', 'AuthController@getSignInTeacher')->name('signInTeacher');
    Route::post('/sign-in', 'AuthController@postSignInTeacher');

    Route::get('/sign-up', 'AuthController@getSignUpTeacher')->name('signUpTeacher');
    Route::post('/sign-up', 'AuthController@postSignUpTeacher');

    Route::get('/quiz/create', function(){
        return view('teacher.quiz_create');
    });

    Route::get('/quiz/1', function() {
        return view('teacher.quiz');
    });

    Route::get('/quiz/1/results', function () {
        return view('teacher.list_of_students');
    });
});

Route::group(['prefix' => 'student'], function () {
    Route::get('', function () {
        return view('student.index');
    })->name('studentIndex');
    Route::get('/sign-in', 'AuthController@getSignInStudent')->name('signInStudent');
    Route::post('/sign-in', 'AuthController@postSignInStudent');
    
    Route::get('/all-quizzes', function () {
        return view('student.all-quizzes');
    });
    Route::get('/true-false', function () {
        return view('student.true-false');
    }); 
    Route::get('/fill', function () {
        return view('student.fill');
    }); 

    Route::get('/sign-up', 'AuthController@getSignUpStudent')->name('signUpStudent');
    Route::post('/sign-up', 'AuthController@postSignUpStudent');
});