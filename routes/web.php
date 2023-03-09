<?php


// TODO: make this somewhat more elegant? Split up controllers in different files mb?

use App\Http\Controllers\MacroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SudokuController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserRegistration; 
use App\Http\Controllers\LoginController;



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
//id is userId, have to migrate database sometime for this to be a clearer distinction
Route::get('/assessment/result/{id}', [AssessmentController::class, 'show_results']);

//registration
Route::get('/registration', function() {
    if (Auth::check()){
        return view('welcome');
    } else {
    return view('registration');
    };
 });
Route::post('/user/register', [UserRegistration::class, 'postRegister']);
// Route::post('/user/register', [UserRegistration::class, 'postRegister']. function () {
    
    // pw verification not working
    // $rules = array(
    //     'username' => 'required',
    //     'password' => 'required|min:4',
    //     'email' => 'required|email',
    // );

    // $validator = Validator::make(Request::input(), $rules);

    // if ($validator->fails()) {
    //     return Redirect::to('/register')->withErrors($validator);
    // }

// });
// Login
Route::get('/login', function() {
    return view('login');
});
Route::post('user/login', [LoginController::class, 'login']);

// Logout 
Route::get('/logout', function() {
    Auth::logout();
    return view('welcome');
});

Route::get('/macros', [MacroController::class, 'input_macros']);

 


