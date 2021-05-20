<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CheckRoleController extends Controller{

    public function postRoleType(Request $request)
        {   
            if($request->role_selector === "student"){
                return redirect('student/sign-in');   
            }
            else{
                return redirect('teacher/sign-in');
            }
        }
}