<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CountryController;
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

Route::middleware(['admin'])->group(function () {
    
    Route::resource('users', UserController::class);
    
});


Route::post('users/{user}/change-password',[ChangePasswordController::class, 'change_password'])->name('users.change.password');

Route::resource('country', CountryController::class);
Route::resource('state', StateController::class);
Route::resource('city', CityController::class);

