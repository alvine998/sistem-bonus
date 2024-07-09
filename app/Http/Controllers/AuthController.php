<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('user', $user);
            return redirect()->intended('/dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("/")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
