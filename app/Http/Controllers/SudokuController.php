<?php

namespace App\Http\Controllers;

use App\Models\Sudoku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SudokuController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $complete_board = $this->create_sudoku_board(9,9);

            $user_id = Auth::id();
            $elo = Sudoku::where('userId', $user_id)->get('sudoku_elo');
            info("sudoku elo". $elo);

            $adjusted_board = $this->remove_sudoku_numbers_based_on_elo($elo, $complete_board);
            // TODO: send this information to view and parse it (somehow)
            // going to be a lot of logic in the view itself, which im not sure is proper

            return view('sudoku_page');
        } else {
            return redirect('/login');
        }
    }

    private function create_sudoku_board($height, $width) {
        $board = array();

        for ($k=0; $k< $width; $k++) {
            $row = array();
            
            for ($i = 1; $i<= $height; $i++) {
                $row[] = ($i + $k) % 9 + 1;
            }

            $board[]=$row;
        }

        shuffle($board);
        $board=array_map(null, ...$board);
        shuffle($board);

        info($board);
        return $board;
    }

    private function remove_sudoku_numbers_based_on_elo($elo, $board) {
        /*
        Implementation needs to be tested. 
        Intent is: 
        - when value is 0, view should render it as an open square
        - other values need to be rendered as the value itself, and set the input to disabled.

        Also need to adjust the amount of squared based on elo. 1000 is default value. 
        Not sure what would be an efficient algorithm to increase the amount of open squares as elo increases and vice versa
        -> make it a seperate function though
        */
        
        $visible_squares = $this->calculate_visible_squares_from_elo($elo);

        $squares_to_remove = array();


        while (count(array_unique($squares_to_remove)) < (81 - $visible_squares)) {
            $i = random_int(0, 8);
            $j = random_int(0, 8);

            $squares_to_remove[] = " . $i . $j . ";
        }

        foreach(array_unique($squares_to_remove) as $square) {
            $board[((int)substr($square, 0, 1))][((int)substr($square, 1, 2))] = 0;
        }

        return $board;
    }

    private function calculate_visible_squares_from_elo ($elo): int {
        
        $amount_of_visible_squares = 40;
        if ($elo > 1000) {
            $decrease_amount = round(($elo - 1000) / 50, 0);
            $amount_of_visible_squares -= $decrease_amount;
        } elseif ($elo < 1000) {
            $increase_amount = round(($elo-1000) / 50, 0);
            $amount_of_visible_squares -= $increase_amount;
        } 
        
        return $amount_of_visible_squares;
    }
}
