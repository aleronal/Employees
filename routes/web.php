<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\UserEmailController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\TwitterController;

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

Route::get('/twitter',[TwitterController::class, 'getTweets'])->name('twitter.tweets');

Route::post('users/{user}/change-password',[ChangePasswordController::class, 'change_password'])->name('users.change.password');

Route::resource('country', CountryController::class);
Route::resource('state', StateController::class);
Route::resource('city', CityController::class);
Route::resource('department', DepartmentController::class);

Route::get('/{any}', function(){
    return view('employees.index');
})->where('any', '.*');