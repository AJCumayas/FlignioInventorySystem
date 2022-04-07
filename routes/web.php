<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
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
Route::get('/admin_page', [AuthController::class, 'adminView']);
Route::get('/sub_admin_page', [AuthController::class, 'subAdminView']);
Route::get('/users_page', [AuthController::class, 'userView']);
Route::get('/logout-user', [AuthController::class, 'logoutUser']);
Route::get('/roles', [PermissionController::class, 'Permission']);

///Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('/list_user', [UserController::class, 'index'])->name('index');
Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
Route::put('/update/{user}', [UserController::class, 'update'])->name('update');

