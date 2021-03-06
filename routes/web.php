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

Route::get('/viewlogin_user', [AuthController::class, 'loginView'])->name('viewlogin_user');
Route::get('/checkregister_route', [AuthController::class, 'registration_fcheck']);
Route::get('/register_route', [AuthController::class, 'registration']);
Route::post('/register-user', [AuthController::class, 'registerUser']) ->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
<<<<<<< HEAD
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/admin_page', [AuthController::class, 'adminView']);
Route::get('/sub_admin_page', [AuthController::class, 'subAdminView']);
Route::get('/users_page', [AuthController::class, 'userView']);
Route::get('/logout-user', [AuthController::class, 'logoutUser']);
Route::get('/roles', [PermissionController::class, 'Permission']);
Route::get('/approval',  [AuthController::class, 'approval'])->name('approval');
=======
//Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggedIn');
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb



Route::group(['middleware' => 'isLoggedIn','role:admin'], function() {

   Route::get('/admin_page', [AuthController::class, 'adminView']);

 });

 Route::group(['middleware' => 'role:user'], function() {

    Route::get('/users_page', [AuthController::class, 'userView']);

  });
Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/admin_page', [AuthController::class, 'adminView']);
    Route::get('/sub_admin_page', [AuthController::class, 'subAdminView']);
    Route::get('/users_page', [AuthController::class, 'userView']);
    Route::get('/logout-user', [AuthController::class, 'logoutUser']);
    Route::get('/list_user', [UserController::class, 'index'])->name('index');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
});

//Route::get('/roles', [PermissionController::class, 'Permission']);
///Route::resource('users', App\Http\Controllers\UserController::class);
<<<<<<< HEAD
Route::get('/list_user', [UserController::class, 'index'])->name('index');
Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
Route::get('/list_requests', [UserController::class, 'requests'])->name('requests');
Route::get('/approve/{requests}', [UserController::class, 'approve'])->name('approve');
Route::get('/disapprove/{requests}', [UserController::class, 'disapprove'])->name('disapprove');
Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
=======

>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb

