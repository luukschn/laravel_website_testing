<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SudokuController extends Controller
{
    public function index() {
        return view('sudoku_page');
    }
}
