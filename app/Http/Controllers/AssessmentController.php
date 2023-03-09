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

        $all_scores = Scores::all();
        // $data = [
        //     'results' => $results,
        // ]
        $scores_count = count($all_scores); 

        $score1_sum = 0;
        $score2_sum = 0;

        for ($i=0; $i<=($scores_count - 1); $i++) {
            $score1_sum += $all_scores[$i]['score1'];
            $score2_sum += $all_scores[$i]['score2'];
        }

        $score1_avg = round(($score1_sum / $scores_count), 1);
        $score2_avg = round(($score2_sum / $scores_count), 1);

        $data = [
            'results' => $results,
            'average_scores' => [
                'score1_avg' => $score1_avg,
                'score2_avg' => $score2_avg
                ]
            ];

        return view('assessment.result')->with('data', $data);
    }

}
