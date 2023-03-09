<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PasswordController extends Controller
{
    public function updatePassword(Request $request): RedirectResponse {
        
        //NOT USED AS OF NOW

        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();

        return redirect('/profile');
    }
    
}
