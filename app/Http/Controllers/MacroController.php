<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MacroController extends Controller
{
    public function input_macros () {
        return view('macros');
    }
}
