<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminUsersProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');


Auth::routes();



// Admin routes
Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin_profile');
    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin_users');
    Route::get('/admin/users/{user}', [AdminUsersProfileController::class, 'show'])->name('admin_user_profile');
    Route::post('/admin/users/{user}/promote', [AdminUsersProfileController::class, 'promote'])->name('admin_promote_user');
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin_dashboard');
    Route::post('admin_update_profile', [AdminProfileController::class, 'update'])->name('admin_update_profile');
    Route::post('admin_promote_user/{id}', [AdminUsersController::class, 'promote'])->name('admin_promote_user');
    Route::post('admin_promote_user', [AdminUsersProfileController::class, 'promote'])->name('admin_promote_user');

});


// User routes
Route::middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('update_profile', [ProfileController::class, 'update'])->name('update_profile');
    Route::get('/user/{user}/profile', [UserProfileController::class, 'show'])->name('user_profile');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
});





