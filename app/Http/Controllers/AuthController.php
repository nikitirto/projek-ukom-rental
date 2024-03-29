<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin' || $user->role == 'owner') {
                return redirect('data-user');
            } 
        }

        return redirect()->back()->withErrors('Terdapat kesalahan Username atau Password')->withInput();
    }

    function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }
}