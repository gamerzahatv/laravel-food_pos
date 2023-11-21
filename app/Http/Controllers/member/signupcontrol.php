<?php

namespace App\Http\Controllers\member;

use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;


class signupcontrol extends Controller
{

    function signup(){
        //$role = Role::create(['name' => 'admin']);
        //$user->assignRole('User');

        if (Auth::check()) {
            
            return redirect('/');
        } else {
            
            return view('member.signup.register');
        }
        
    }
}