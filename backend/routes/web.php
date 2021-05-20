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
    });

    Route::get('/sign-in', 'AuthController@getSignInTeacher')->name('signInTeacher');
    Route::post('/sign-in', 'AuthController@postSignInTeacher');

    Route::get('/sign-up', 'AuthController@getSignUpTeacher')->name('signUpTeacher');
    Route::post('/sign-up', 'AuthController@postSignUpTeacher');

    Route::get('/sign-up', function () {
        return view('teacher.sign_up');
    });

    Route::get('/quiz/create', function () {
        return view('teacher.quiz_create');
    });

    Route::get('/quiz/1', function () {
        return view('teacher.quiz');
    });
});

Route::group(['prefix' => 'student'], function () {
    Route::get('/sign-in', 'AuthController@getSignInStudent')->name('signInStudent');
    Route::post('/sign-in', 'AuthController@postSignInStudent');

    Route::get('/sign-up', 'AuthController@getSignUpStudent')->name('signUpStudent');
    Route::post('/sign-up', 'AuthController@postSignUpStudent');
});

// Route::get('/signUp', 'AuthController@getSignup')->name('auth.signUp');
// Route::post('/signUp', 'AuthController@postSignup');

Route::get('/signIn', 'AuthController@getSignin')->name('auth.signIn');
Route::post('/signIn', 'AuthController@postSignin');
