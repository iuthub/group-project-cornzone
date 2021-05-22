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

        return redirect()->route('studentIndex')->with('info', 'You are registered successfully!');
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
            return redirect()->route('studentIndex');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function getSignUpTeacher()
    {
        return view('teacher.sign_up');
    }

    public function postSignUpTeacher(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:teachers|email|max:255',
            'password' => 'required|min:6',
            'subject_id' => 'required',
        ]);

        Teacher::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'subject_id' => $request->input('subject_id'),
        ]);



        return redirect()->route('teacherIndex')->with('info', 'You have registered successfully!');
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
            $teacher = Teacher::where("email", $request->input('email'))->first();
            $request->session()->put('teacherId', $teacher->id);

            return redirect()->route('teacherIndex')->with('info', 'You have signed in successfully!');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
}
