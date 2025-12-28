<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        return view('admin.user', ['title' => 'Users']);
    }

    public function create()
    {
        return view('admin.createUser', ['title' => 'Create User']);
    }
}
