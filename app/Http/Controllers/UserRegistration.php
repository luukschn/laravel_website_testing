<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules\Password;


class UserRegistration extends LoginController
{
    public function postRegister(Request $request) {
        
        if (Auth::Check()) {
            return redirect('/');
        } else {
            // TODO: refactor. very confusing strcture for registration form
            // need seperate validator function for login which I can call here. Not sure which should extend which then

            $registration_credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required', Password::min(4)],
                'email' => ['required', 'email']
            ]);

            $username = $request->username;
            $email = $request->email;
            $password = $request->password;
    
            $users = new Users();
            
            $users->insert([
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
                'updated_at' => now()
            ]);


            $login_credentials = $this->validate_login_credentials($request);

            if (Auth::attempt($login_credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->withErrors([
                'username' => 'Please report a username',
                'password' => 'Min password length is 4',
                'email' => 'Please provide a valid email address example@host.domain'
            ])->onlyInput('username');

        }


        #refactor to log in automatically
        
        // if registration succeeds, go to home
        // else remain on page and display error message
     }
}
