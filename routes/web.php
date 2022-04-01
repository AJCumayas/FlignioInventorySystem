<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/login_user', [AuthController::class, 'loginView']);
Route::get('/register_route', [AuthController::class, 'registration']);
Route::post('/register-user', [AuthController::class, 'registerUser']) ->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout-user', [AuthController::class, 'logoutUser']);
Auth::routes();

