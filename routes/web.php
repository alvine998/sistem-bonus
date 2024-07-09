<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Criteria;
use App\Http\Controllers\CriteriaDetail;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Employee;
use App\Http\Controllers\User;
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
Route::resource('/user', User::class);

Route::resource('/', AuthController::class);
Route::post('/login', [AuthController::class, 'login'])->name('welcome.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('welcome.logout');
Route::post('/refreshscore', [Employee::class, 'refreshscore'])->name('employee.refreshscore');

// Route::resource('/store', StoreController::class);
// Route::resource('/visitor', VisitorController::class);

