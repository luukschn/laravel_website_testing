<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Scores;

class AssessmentController extends Controller
{
    public function get_assessment_page () {
        if (Auth::check()) {
            return view('assessment');
        } else {
            return redirect('/login');
        }
        
    }

    public function show_results ($id) {
        $results = Scores::where('userId', $id)->first();

        return view('assessment.result', ['results' => $results])->with('results', $results);
    }

}
