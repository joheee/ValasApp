<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function login(){
        return view('auth.login');
    }

    public function handleLogin(Request $r){
        $validated = Validator::make($r->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validated->fails()) return redirect()->back()->withErrors($validated);
        $credentials = $r->only('email', 'password');

        if(Auth::attempt($credentials)){
            $r->session()->regenerate();
            if(Auth::user()->role == 'admin') {
                return redirect()->intended(route('admin.valasRead'));
            }
            return redirect()->intended(route('superAdmin.membershipRead'));
        }

        return redirect()->back()->withErrors("invalid credentials!");
    }

    public function handleLogout(){
        Auth::logout();
        return redirect()->route('guest.login');
    }
}
