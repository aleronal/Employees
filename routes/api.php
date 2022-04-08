<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployeeDataController;
use App\Http\Controllers\MailToSendWeeklyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/employees/store', [EmployeeController::class, 'store'] );
// Route::get('/employees/index', [EmployeeController::class, 'index'] );
// Route::get('/employees/{single}', [EmployeeController::class, 'show'] );
// Route::delete('/employees/delete/{employee}', [EmployeeController::class, 'destroy'] );

Route::apiResource('employees', EmployeeController::class);

//  Employee Data Controller for countries, states, cities, departments
Route::get('/countries', [EmployeeDataController::class, 'countries']);
Route::get('/employees/{country}/states', [EmployeeDataController::class, 'states']);
Route::get('/employees/{state}/cities', [EmployeeDataController::class, 'cities']);
Route::get('/departments', [EmployeeDataController::class, 'departments']);


// Mail To Send Weekly Controller
Route::post('/storemail', [MailToSendWeeklyController::class, 'store']);

Route::get('/send', [MailToSendWeeklyController::class, 'sendMailWeekly']);

Route::get('/tweets',[TwitterController::class, 'getTweets']);