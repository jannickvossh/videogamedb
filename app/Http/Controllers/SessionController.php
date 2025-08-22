<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidateSessionRequest;

class SessionController extends Controller
{
    public function login()
    {
        return view('session.login', []);
    }

    public function authenticate(ValidateSessionRequest $request)
    {
        $userInput = $request->validated();

        $attempt = [
            'username' => $userInput['user_username'],
            'password' => $userInput['user_password']
        ];

        if (Auth::attempt($attempt)) :
            flash('Welcome back!')->success();

            return redirect()->route('games');
        endif;

        flash('Wrong password.')->error();

        return back();
    }

    public function logout()
    {
        Auth::logout();

        flash('User logged out.')->success();

        return redirect()->route('games');
    }
}
