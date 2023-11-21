<?php

namespace App\Http\Controllers\member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;


class logincontrol extends Controller
{
    function login(){
        if (Auth::check()) {
            
            return redirect('/');
        } else {
            
            return view('member.login.login');
        }
        
    }
}