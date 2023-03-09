<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

use App\Models\Users;

/* 
Valid login credentials:
username: luuk
password: luuk
*/

class LoginController extends Controller
{
    public function login (Request $request): RedirectResponse {

        $login_credentials = $this->validate_login_credentials($request);

        if (Auth::check()) {
            return redirect('/');
        } else {
            if (Auth::attempt($login_credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->withErrors([
                'username' => 'Incorrect login information.',
                'password' => 'Incorrect password'
            ])->onlyInput('username');
        }
    }

    public function validate_login_credentials (Request $request) {

        $login_credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        
        return $login_credentials;
    }
}
