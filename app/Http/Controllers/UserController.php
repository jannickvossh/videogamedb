<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create', []);
    }

    public function store(ValidateUserRequest $request)
    {
        $request->validated();

        $user = new User;

        $user->firstname = $request->user_firstname;
        $user->lastname = $request->user_lastname;
        $user->username = $request->user_username;
        $user->email = $request->user_email;
        $user->password = Hash::make($request->user_password);
        $user->remember_token = Str::random(10);

        $user->save();

        Auth::login($user);

        flash('Welcome, ' . $request->user_firstname . '!')->success();

        return redirect()->route('games');
    }
}
