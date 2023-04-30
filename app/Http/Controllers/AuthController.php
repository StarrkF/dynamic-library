<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        : back()->with('error','Email ya da şifre hatalı!');

    }

    public function register(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return back()->with('success','Kullanıcı başarıyla kaydedildi');
        } catch (\Throwable $th) {
            return back()->with('error','Kullanıcı kaydedilemedi, lütfen tekrar deneyiniz');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('pages.login');
    }
}
