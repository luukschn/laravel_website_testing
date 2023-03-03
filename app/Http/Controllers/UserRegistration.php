<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRegistration extends Controller
{
    public function postRegister(Request $request) {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        
        DB::table('users')->insert([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
            'updated_at' => now()
        ]);

        return redirect('/');
        
        // if registration succeeds, go to home
        // else remain on page and display error message
     }
}
