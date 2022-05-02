<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TwitterController;
use App\Http\Controllers\TabulatorController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\UserEmailController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\ChangePasswordController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin','auth'])->group(function () {
    
    Route::resource('users', UserController::class);
  
    
    Route::view('/user/email', 'users.email')->name('users.email');
});

// route for tweeter api to get and display tweets
Route::get('/twitter',[TwitterController::class, 'getTweets'])->name('twitter.tweets');

// Route for changing password on different users
Route::post('users/{user}/change-password',[ChangePasswordController::class, 'change_password'])->name('users.change.password');

// Routes for tabulator testing on vue.js and laravel

// Route::get('tabulator', [TabulatorController::class, 'tabulator'])->name('tabulator');

// Testing for differents controller database

Route::resource('country', CountryController::class);
Route::resource('state', StateController::class);
Route::resource('city', CityController::class);
Route::resource('department', DepartmentController::class);




Route::get('/{any}', function(){
    return view('employees.index');
})->where('any', '.*');

Route::get('users/{id}', function ($id) {} );

    // this is just the test