<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class LoginController extends BaseController
{

    public function view()
    {
        return view('login');
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['username','password']))) {
            $request->session()->regenerate();

            return redirect()->intended(route('category.index'));
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
