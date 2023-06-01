<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        return redirect('/login')->with('danger','Login Gagal!');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
