<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {

        return  Auth::attempt(['email' => $request->email, 'password' => $request->password])
        ? redirect()->route('get.home')
        : back()->with('error','Email or password incorrect');

    }

    public function logout()
    {
        Auth::logout();
        return view('pages.login');
    }
}
