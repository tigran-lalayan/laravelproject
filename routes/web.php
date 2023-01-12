<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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




    Route::middleware(['auth'])->group(function() {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('update_profile', [ProfileController::class, 'update'])->name('update_profile');
        Route::get('/user/{user}/profile', [\App\Http\Controllers\UserProfileController::class, 'show'])->name('user_profile');
        Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users');


        ;


});
