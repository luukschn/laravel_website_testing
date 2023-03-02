<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SudokuController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\FormController;

//for trial purposes
use App\Http\Controllers\UriController;
use App\Http\Controllers\UserRegistration; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//homepage routes
Route::get('/', function () {
    return view('welcome');
});

//sudoku page routes
Route::get('/sudoku', [SudokuController::class, 'index']);
Route::get('/run-script', [ScriptController::class, 'run']);

//assessment page routes
Route::get('/assessment', [AssessmentController::class, 'get_assessment_page']);
//post route should probably be in routes/api?
Route::post('/submit-form', [FormController::class, 'submitForm']);



// TRIAL METHODS
Route::get('/foo/bar', [UriController::class, 'index']);
Route::get('/register', function() {
    return view('registration');
 });
Route::post('/user/register', [UserRegistration::class, 'postRegister']);
 


