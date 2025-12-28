<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function SignUp ()
    {
        return view('signUp');
    }

    public function register (Request $request)
    {
        $request->validate([
            'firstName'=> 'required',
            // 'firstName'=> 'required|uppercase',
            'lastName'=> 'required',
            'email'=> 'required|email',
            'password' => 'required|min:5',
            'confirmPassword' => 'required|min:5|same:password',
        ],[
            // 'firstName.uppercase'=> 'First Name Should be in uppercase'
        ]);

        return $request;
    }

    public function login(Request $request)
    {
        $userData=User::all()->first();
        dd($userData);
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required'=>'username is required',
            'password.required'=>'password is required',
        ]);
        return $request;
    }
}
