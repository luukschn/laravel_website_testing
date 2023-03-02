<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function get_assessment_page () {
        return view('assessment');
    }

}
