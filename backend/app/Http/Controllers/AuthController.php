<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getSignUpStudent()
    {
        //todo add a corresponding view
        return view('student.sign_up');
    }

    public function postSignUpStudent(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:students|email|max:255',
            'password' => 'required|min:6',
        ]);

        Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('home')->with('info', 'You are registered successfully!');
    }

    public function getSignInStudent()
    {
        return view('student.sign_in');
    }

    public function postSignInStudent(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('student_web')->attempt($credentials)) {
            dd('OK');
            //todo redirect to student main page
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function getSignUpTeacher()
    {
        //todo add corresponding view
        return view('auth.signUpTeacher');
    }

    public function postSignUpTeacher(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:students|email|max:255',
            'password' => 'required|min:6',
            'subject' => 'required',
        ]);

        Teacher::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'subject' => $request->input('subject'),
        ]);

        return redirect()->route('home')->with('info', 'You are registered successfully!');
    }

    public function getSignInTeacher()
    {
        return view('teacher.sign_in');
    }

    public function postSignInTeacher(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('teacher_web')->attempt($credentials)) {
            dd('OK');
            //todo redirect to teacher main page
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
