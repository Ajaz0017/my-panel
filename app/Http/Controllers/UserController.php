<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user', [
            'title' => 'Users',
            'users' => User::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.createUser', ['title' => 'Create User']);
    }

    /**
     * STORE USER
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|string',
        ]);

        User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'remember_token' => Str::random(60),
            'role'           => $request->role,
            'is_active'      => $request->has('is_active'),
        ]);

        return redirect('/users')->with('success', 'User created successfully');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect('/users')->with('success', 'User deleted successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.editUser', [
            'title' => 'Edit User',
            'user'  => $user,
        ]);
    }

    // UPDATE USER
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'nullable|min:6',
            'role'      => 'required|string',
        ]);

        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'role'      => $request->role,
            'is_active' => $request->has('is_active'),
        ];

        // password sirf tab update ho jab bhara ho
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/users')->with('success', 'User updated successfully');
    }
}