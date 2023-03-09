<?php

namespace App\Http\Controllers;

use App\Models\Scores;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function submitForm (Request $request) {

        if ($request->isMethod('post') && $request->has('submit')) {

            $score1 = $request->input('sunshine');
            $score2 = $request->input('potato');
            $user_id = Auth::id();

            $scores = new Scores();
            
            $scores->insert([
                'score1' => $score1,
                'score2' => $score2,
                'updated_at' => now(),
                'userId' => $user_id
            ]);
                   


            // DB::table('scores')->insert([
            //     'score1' => $score1,
            //     'score2' => $score2,
            //     'updated_at' => now(),
            //     'userId' => $user_id
            // ]);

            // $i = 0;
            // foreach ($request->input() as $value) {
            //     if (is_numeric($value)) {
            //         info($value . ' ' . $i++);
            //     }
            // }
            // $value = $request->input('sunshine');
            
            
        } else {
            info('fail');
        }

        return redirect('/assessment/result/'.$user_id);

    }
}
