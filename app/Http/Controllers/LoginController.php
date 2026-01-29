<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            // CEK ROLE
            if (Auth::user()->role !== 'admin') {
                Auth::logout();
                abort(404);
            }
            
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard'); // isi nya url nya
        }

        return back()->withErrors([
            'loginError' => 'Username or password is incorrect.',
        ])->withInput();
    }
}