<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DBModel\Employee;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $logged_in = Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
        if ($logged_in) {
            return view('welcome')->with('message', 'Login Success');
        } else {
            return view('welcome')->with('message', 'Login Failed');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('welcome')->with('message', 'Log Out');
    }

    public function changePassword(Request $request){
        $this->validate($request ,[
            'old_password'=> 'required|max:255',
            'new_password'=> 'required|max:255',
            're_enter_password' => 'required|max:255'
        ]);
        $old_password = $request['old_password'];
        $new_password = $request['new_password'];
        $re_enter_password = $request['re_enter_password'];
        $person_id = Auth::user()->id;

        if ($re_enter_password===$new_password and $person_id!=null){
            Employee::changePassword($person_id,$old_password,$new_password);
        }
    }

    public function viewProfile(){
        $employee = Employee::get(Auth::user()->id);
        return view('common.profile.main')->with('employee',$employee);
    }

}
