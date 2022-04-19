<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
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

// UI Routes
Route::get('customer/create', [FrontEndController::class, 'create']);
Route::get('customer/list', [FrontEndController::class, 'list']);
Route::get('customer/update/{id}', [FrontEndController::class, 'Showupdate']);
Route::get('customer/delete/{id}', [FrontEndController::class, 'delete']);


// POST Routes
Route::post('customer/create', [FrontEndController::class, 'create']);
Route::post('customer/update/{id}', [FrontEndController::class, 'update']);
