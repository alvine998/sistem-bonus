<?php

use App\Http\Controllers\Criteria;
use App\Http\Controllers\CriteriaDetail;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Route;

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

Route::resource('/dashboard', Dashboard::class);
Route::resource('/criteria', Criteria::class);
Route::resource('/criteria/{criterion}/detail', CriteriaDetail::class);
Route::resource('/employee', Employee::class);

Route::post('/refreshscore', [Employee::class, 'refreshscore'])->name('employee.refreshscore');

// Route::resource('/store', StoreController::class);
// Route::resource('/visitor', VisitorController::class);

